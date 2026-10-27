<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | E-Presensi</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f7f9fc;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-card {
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }
        .login-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="login-card bg-white">
    <img src="{{ asset('assets/img/login.png') }}" alt="Login Image" class="img-fluid w-100" style="object-fit: contain; max-height: 300px;">
    <div class="p-4">
        <h2 class="text-center mb-3">E-PRESENSI</h2>
        <p class="text-center text-muted mb-4">Silakan login untuk presensi</p>

        @if(Session::has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/proseslogin" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="#" class="text-muted small">Lupa Password?</a>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
