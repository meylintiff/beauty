<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PembobotanController extends Controller
{
    public function index()
    {
        $bobot = Bobot::with('user')->paginate(5);
        $columns = Schema::getColumnListing('bobot');
        $user = User::all();
        return view('admin.pembobotan', compact('bobot', 'user', 'columns'));
    }

    public function store(Request $request)
    {
        $columns = Schema::getColumnListing('bobot');
        $exclude = ['id', 'created_at'];
        $fillableColumns = array_diff($columns, $exclude);

        // Validasi data
        $rules = [
            'users_id' => 'required|exists:users,id',
            'created_at' => 'required|date',
        ];

        foreach ($fillableColumns as $column) {
            $rules[$column] = 'required';
        }

        $validatedData = $request->validate($rules);

        $bobot = new Bobot();
        $bobot->users_id = $validatedData['users_id'];
        $bobot->created_at = $validatedData['created_at'];
        foreach ($fillableColumns as $column) {
            $bobot->$column = $validatedData[$column];
        }

        $bobot->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }


    public function update(Request $request, Bobot $bobot)
    {
        // Dapatkan semua kolom kecuali primary key
        $columns = Schema::getColumnListing('bobot');
        $exclude = ['id', 'created_at'];
        $fillableColumns = array_diff($columns, $exclude);

        // Validasi data
        $rules = [
            'users_id' => 'required|exists:users,id',
            'created_at' => 'required|date',
        ];

        foreach ($fillableColumns as $column) {
            $rules[$column] = 'required';
        }

        $validatedData = $request->validate($rules);

        // Update model Nilai
        $bobot->users_id = $validatedData['users_id'];
        $bobot->created_at = $validatedData['created_at'];
        foreach ($fillableColumns as $column) {
            $bobot->$column = $validatedData[$column];
        }

        $bobot->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy(Bobot $bobot)
    {
        $bobot->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
