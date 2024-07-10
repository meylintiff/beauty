<?php

namespace App\Http\Controllers\perhitungan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HapusAltController extends Controller
{
    public function hapusPilihan(Request $request)
    {
        // Ambil data 'pilihan-alternatif' dari session
        $pilihanAlternatif = $request->session()->get('pilihan-alternatif', []);

        // Nama produk yang akan dihapus
        $namaProduk = $request->input('nama_produk');

        // Cari dan hapus produk dari array
        $pilihanAlternatif = array_filter($pilihanAlternatif, function ($alt) use ($namaProduk) {
            return $alt['nama_produk'] !== $namaProduk;
        });

        // Simpan kembali array yang telah dimodifikasi ke dalam session
        $request->session()->put('pilihan-alternatif', $pilihanAlternatif);

        return redirect()->back()->with('success', 'Data alternatif berhasil dihapus dari session.');
    }
}
