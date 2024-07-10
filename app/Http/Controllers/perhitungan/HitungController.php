<?php

namespace App\Http\Controllers\perhitungan;

use App\Http\Controllers\Controller;
use App\Models\Bobot;
use App\Models\Produk;
use App\Models\TipeKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class HitungController extends Controller
{
    public function ProdukHitungSAW()
    {
        $kolom = Schema::getColumnListing('products');
        // Columns to exclude
        $exKolom = ['id', 'created_at', 'updated_at', 'nama_produk'];
        // Filter columns
        $KolomKriteria = array_values(array_diff($kolom, $exKolom));
        $user_id = Auth::id();

        // Fetch the latest weights used by the user
        $bobots = Bobot::where('users_id', $user_id)->latest()->first();
        if (!$bobots) {
            return redirect()->route('user.rekomendasi')->with('error', 'Bobot not found.');
        }

        $BobotSelect = array_values(array_diff(Schema::getColumnListing('bobot'), ['id', 'users_id', 'created_at']));
        $bobotsArray = $bobots->toArray();

        // Normalize the Bobot values
        $normalizedBobots = [];
        $totalSum = 0;

        // Calculate the total sum of all weights
        foreach ($BobotSelect as $column) {
            $totalSum += $bobotsArray[$column];
        }

        // Normalize each Bobot value
        foreach ($BobotSelect as $column) {
            $normalizedBobots[$column] = $bobotsArray[$column] / $totalSum;
        }

        session()->put('Bobot_Normal', $normalizedBobots);

        // Fetch criteria types
        $tipekriteria = [];
        foreach ($KolomKriteria as $namaKrit) {
            // Replace underscores with spaces
            $kriteriaName = str_replace('_', ' ', $namaKrit);
            // Fetch the type based on criteria name
            $tipe = TipeKriteria::where('kriteria', $kriteriaName)->value('tipe');
            if ($tipe) {
                $tipekriteria[$namaKrit] = $tipe;
            }
        }

        $produklist = session()->get('pilihan-alternatif', []);
        $produkId = array_map(function ($produklist) {
            return $produklist['id'];
        }, $produklist);

        $pilihProduk = Produk::whereIn('id', $produkId)->get();

        // Calculate MAX for benefit criteria and MIN for cost criteria
        $maxValues = [];
        $minValues = [];
        foreach ($tipekriteria as $namaKrit => $kriteriaType) {
            $values = $pilihProduk->pluck($namaKrit)->toArray();

            // Check if there are valid values to calculate max and min
            if (!empty($values)) {
                if ($kriteriaType === 'Benefit') {
                    $maxValues[$namaKrit] = max($values);
                } elseif ($kriteriaType === 'Cost') {
                    $minValues[$namaKrit] = min($values);
                }
            }
        }

        $nilaiNormalisasi = [];
        foreach ($pilihProduk as $listproduk) {
            $normalisasi = [];
            foreach ($KolomKriteria as $ListKriteria) {
                $kriteriaType = $tipekriteria[$ListKriteria];
                if ($kriteriaType === 'Benefit') {
                    $normalisasi[$ListKriteria] = $listproduk->$ListKriteria / $maxValues[$ListKriteria];
                } elseif ($kriteriaType === 'Cost') {
                    $normalisasi[$ListKriteria] = $minValues[$ListKriteria] / $listproduk->$ListKriteria;
                }
            }
            $nilaiNormalisasi[$listproduk->id] = $normalisasi;
        }

        session()->put('Normal_SAW', $nilaiNormalisasi);

        $preferenceValues = [];
        foreach ($nilaiNormalisasi as $ids => $characterNormalized) {
            $preferenceValue = 0;
            foreach ($KolomKriteria as $index => $kriteriaCol) {
                if (isset($BobotSelect[$index])) {
                    $weightKey = $BobotSelect[$index];
                    $preferenceValue += $characterNormalized[$kriteriaCol] * $normalizedBobots[$weightKey];
                }
            }
            $preferenceValues[$ids] = $preferenceValue;
        }

        session()->put('V_SAW', $preferenceValues);

        // Fetch the character information
        $produkSAW = Produk::whereIn('id', $produkId)->get(['id', 'nama_produk']);
        $produkSAWData = $produkSAW->keyBy('id')->toArray();
        session()->put('produkSAWData', $produkSAWData);
        if (!$produkSAWData) {
            return redirect()->route('admin.perhitungan')->with('error', 'Produk data not found.');
        }
        // Sort preference values in descending order
        arsort($preferenceValues);

        // Rank the characters based on preference values
        $produkRank = [];
        $produkSAW = 1;
        foreach ($preferenceValues as $id => $nilaiSAW) {
            $rankedProdukSAW = new \stdClass();
            $rankedProdukSAW->rank_saw = $produkSAW++;
            $rankedProdukSAW->nilai_preferensi_saw = $nilaiSAW;
            $rankedProdukSAW->nama_produk = $produkSAWData[$id]['nama_produk'];
            $produkRank[] = $rankedProdukSAW;
        }
        session()->put('rankSAW', $produkRank);

        return redirect()->route('admin.perhitungan')->with('success', 'Perhitungan SAW berhasil.');
    }
}
