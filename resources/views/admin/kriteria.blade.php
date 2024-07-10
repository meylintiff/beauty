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
        <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">KRITERIA</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover border-warning w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            @if( Auth::user()->role == 'Administrator')
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriteria as $index => $k)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $k['kriteria'])) }}</td>
                            <td>{{ $k['tipe'] }}</td>
                            @if( Auth::user()->role == 'Administrator')
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-warning btn-sm mr-2 rounded" data-toggle="modal" data-target="#editKriteria{{ $index + 1 }}">Edit</button>
                                    <button type="button" class="btn btn-outline-warning btn-sm mr-2 rounded" data-toggle="modal" data-target="#deleteKriteria{{ $index + 1 }}">Delete</button>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    @if( Auth::user()->role == 'Administrator')
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#tambahKriteria">
                            Tambah Data
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@if( Auth::user()->role == 'Administrator')
<!-- Tambahkan modal popup untuk edit -->
@foreach($kriteria as $index => $k)
<div class="modal fade" id="editKriteria{{ $index + 1 }}" tabindex="-1" aria-labelledby="editKriteriaLabel{{ $index + 1 }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKriteriaLabel{{ $index + 1 }}">Edit Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kriteria.update', $k['kriteria']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ ucfirst(str_replace('_', ' ', $k['kriteria'])) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Kriteria</label>
                        <select class="form-control" id="tipe" name="tipe" required>
                            <option value="Benefit" {{ $k['tipe'] == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ $k['tipe'] == 'Cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-outline-warning">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambahkan modal popup untuk delete -->
<div class="modal fade" id="deleteKriteria{{ $index + 1 }}" tabindex="-1" aria-labelledby="deleteKriteriaLabel{{ $index + 1 }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteKriteriaLabel{{ $index + 1 }}">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kriteria.delete', $k['kriteria']) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-outline-warning">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Tambahkan modal popup untuk tambah -->
<div class="modal fade" id="tambahKriteria" tabindex="-1" aria-labelledby="tambahKriteriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKriteriaLabel">Tambah Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kriteria.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Kriteria</label>
                        <select class="form-control" id="tipe" name="tipe" required>
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-outline-warning">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection