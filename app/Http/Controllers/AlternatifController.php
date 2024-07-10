<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\Karakter;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AlternatifController extends Controller
{

    public function alternatif()
    {
        $columns = Schema::getColumnListing('products');
        $exclude = ['id', 'created_at', 'updated_at'];
        $columns = array_diff($columns, $exclude);
        $produk = Produk::all();
        return view('admin.alternatif', compact('produk', 'columns'));
    }

    public function store(Request $request)
    {
        // Mendapatkan kolom yang valid dari tabel 'products'
        $columns = Schema::getColumnListing('products');

        // Kolom-kolom yang tidak perlu dimasukkan (seperti 'id', 'created_at', 'updated_at')
        $exclude = ['id', 'created_at', 'updated_at'];

        // Mendapatkan kolom-kolom yang dapat diisi (selain yang di-exclude)
        $fillableColumns = array_diff($columns, $exclude);

        // Validasi input berdasarkan aturan yang dibuat dari kolom yang dapat diisi
        $validatedData = $request->validate(array_fill_keys($fillableColumns, 'required'));

        // Membuat instance baru dari model Produk
        $produk = new Produk();

        // Mengisi atribut-atribut model berdasarkan data yang divalidasi
        foreach ($fillableColumns as $column) {
            $produk->$column = $validatedData[$column];
        }

        // Menyimpan data ke dalam database
        $produk->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }


    public function update(Request $request, Produk $produk)
    {
        $columns = Schema::getColumnListing('products');

        // Kolom-kolom yang tidak perlu dimasukkan (seperti 'id', 'created_at', 'updated_at')
        $exclude = ['id', 'created_at', 'updated_at'];

        // Mendapatkan kolom-kolom yang dapat diisi (selain yang di-exclude)
        $fillableColumns = array_diff($columns, $exclude);

        // Validasi input berdasarkan aturan yang dibuat dari kolom yang dapat diisi
        $validatedData = $request->validate(array_fill_keys($fillableColumns, 'required'));

        // Mengisi atribut-atribut model berdasarkan data yang divalidasi
        foreach ($fillableColumns as $column) {
            $produk->$column = $validatedData[$column];
        }
        // Menyimpan data ke dalam database
        $produk->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
