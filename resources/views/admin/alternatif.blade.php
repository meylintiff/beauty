@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">ALTERNATIF</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-rounded w-100">
                    <thead class="bg-warning text-white"> <!-- Menambahkan kelas text-white untuk teks putih -->
                        <tr>
                            <th>ID</th>
                            @foreach ($columns as $column)
                            <th>{{ ucwords(str_replace('_', ' ', $column)) }}</th>
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark text-white"> <!-- Menambahkan kelas text-white untuk teks putih -->
                        @foreach ($produk as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @foreach ($columns as $column)
                            <td>{{ ucwords(str_replace('.000', '', $k->$column)) }}</td>
                            @endforeach
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-warning btn-sm mr-2 rounded" data-toggle="modal" data-target="#editModal{{ $k->id }}">Edit</button>
                                    @if ( Auth::user()->role == 'Administrator' )
                                    <button type="button" class="btn btn-outline-warning btn-sm mr-2 rounded" data-toggle="modal" data-target="#deleteModal{{ $k->id }}">Delete</button>                                    
                                    @endif
                                </div>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $k->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $k->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('alternatif.destroy', $k->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $k->id }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
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

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $k->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $k->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('alternatif.update', $k->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $k->id }}">Edit Alternatif</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach ($columns as $column)
                                            <div class="form-group">
                                                <label for="{{ $column }}">{{ ucwords(str_replace('_', ' ', $column)) }}</label>
                                                <input type="text" class="form-control" id="{{ $column }}" name="{{ $column }}" value="{{ $k->$column }}" required>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-outline-warning">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#addModal">Tambah Alternatif</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('alternatif.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach ($columns as $column)
                    <div class="form-group">
                        <label for="{{ $column }}">{{ ucwords(str_replace('_', ' ', $column)) }}</label>
                        <input type="text" class="form-control" id="{{ $column }}" name="{{ $column }}" required>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-outline-warning">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection