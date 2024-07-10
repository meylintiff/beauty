<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class LandingPage extends Controller
{
    public function index()
    {
        $kolom = Schema::getColumnListing('products');
        $exKolom = ['id', 'created_at', 'updated_at', 'nama_produk'];
        $filter = array_diff($kolom, $exKolom);
        $kriteriaCount = count($filter);
        $alternatifCount = Produk::count();
        $users = User::where('role', 'User')->count();
        return view('landing', compact('alternatifCount', 'kriteriaCount', 'users'));
    }
}
