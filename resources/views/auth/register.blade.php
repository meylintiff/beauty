<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beauty Skincare</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="{{ asset('AdminLTE/dist/img/logo.png') }}" rel="icon">

    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
            padding: 0 5%;
        }

        .register-box {
            width: 420px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
        }

        .register-box .register-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .image-box {
            width: 50%;
            text-align: center;
        }

        .image-box img {
            max-width: 100%;
            border-radius: 8px;
        }
    </style>
</head>

<body class="hold-transition register-page bg-dark">
    <div class="container">
        <div class="register-box bg-transparent">
            <div class="register-header">
                <a href="{{ route('register') }}" class="h1"><b>Beauty</b>Skincare</a>
            </div>
            <p class="login-box-msg">Silahkan Daftar Akun Baru</p>

            <form action="{{ route('register-proses') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('nama')
                <small>{{ $message }}</small>
                @enderror

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <small>{{ $message }}</small>
                @enderror

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <small>{{ $message }}</small>
                @enderror

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <select name="jenis_kelamin" class="form-control">
                                <option value="" disabled selected>Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-venus-mars"></span>
                                </div>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <select name="jenis_kulit" class="form-control">
                                <option value="" disabled selected>Jenis Kulit</option>
                                <option value="Normal">Normal</option>
                                <option value="Kering">Kering</option>
                                <option value="Berminyak">Berminyak</option>
                                <option value="Sensitif">Sensitif</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-stroopwafel"></span>
                                </div>
                            </div>
                        </div>
                        @error('jenis_kulit')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <input type="number" name="umur" class="form-control" placeholder="Umur">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-calendar"></span>
                                </div>
                            </div>
                        </div>
                        @error('umur')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <input type="text" name="no_telp" class="form-control" placeholder="No. Telepon">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                        @error('no_telp')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="input-group mb-3">
                    <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                </div>
                @error('alamat')
                <small>{{ $message }}</small>
                @enderror

                <div class="row">
                    <div class="col-8">
                        <a href="{{ route('login') }}" class="btn btn-block btn-outline-secondary text-center">Punya Akun?</a>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-outline-primary btn-block">Registrasi</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="image-box">
            <img src="../AdminLTE/dist/img/skills.webp" alt="Beauty Skincare">
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('Registrasi Berhasil'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Registrasi Berhasil!',
            text: '{{ $message }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @if ($message = Session::get('Registrasi Gagal'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Registrasi Gagal!',
            text: '{{ $message }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

</body>

</html>