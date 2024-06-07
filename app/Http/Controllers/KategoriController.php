<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data kategori dari model
        $kategoris = Kategori::all();

        // Mengembalikan view index kategori dengan data kategori
        return view('kategoris.index', compact('kategoris'));
    }

    public function create()
    {
        // Mengembalikan view create kategori
        return view('kategoris.insert');
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required',
        ]);

        // Menyimpan data kategori ke database
        Kategori::create([
            'nama' => $request->nama,
        ]);

        // Redirect ke halaman index kategori dengan pesan sukses
        return redirect()->route('kategoris.index')->with('message', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Kategori $kategori)
    {
        // Mengembalikan view edit kategori dengan data kategori
        return view('kategoris.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required',
        ]);

        // Update data kategori di database
        $kategori->update([
            'nama' => $request->nama,
        ]);

        // Redirect ke halaman index kategori dengan pesan sukses
        return redirect()->route('kategoris.index')->with('message', 'Data Berhasil Diperbarui!');
    }

    public function destroy(Kategori $kategori)
{
    // Hapus kategori dari database
    $kategori->delete();

    // Redirect ke halaman index kategori dengan pesan sukses
    return redirect()->route('kategoris.index')->with('message', 'Data berhasil dihapus!');
}

}
