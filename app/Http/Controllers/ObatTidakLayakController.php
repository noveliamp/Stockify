<?php

namespace App\Http\Controllers;

use App\Models\ObatTidakLayak;
use App\Models\Obat; // Import model Obat
use Illuminate\Http\Request;

class ObatTidakLayakController extends Controller
{
    public function index()
    {
        $obatTidakLayaks = ObatTidakLayak::all();
        return view('obat_tidak_layaks.index', compact('obatTidakLayaks'));
    }

    public function create()
    {
        $obats = Obat::all(); // Mengambil semua obat
        return view('obat_tidak_layaks.insert', compact('obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'keterangan_tidak_layak' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        ObatTidakLayak::create($request->all());

        return redirect()->route('obattidaklayak.index')
            ->with('success', 'Data obat tidak layak berhasil ditambahkan.');
    }
}
