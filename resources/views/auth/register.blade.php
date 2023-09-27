<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Perpus | Register</title>

    <style>
        .main {
            height: 100vh;
            box-sizing: border-box;
        }

        .register-box {
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

        {{-- Alert Error Register --}}
        @if ($errors->any())
            <div class="alert alert-danger" style="width:450px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- Alert Status Register Success --}}
        @if (session('status'))
            <div class="alert alert-success text-center" style="width: 450px;">
                {{ session('message') }}
            </div>
        @endif
        <div class="register-box">
            <div class="text-center">
                <h3>Register</h3>
            </div>
            <form action="" method="POST">
                @csrf
                {{-- Register Username --}}
                <div>
                    <label for="userame" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>

                {{-- Register Password --}}
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                {{-- Register Phone --}}
                <div>
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>

                {{-- Register Address --}}
                <div>
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" required></textarea>
                </div>

                {{-- Button --}}
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="text-center">
                    <p>
                        Already have account? <a href="login">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
</body>

</html>
