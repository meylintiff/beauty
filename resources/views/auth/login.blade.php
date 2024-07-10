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
  <link href="{{ asset('AdminLTE/dist/img/logo.png') }}" rel="icon">

  <style>
    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 100vh;
      padding: 0 5%;
    }

    .login-box {
      width: 360px;
      padding: 20px;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 8px;
    }

    .login-box .login-header {
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

<body class="hold-transition login-page bg-dark">
  <div class="container">
    <div class="login-box bg-transparent">
      <div class="login-header">
        <a href="{{ route('login') }}" class="h1"><b>Beauty</b>Skincare</a>
      </div>
      <p class="login-box-msg">Silahkan login untuk masuk</p>

      <form action="{{ route('login-proses') }}" method="post">
        @csrf
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
        <div class="row">
          <!-- /.col -->
          <div class="col mb-2">
            <button type="submit" class="btn btn-outline-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="{{ route('register') }}" class="btn btn-block btn-outline-secondary">
          Registrasi
        </a>
        <a href="{{ route('login.google') }}" class="btn btn-block btn-outline-danger">
          <i class="fab fa-google-plus mr-2"></i> Masuk Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ route('forgot-password') }}">Lupa password?</a>
      </p>
    </div>
    <!-- /.login-box -->
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

  @if ($message = Session::get('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Login Berhasil!',
      text: '{{ $message }}',
      confirmButtonText: 'OK'
    });
  </script>
  @endif

  @if ($message = Session::get('failed'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Login Gagal!',
      text: '{{ $message }}',
      confirmButtonText: 'OK'
    });
  </script>
  @endif

</body>

</html>