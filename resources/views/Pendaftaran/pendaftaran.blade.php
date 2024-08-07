<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Pendaftaran</title>
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
@extends('layout.main')

@section("content")
@endsection

<main class="form-signup w-100 m-auto" style="max-width: 800px; margin: 0 auto; padding: 20px;">
  <form action="/store" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 class="h3 mb-3 pt-4 fw-normal">Formulir Pendaftaran Akun & Mahasiswa Baru</h1>
    
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Jenis Kelamin</label>
      <select class="form-select" name="jenis_kelamin" required>
        <option value="L">Laki - laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Tanggal Lahir</label>
      <input class="form-control" name="tanggal_lahir" type="date" required />
    </div>
    
    <div class="mb-3">
      <label class="form-label">Agama</label>
      <select class="form-select" name="agama" required>
        <option value="" disabled selected>Pilih Agama</option>
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Katholik">Katholik</option>
        <option value="Hindu">Hindu</option>
        <option value="Buddha">Buddha</option>
        <option value="Konghucu">Konghucu</option>
      </select>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Alamat</label>
      <textarea class="form-control" name="alamat" rows="5" style="resize: none;" maxlength="150" required></textarea>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Nomor HP/WA</label>
      <input class="form-control" name="no_hp" type="tel" required />
    </div>
    
    <div class="mb-3">
      <label class="form-label">Program Studi</label>
      <select class="form-select" name="program_studi" required>
        <option value="SI">Sistem Informatika</option>
        <option value="M">Manajemen</option>
        <option value="IF">Informatika</option>
      </select>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Jalur Masuk</label>
      <select class="form-select" name="jalur_masuk" required>
        <option value="SNBT">SNBT</option>
        <option value="UTBK">UTBK</option>
        <option value="Mandiri">Mandiri</option>
      </select>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Upload Foto Mahasiswa</label>
      <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
    </div>
    
    <button class="btn btn-primary w-100 py-2" type="submit">Daftar</button>
  </form>
</main>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
