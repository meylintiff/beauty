@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('simpan-pilihan') }}">
                    @csrf
                    <div class="form-group">
                        @if (isset($alternatif))
                        <label for="alternatif">Pilih Alternatif:</label>
                        <select class="form-control" id="alternatif" name="alternatif">
                            @foreach ($alternatif as $alt)
                            <option value="{{ $alt->nama_produk }}">{{ $alt->nama_produk }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-outline-warning">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Card to display session data -->
        <div class="card mt-4">
            <div class="card-header bg-warning">
                <h3 class="card-title">Data dari Session</h3>
            </div>
            <div class="card-body">
                @if (!empty($pilihanAlternatif))
                <table class="table table-bordered table-secondary">
                    <thead>
                        <tr>
                            <th>ID</th>
                            @foreach ($filter as $filterKolom)
                            <th>{{ ucwords(str_replace('_', ' ', $filterKolom)) }}</th>
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilaiAlt as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @foreach ($filter as $filterTd)
                            <td>{{ $produk->$filterTd }}</td>
                            @endforeach
                            <td>
                                <form action="{{ route('hapus-pilihan') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}">
                                    <button type="submit" class="btn btn-outline-warning btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Tidak ada data alternatif yang dipilih.</p>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-center">
                @if ($lastBobot)
                <div class="footer w-50 d-flex">
                    <a href="{{ route('Hitung') }}" class="btn btn-outline-warning btn-block"><i class="fas fa-calculator"></i> Hitung</a>
                </div>
                @else
                <div class="col-12">
                    <div class="alert alert-dark" role="alert">
                        Silahkan Masukkan Bobot Dulu
                    </div>
                </div>
                @endif
            </div>
        </div>

        @if(session('Bobot_Normal'))
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hasil Perhitungan SAW</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Bobot Normalisasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('Bobot_Normal') as $kriteria => $bobot)
                        <tr>
                            <td>{{ $kriteria }}</td>
                            <td>{{ $bobot }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        @if(session('Normal_SAW'))
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hasil Perhitungan SAW</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            @foreach($KolomKriteria as $kriteria)
                            <th>{{ $kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('Normal_SAW') as $produkId => $normalisasi)
                        <tr>
                            @if (session('produkSAWData') && array_key_exists($produkId, session('produkSAWData')))
                            <td>{{ session('produkSAWData')[$produkId]['nama_produk'] }}</td>
                            @else
                            <td>Data Produk Tidak Ditemukan</td>
                            @endif
                            @foreach($normalisasi as $nilai)
                            <td>{{ $nilai }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if(session()->has('rankSAW') && !empty(session('rankSAW')))
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hasil Perhitungan SAW</h3>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Nilai Preferensi SAW</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('rankSAW') as $rankedProduk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rankedProduk->nama_produk }}</td>
                            <td>{{ $rankedProduk->nilai_preferensi_saw }}</td>
                            <td>{{ $rankedProduk->rank_saw }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </section>
</div>
@endsection