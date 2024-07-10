@extends('layout.app')

@section('content')
<div class="content-wrapper mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-warning d-flex justify-content-between align-items-center">
                        <p class="flex-grow-1 mb-0">Anda Berhasil Login!</p>
                        <p class="card-title mb-0"><strong>{{ Auth::user()->role }}</strong></p>
                    </div>
                    <div class="card-body shadow-lg">
                        <h2 class="card-title mb-2">Selamat Datang Di Website <span class="text-warning" style="font-weight: 800;">Beuty Skincare!</span></h2>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-outline-warning">Telusuri Perhitungan</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="card h-100">
                    <div class="card-body shadow-lg text-center">
                        <h2 class="card-title text-center w-100 mb-2"><span class="text-warning" style="font-weight: 800;">Kriteria</span></h2>
                        @if (isset($countKolom))
                        <h1 class="card-text text-center">{{ $countKolom }}</h1>
                        @else
                        <i class="fas fa-check-circle" style="font-size: 30px; margin-top: 5px"></i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card h-100">
                    <div class="card-body shadow-lg text-center">
                        <h2 class="card-title text-center w-100 mb-2"><span class="text-warning" style="font-weight: 800;">Alternatif</span></h2>
                        @if (isset($alternatif))
                        <h1 class="card-text text-center">{{ $alternatif }}</h1>
                        @else
                        <i class="fas fa-check-circle" style="font-size: 30px; margin-top: 5px"></i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card h-100">
                    <div class="card-body shadow-lg text-center">
                        <h2 class="card-title text-center w-100 mb-2"><span class="text-warning" style="font-weight: 800;">Administrator</span></h2>
                        @if (isset($admin))
                        <h1 class="card-text text-center">{{ $admin }}</h1>
                        @else
                        <i class="fas fa-check-circle" style="font-size: 30px; margin-top: 5px"></i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card h-100">
                    <div class="card-body shadow-lg text-center">
                        <h2 class="card-title text-center w-100 mb-2"><span class="text-warning" style="font-weight: 800;">User</span></h2>
                        @if (isset($users))
                        <h1 class="card-text text-center">{{ $users }}</h1>
                        @else
                        <i class="fas fa-check-circle" style="font-size: 30px; margin-top: 5px"></i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body shadow-lg d-flex justify-content-center align-items-center h-100">
                        <h1 id="clock" class="card-text text-center" style="font-size: 3rem; margin: 0; display: inline-block; vertical-align: middle; line-height: normal;">12:34:56</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection