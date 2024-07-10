<div class="group mb-2">
    <div class="form-group">
        <div class="row align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="C1" class=" text-md-end">Harga</label>
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
                <label for="C1" class=" text-md-end">Harga</label>
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
                <label for="C1" class=" text-md-end">Harga</label>
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
                <label for="C1" class=" text-md-end">Harga</label>
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
                <label class=" text-md-end">Harga</label>
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