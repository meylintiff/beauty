<?php

namespace App\Http\Controllers;

use App\Models\TipeKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class KriteriaController extends Controller
{
    public function index()
    {
        $columnProduk = Schema::getColumnListing('products');
        $exclude = ['id', 'created_at', 'updated_at', 'nama_produk'];
        $columns = array_diff($columnProduk, $exclude);

        $tipe = TipeKriteria::all();
        $kriteria = [];

        foreach ($columns as $column) {
            // Normalize column names to compare
            $normalizedColumn = strtolower($column);

            $tipe_kriteria = $tipe->first(function ($item) use ($normalizedColumn) {
                $normalizedKriteria = strtolower(str_replace(' ', '_', $item->kriteria));
                return $normalizedKriteria === $normalizedColumn;
            });

            $kriteria[] = [
                'kriteria' => $column,
                'tipe' => $tipe_kriteria ? $tipe_kriteria->tipe : 'Tidak ada'
            ];
        }


        return view('admin.kriteria', compact('columns', 'kriteria'));
    }

    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $tipe = $request->input('tipe');

        TipeKriteria::create([
            'kriteria' => $nama,
            'tipe' => $tipe,
        ]);

        // Lakukan validasi jika nama tidak boleh kosong

        // Tambahkan kolom baru dengan tipe data decimal ke dalam tabel nilai
        Schema::table('products', function ($table) use ($nama) {
            $table->decimal($nama, 11)->nullable();
        });

        // Perbarui kolom 'w' pada tabel pembobotan
        $this->updatePembobotanTable();

        // Redirect atau kembali ke halaman yang diinginkan setelah proses penambahan
        return redirect()->back()->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function updatePembobotanTable()
    {
        // Dapatkan kolom 'w' terakhir dari tabel pembobotan
        $lastWColumn = DB::table('information_schema.columns')
            ->select('column_name')
            ->where('table_schema', env('DB_DATABASE')) // Tambahkan ini untuk memastikan bahwa kita bekerja di database yang benar
            ->where('table_name', 'bobot')
            ->where('column_name', 'like', 'w%')
            ->orderBy('ordinal_position', 'desc') // Pastikan urutan kolom benar berdasarkan posisinya
            ->first();

        // Logging kolom terakhir
        if ($lastWColumn) {
            // Extract nomor 'w' terakhir
            $lastWNumber = intval(substr($lastWColumn->column_name, 1));
        } else {
            // Jika tidak ada kolom 'w' sebelumnya, atur nomor 'w' awal
            $lastWNumber = 0;
        }

        // Tambahkan kolom 'w' berikutnya pada tabel pembobotan
        $newWColumn = 'w' . ($lastWNumber + 1);

        // Cek apakah kolom sudah ada sebelum menambahkan
        if (!Schema::hasColumn('bobot', $newWColumn)) {
            Schema::table('bobot', function ($table) use ($newWColumn) {
                $table->decimal($newWColumn, 8, 2)->nullable();
            });
            Log::info('Kolom ' . $newWColumn . ' berhasil ditambahkan.');
        } else {
            Log::info('Kolom ' . $newWColumn . ' sudah ada.');
        }
    }

    public function update(Request $request, $column)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string|in:Benefit,Cost',
        ]);

        $namaKolom = str_replace(' ', '_', strtolower($request->input('nama')));
        $namaKolomKrit = $request->input('nama');
        $tipe = $request->input('tipe');

        // Normalize the column name to ensure it matches the format in TipeKriteria
        $normalizedColumn = ucwords(str_replace('_', ' ', $column));

        // Update the column name in the products table
        DB::statement("ALTER TABLE products CHANGE $column $namaKolom INTEGER(11)");

        // Update the name and type in the TipeKriteria table
        TipeKriteria::where(DB::raw('LOWER(kriteria)'), strtolower($normalizedColumn))->update([
            'kriteria' => $namaKolomKrit,
            'tipe' => $tipe,
        ]);

        // Redirect or return to the desired page after the update process
        return redirect()->back()->with('success', 'Kriteria berhasil diperbarui.');
    }

    public function delete(Request $request, $column)
    {
        try {
            // Validasi apakah kolom yang ingin dihapus memang ada dalam tabel
            if (!Schema::hasColumn('products', $column)) {
                throw new \Exception('Kolom tidak ditemukan.');
            }

            // Dapatkan kolom 'w' yang terkait dengan kolom yang akan dihapus
            $lastWColumn = DB::table('information_schema.columns')
                ->select('column_name')
                ->where('table_schema', env('DB_DATABASE'))
                ->where('table_name', 'bobot')
                ->where('column_name', 'like', 'w%')
                ->orderBy('ordinal_position', 'desc')
                ->first();

            if (!$lastWColumn) {
                throw new \Exception('Kolom W tidak ditemukan di tabel pembobotan.');
            }

            // Proses penghapusan kolom dari tabel menggunakan Schema Builder
            Schema::table('products', function ($table) use ($column) {
                $table->dropColumn($column);
            });

            // Hapus kolom 'w' terkait dari tabel pembobotan
            Schema::table('bobot', function ($table) use ($lastWColumn) {
                $table->dropColumn($lastWColumn->column_name);
            });

            TipeKriteria::where('kriteria', $column)->delete();

            // Redirect dengan pesan sukses jika penghapusan berhasil
            return redirect()->back()->with('success', 'Kolom berhasil dihapus.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}