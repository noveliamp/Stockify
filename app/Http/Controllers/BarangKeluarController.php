<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\Kategori;
use App\Models\Obat;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::all();
        return view('barang_keluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $obats = Obat::all();
        return view('barang_keluar.insert', compact('kategoris', 'obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        try {
            $obat = Obat::find($request->obat_id);

            if ($obat->stok < $request->jumlah) {
                return back()->with('error', 'Stok obat tidak mencukupi');
            }

            // Kurangi stok obat
            $obat->stok -= $request->jumlah;
            $obat->save();

            BarangKeluar::create([
                'obat_id' => $request->obat_id,
                'kategori_id' => $request->kategori_id,
                'jumlah' => $request->jumlah,
            ]);

            return redirect()->route('barang-keluar.index')->with('message', 'Data Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            // Dapatkan data barang keluar berdasarkan ID yang diberikan
            $barangKeluar = BarangKeluar::findOrFail($id);
            
            // Ambil semua kategori dan obat untuk pilihan dropdown
            $kategoris = Kategori::all();
            $obats = Obat::all();
            
            // Tampilkan view untuk mengedit data barang keluar
            return view('barang_keluar.edit', compact('barangKeluar', 'kategoris', 'obats'));
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan
            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        try {
            // Temukan data barang keluar yang akan diupdate
            $barangKeluar = BarangKeluar::findOrFail($id);
            
            // Ambil obat terkait untuk memeriksa stok
            $obat = Obat::find($request->obat_id);

            // Periksa apakah stok obat mencukupi untuk pengeditan
            if ($obat->stok + $barangKeluar->jumlah < $request->jumlah) {
                return back()->with('error', 'Stok obat tidak mencukupi');
            }

            // Kembalikan jumlah obat sebelumnya ke stok
            $obat->stok += $barangKeluar->jumlah;
            $obat->save();

            // Kurangi stok obat yang baru dipilih
            $obat->stok -= $request->jumlah;
            $obat->save();

            // Update data barang keluar
            $barangKeluar->update([
                'obat_id' => $request->obat_id,
                'kategori_id' => $request->kategori_id,
                'jumlah' => $request->jumlah,
            ]);

            return redirect()->route('barang-keluar.index')->with('message', 'Data Berhasil Diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // Temukan data barang keluar yang akan dihapus
            $barangKeluar = BarangKeluar::findOrFail($id);
            
            // Hapus data barang keluar
            $barangKeluar->delete();

            return redirect()->route('barang-keluar.index')->with('message', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
