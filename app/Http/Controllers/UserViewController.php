<?php

namespace App\Http\Controllers;
use App\Models\resep_makanan;
use App\Models\kategori;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function indexDashboard()
    {
        // Ambil semua data resep dan kategori
        $resepAll = resep_makanan::all();
        $kat = kategori::all(); // Ambil semua data kat

        return view('user/index', compact('resepAll', 'kat'));
    }
    public function index()
    {
        // Ambil semua data resep dan kategori
        $resep_makanan = resep_makanan::all(); // Mengambil resep beserta relasi kategori
        $kat = kategori::all(); // Ambil semua data kat

        return view('user/list-resep', compact('resep_makanan', 'kat'));
    }

    public function show($id){
        $resep = resep_makanan::findOrFail($id);
        $resepJoin = resep_makanan::where('resep_makanan.id', $resep->id)
        ->join('users', 'users.id', '=', 'resep_makanan.user_id')
        ->join('kategoris', 'kategoris.id', '=', 'resep_makanan.kat_id')
        ->select([
            'users.name as user_name',
            'users.poto',
            'kategoris.nama_kategori',
            'resep_makanan.nama_makanan',
            'resep_makanan.deskripsi',
            'resep_makanan.resep',
            'resep_makanan.cara_buat',
            'resep_makanan.link_gambar',
        ])
        ->first(); // Fetch only one record
        $resepAll = resep_makanan::all();
        return view ('user/resep', compact('resep','resepJoin','resepAll'));
    }

}
