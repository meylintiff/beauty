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
                <h3 class="card-title">Pembobotan</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered w-100d">
                    <thead class="bg-dark">
                        <tr>
                            <th>ID</th>
                            @foreach ($columns as $column)
                            @if($column != 'id')
                            <th>{{ ucwords(str_replace('_', ' ', $column)) }}</th>
                            @endif
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bobot as $b)
                        <tr>
                            <td>{{ $b->id }}</td>
                            <td>{{ $b->created_at }}</td>
                            <td>{{ $b->user->name }}</td>
                            @foreach ($columns as $column)
                            @if($column != 'id' && $column != 'created_at' && $column != 'users_id')
                            <td>{{ $b->$column }}</td>
                            @endif
                            @endforeach
                            <td>
                                <div class="btn-group" role="group">
                                    @if ( Auth::user() && (Auth::user()->id == $b->user_id || Auth::user()->role == 'Administrator') )
                                    <button type="button" class="btn btn-outline-warning btn-sm mr-2 rounded" data-toggle="modal" data-target="#editModal{{ $b->id }}">Edit</button>
                                    @endif
                                    @if ( Auth::user() && (Auth::user()->id == $b->user_id || Auth::user()->role == 'Administrator') )
                                    <button type="button" class="btn btn-outline-warning btn-sm mr-2 rounded" data-toggle="modal" data-target="#deleteModal{{ $b->id }}">Delete</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#addModal">Tambah Pembobotan</button>
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
            <form action="{{ route('pembobotan.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Pembobotan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="users_id">Nama User</label>
                        <select class="form-control" id="users_id" name="users_id" required>
                            @foreach($user as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Created At</label>
                        <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="{{ now()->format('Y-m-d\TH:i') }}" required>
                    </div>
                    @foreach ($columns as $column)
                    @if($column != 'id' && $column != 'created_at' && $column != 'users_id')
                    <div class="form-group">
                        <label for="{{ $column }}">{{ ucwords(str_replace('_', ' ', $column)) }}</label>
                        <input type="number" class="form-control" id="{{ $column }}" name="{{ $column }}" required>
                    </div>
                    @endif
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

<!-- Edit Modals -->
@foreach($bobot as $b)
<div class="modal fade" id="editModal{{ $b->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $b->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pembobotan.update', $b->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $b->id }}">Edit Pembobotan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="users_id">Nama User</label>
                        <select class="form-control" id="users_id" name="users_id" required>
                            @foreach($user as $u)
                            <option value="{{ $u->id }}" {{ $b->users_id == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Created At</label>
                        <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="{{ \Carbon\Carbon::parse($b->created_at)->format('Y-m-d\TH:i') }}" required>
                    </div>
                    @foreach ($columns as $column)
                    @if($column != 'id' && $column != 'created_at' && $column != 'users_id')
                    <div class="form-group">
                        <label for="{{ $column }}">{{ ucwords(str_replace('_', ' ', $column)) }}</label>
                        <input type="number" class="form-control" id="{{ $column }}" name="{{ $column }}" value="{{ $b->$column }}" required>
                    </div>
                    @endif
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

<!-- Delete Modals -->
@foreach($bobot as $b)
<div class="modal fade" id="deleteModal{{ $b->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $b->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pembobotan.destroy', $b->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $b->id }}">Konfirmasi Hapus</h5>
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
@endforeach
@endsection