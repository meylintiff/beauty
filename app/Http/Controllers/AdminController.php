<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function dashboard()
    {
        $kolom = Schema::getColumnListing('products');
        $exclude = ['id', 'nama_produk', 'created_at', 'updated_at'];
        $filterKolom = array_diff($kolom, $exclude);
        $countKolom = count($filterKolom);
        $alternatif = Produk::count();
        $admin = User::where('role', 'Administrator')->count();
        $users = User::where('role', 'User')->count();
        return view('admin.dashboard', compact('admin', 'countKolom', 'alternatif', 'users'));
    }


    public function userAll()
    {
        // Filter users based on their roles
        $adminUsers = User::where('role', 'Administrator')->get();
        $userUsers = User::where('role', 'User')->get();

        // Return the view with filtered users
        return view('admin.akun', compact('adminUsers', 'userUsers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
        ]);

        // Create new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
