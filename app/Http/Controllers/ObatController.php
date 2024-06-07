<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::with('kategori')->get();
        $lowStockObats = Obat::where('stok', '<', 5)->get();
        return view('obats.index', compact('obats', 'lowStockObats'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('obats.insert', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'id_obat' => 'required',
            'nama' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
            'stok' => 'required|integer',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('message', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Obat $obat)
    {
        $kategoris = Kategori::all();
        return view('obats.edit', compact('obat', 'kategoris'));
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'id_obat' => 'required',
            'nama' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
            'stok' => 'required|integer',
        ]);

        $obat->update($request->all());

        return redirect()->route('obat.index')->with('message', 'Data Berhasil Diperbarui!');
    }

    public function show($id)
    {
        $obat = Obat::with('kategori')->findOrFail($id);
        return view('obats.show', compact('obat'));
    }

}
