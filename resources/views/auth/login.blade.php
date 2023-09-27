<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Smart Perpus | Login</title>

  <style>
    .main {
      height: 100vh;
      box-sizing: border-box;
    }

    .login-box {
       width: 450px;
       border: solid 1px;
       padding: 30px;
    }

    form div {
      margin-bottom: 15px;
    }
  </style>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
  <div class="main d-flex flex-column justify-content-center align-items-center">
    <h2>SMART PERPUS</h2>
    @if (session('status'))
      <div class="alert alert-danger text-center" style="width: 450px;">
        {{ session('message') }}
      </div>
    @endif
    <div class="login-box">
      <div class="text-center mx-3">
        <h5>Selamat datang!</h5>
        <p>Silakan masuk untuk mengakses halaman</p>
      </div>
      <form action="" method="POST">
        @csrf
        <!-- Username -->
        <div>
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <!-- Button -->
        <div>
          <button type="submit" class="btn btn-primary form-control">Login</button>
        </div>
        <div class="text-center">
          <p>
            Don't have an account? <a href="register">Register</a>
          </p>
        </div>
      </form>
    </div>
  </div>

  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
</body>

</html>