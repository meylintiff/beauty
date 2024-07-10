<?php

namespace App\Http\Controllers\perhitungan;

use App\Http\Controllers\Controller;
use App\Models\Bobot;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class IndexController extends Controller
{
    public function show(Request $request)
    {
        $kolom = Schema::getColumnListing('products');
        $excludes = ['id', 'created_at', 'updated_at'];
        $filter = array_diff($kolom, $excludes);

        $kolomKrit = Schema::getColumnListing('products');
        // Columns to exclude
        $exKolom = ['id', 'created_at', 'updated_at', 'nama_produk'];
        // Filter columns
        $KolomKriteria = array_diff($kolomKrit, $exKolom);

        // Mendapatkan semua alternatif (produk) dari database
        $alternatif = Produk::all();
        
        // Mendapatkan data dari session 'pilihan-alternatif'
        $pilihanAlternatif = $request->session()->get('pilihan-alternatif', []);

        // Pastikan $pilihanAlternatif adalah array
        if (!is_array($pilihanAlternatif)) {
            $pilihanAlternatif = [];
        }

        // Mendapatkan ID produk berdasarkan data yang ada di session
        $ids = array_column($pilihanAlternatif, 'id');
        $nilaiAlt = Produk::whereIn('id', $ids)->get();

        $user_id = Auth::id();

        // Fetch the latest weights used by the user
        $lastBobot = Bobot::where('users_id', $user_id)->latest()->first();

        // Mengembalikan view 'admin.perhitungan' dengan data yang diperlukan
        return view('admin.perhitungan', compact('alternatif', 'pilihanAlternatif', 'KolomKriteria', 'lastBobot', 'nilaiAlt', 'filter'));
    }
}
