<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('perbandingan.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Perbandingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('admin.partials.group.group-harga')
                    <div class="group mb-2">
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C2" class=" text-md-end">Kandungan</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Harga</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C2" class=" text-md-end">Kandungan</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Kandungan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C2" class=" text-md-end">Kandungan</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Isi</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C2" class=" text-md-end">Kandungan</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Masa Simpan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C2" class=" text-md-end">Kandungan</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Jumlah Terjual</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="group mb-2">
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C3" class=" text-md-end">Isi</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Harga</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C3" class=" text-md-end">Isi</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Kandungan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C3" class=" text-md-end">Isi</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Isi</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C3" class=" text-md-end">Isi</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Masa Simpan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-md-end">
                                    <label for="C3" class=" text-md-end">Isi</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="C1" name="C1" required>
                                        <option value="">Pilih nilai perbandingan</option>
                                        @foreach($nilaiPerbandingan as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-md-start">
                                    <label class=" text-md-start">Jumlah Terjual</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>