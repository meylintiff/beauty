<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW v_perbandingan  AS
            SELECT 
                k.kriteria AS kriteria,
                CASE WHEN k.kriteria = 'harga' THEN p.harga ELSE NULL END AS C1,
                CASE WHEN k.kriteria = 'kandungan' THEN p.kandungan ELSE NULL END AS C2,
                CASE WHEN k.kriteria = 'isi' THEN p.isi ELSE NULL END AS C3,
                CASE WHEN k.kriteria = 'masa_simpan' THEN p.masa_simpan ELSE NULL END AS C4,
                CASE WHEN k.kriteria = 'jumlah_terjual' THEN p.jumlah_terjual ELSE NULL END AS C5
            FROM 
                tipe_kriteria k
            LEFT JOIN 
                products p
            ON 
                k.kriteria IN ('harga', 'kandungan', 'isi', 'masa_simpan', 'jumlah_terjual')
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbandingan_view');
    }
};
