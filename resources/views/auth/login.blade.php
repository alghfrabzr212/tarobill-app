<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In - TaroBill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #800080; /* Ungu */
            font-family: 'Segoe UI', sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff; /* Putih */
            padding: 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-logo span {
            color: #800080;
        }

        .form-control {
            background-color: #fff;
            border: 1px solid #ccc;
            color: #333;
        }

        .form-control:focus {
            border-color: #800080;
            box-shadow: none;
        }

        .btn-login {
            background-color: #800080;
            color: white;
            width: 100%;
            margin-top: 15px;
            border-radius: 8px;
        }

        .btn-login:hover {
            background-color: #5a35a2;
            color: white;
        }

        .login-footer a {
            color: #800080;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .close-btn {
            position: absolute;
            right: 30px;
            top: 30px;
            font-size: 24px;
            color: #aaa;
            text-decoration: none;
        }

        .tarobill-logo {
            height: 120px;
            width: auto;
        }

        .text-danger {
            font-size: 14px;
        }

        ::placeholder {
            color: #999 !important;
        }
    </style>
</head>
<body>

<div class="login-container position-relative">
    <a href="{{ url('/') }}" class="close-btn">&times;</a>

    <div class="login-logo mb-4">
        <img src="{{ asset('assets/images/logo.png') }}" alt="TaroBill Logo" class="tarobill-logo">
    </div>

    {{-- Login Form --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3 text-start">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required autofocus>
            @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 text-start">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 form-check text-start">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Ingat saya</label>
        </div>
        <button type="submit" class="btn btn-login">Login</button>
    </form>

    <div class="login-footer mt-3">
        <div class="mb-2">
            <a href="{{ route('password.request') }}">Lupa Password?</a>
        </div>
        <div>
            Belum punya akun? <a href="{{ route('register') }}">Sign Up</a>
        </div>
    </div>
</div>

</body>
</html>
