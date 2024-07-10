<?php

namespace App\Http\Controllers\perhitungan;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class SimpanAltController extends Controller
{
    public function simpanAlternatif(Request $request)
    {
        $alternatifNama = $request->input('alternatif');
        $produk = Produk::where('nama_produk', $alternatifNama)->first();

        if ($produk) {
            $alternatif = [
                'id' => $produk->id,
                'nama_produk' => $produk->nama_produk
            ];
            
            // Ambil data yang ada di session dan tambahkan data baru
            $pilihanAlternatif = $request->session()->get('pilihan-alternatif', []);
            $pilihanAlternatif[] = $alternatif;

            // Simpan ke session
            $request->session()->put('pilihan-alternatif', $pilihanAlternatif);

            return redirect()->back()->with('success', 'Alternatif berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Alternatif tidak ditemukan.');
        }
    }
}
