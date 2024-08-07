<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="/img/logo (3).png" type="image/png">
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    @extends('layout.mode')

    @section('mode')
    @endsection

  
<main class="form-signup w-100 m-auto" style="max-width: 800px;margin: 0 auto; padding: 20px;">
  <form method="POST" action="/login">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>

    @if (session()->has('loginError'))
    <div class="alert alert-danger" role="alert">
      {{ session('loginError') }}
    </div>
        
    @endif

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Alamat Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@gmail.com" name="email" required autofocus>
      </div>
      <div class="mb-3">
          <label class="form-label" >Password</label>
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
      </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
    <br>
    <a href="/signup">Belum punya akun? Sign Up</a>
  </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
