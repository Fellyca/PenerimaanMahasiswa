
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <script src="/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Bootstrap contributors">
  <meta name="generator" content="Hugo 0.112.5">
  <title>Profil Mahasiswa</title>
  <link rel="icon" href="/img/logo (3).png" type="image/png">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link href="/css/akun.css" rel="stylesheet">
</head>
<body>
@extends('layout.mode')

@section('mode')
@endsection
@extends('layout.main')

@section('content')
@endsection

  <main class="form-signin w-100 m-auto">
    <div class="profile-container">
      @if ($mahasiswa)
      <div class="profile-header">
        <img src="{{ $mahasiswa->foto ? Storage::url($mahasiswa->foto) : '/path/to/default-image.jpg' }}" alt="Foto Mahasiswa" class="profile-photo">
        <h1 class="h3 mb-3 fw-normal">Profil Mahasiswa</h1>
      </div>
      <div class="profile-info row">
        <div class="col-md-6 mb-3">
          <label class="form-label"><strong>Nama:</strong></label>
          <p class="form-control-static">{{ $mahasiswa->nama }}</p>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"><strong>Jenis Kelamin:</strong></label>
          <p class="form-control-static">{{ $mahasiswa->jenis_kelamin }}</p>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"><strong>Tanggal Lahir:</strong></label>
          <p class="form-control-static">{{ $mahasiswa->tanggal_lahir }}</p>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"><strong>Agama:</strong></label>
          <p class="form-control-static">{{ $mahasiswa->agama }}</p>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"><strong>Alamat:</strong></label>
          <p class="form-control-static">{{ $mahasiswa->alamat }}</p>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"><strong>Nomor HP/WA:</strong></label>
          <p class="form-control-static">{{ $mahasiswa->no_hp }}</p>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"><strong>Program Studi:</strong></label>
          <p class="form-control-static">{{ $mahasiswa->program_studi }}</p>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"><strong>Jalur Masuk:</strong></label>
          <p class="form-control-static">{{ $mahasiswa->jalur_masuk }}</p>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"><strong>Status:</strong></label>
          <p class="form-control-static">{{ $mahasiswa->status }}</p>
        </div>
      </div>
      @else
          <h3 class="text-center">Belum ada data mahasiswa.</h3>
      @endif
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

