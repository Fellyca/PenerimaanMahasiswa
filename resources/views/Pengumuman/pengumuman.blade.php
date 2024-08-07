<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Input Pengumuman</title>
    <link rel="icon" href="/img/logo (3).png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
  
    @extends('layout.main')

    @section('content')
    @endsection
    <main class="form-signup w-100 m-auto" style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <form action="pengumuman/store" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Pengumuman</h1>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" style="resize: none;" maxlength="150" required placeholder="Deskripsi"></textarea>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Upload Thumbnail</label>
                <input class="form-control" id="thumbnail" name="thumbnail" type="file" accept="image/*" required>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Submit</button>
        </form>
    </main>
    
    
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
