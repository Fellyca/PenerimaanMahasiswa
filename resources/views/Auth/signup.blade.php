<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Sign Up</title>
    <link rel="icon" href="/img/logo (3).png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
  @extends('layout.mode')

@section('mode')
@endsection

    
<main class="form-signup w-100 m-auto" style="max-width: 800px;margin: 0 auto; padding: 20px;">
  <form onsubmit="return validateForm()" action="/signup" method="POST">
    @csrf
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
    <h1 class="h3 mb-3 fw-normal">Formulir Pendaftaran Akun & Mahasiswa Baru</h1>
    
    <div class="mb-3">
        <label for="emailInput" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@gmail.com" autofocus required>
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    <div class="mb-3">
        <label for="passwordInput" class="form-label">Password</label>
        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" minlength="6" required>
    </div>
    <div class="mb-3">
      <label for="confirmPasswordInput" class="form-label">Konfirmasi Password</label>
      <input type="password" class="form-control" id="confirmPasswordInput" placeholder="Konfirmasi Password" required>
    </div>
    
    {{-- <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div> --}}
    <button class="btn btn-primary w-100 py-2" type="submit">Sign Up</button>
    <a href="/login">Sudah punya akun? Login</a>
  </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
  function validateForm() {
    const password = document.getElementById('passwordInput').value;
    const confirmPassword = document.getElementById('confirmPasswordInput').value;
    
    if (password !== confirmPassword) {
      alert('Konfirmasi password tidak sesuai.');
      return false;
    }
    
    return true;
  }
</script>
</body>
</html>
