<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Kategori;
use App\Models\ObatTidakLayak;

class DashboardController extends Controller
{
    public function index()
    {
        $obats = Obat::with('kategori')->get();
        // Menghitung jumlah data obat
        $jumlahObat = Obat::count();

        // Menghitung jumlah data kategori
        $jumlahKategori = Kategori::count();

        // Menghitung jumlah data obat tidak layak
        $jumlahObatTidakLayak = ObatTidakLayak::count();

        $lowStockObats = Obat::where('stok', '<', 5)->get();
        // Mengirimkan data ke view dashboard
        return view('dashboard.index', compact('obats', 'jumlahObat', 'jumlahKategori', 'jumlahObatTidakLayak', 'lowStockObats'));
    }

    public function clearNotifications()
    {
        // Logic to clear notifications
        // You can set a session variable or update a field in the database to indicate notifications are cleared.
        session()->flash('notifications_cleared', true);

        return response()->json(['success' => true]);
    }
}
