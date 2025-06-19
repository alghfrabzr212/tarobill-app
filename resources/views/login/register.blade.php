<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up - TaroBill</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #111;
      font-family: 'Segoe UI', sans-serif;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .signup-container {
      background-color: #1d1d1d;
      padding: 40px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    .form-control {
      background-color: #2a2a2a;
      border: 1px solid #444;
      color: #fff;
    }
    .form-control:focus {
      background-color: #2a2a2a;
      color: #fff;
      border-color: #4ade80;
      box-shadow: none;
    }
    .btn-signup {
      background-color: purple;
      color: white;
      width: 100%;
      margin-top: 15px;
      border-radius: 8px;
    }
    .signup-footer a {
      color: purple;
      text-decoration: none;
    }
    .signup-footer a:hover {
      text-decoration: underline;
    }
    .close-btn {
      position: absolute;
      right: 30px;
      top: 30px;
      font-size: 24px;
      color: #999;
      text-decoration: none;
    }
    ::placeholder {
      color: #888 !important;
      opacity: 1;
    }
    .tarobill-logo {
      height: 150px;
      width: auto;
    }
    .text-danger {
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="signup-container position-relative">
  <a href="{{ url('/') }}" class="close-btn">&times;</a>
  <div class="login-logo mb-4">
    <img src="{{ asset('assets/images/logo.png') }}" alt="TaroBill Logo" class="tarobill-logo">
  </div>

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3 text-start">
      <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>
      @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3 text-start">
      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
      @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3 text-start">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3 text-start">
      <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
    </div>

    <button type="submit" class="btn btn-signup">Sign Up</button>
  </form>

  <div class="signup-footer mt-3">
    Sudah punya akun? <a href="{{ route('login') }}">Sign In</a>
  </div>
</div>

</body>
</html>
