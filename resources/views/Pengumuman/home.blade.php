<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <link rel="icon" href="/img/logo (3).png" type="image/png">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/carousel.css" rel="stylesheet">
  </head>
  <body>
    @extends('layout.mode')

    @section('mode')
    @endsection

    @extends('layout.main')

    @section("content")
    <main>

      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- START THE FEATURETTES -->
        <h2 class="featurette-heading h-1 m-auto pt-2">PENGUMUMAN</h2>
        <hr>

        @foreach($pengumumans as $pengumuman)
        <div class="row featurette mb-4">
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">{{ $pengumuman->judul }}</h2>
            <p class="lead">{{ $pengumuman->deskripsi }}</p>
            @if (Auth::user()->role =="admin")
              <a href="/{{$pengumuman->id }}/edit" class="btn btn-warning me-2">Edit</a>
              <form action="/{{$pengumuman->id }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              
            @endif
          </div>
          <div class="col-md-5">
            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="{{ asset('storage/' . $pengumuman->thumbnail) }}" alt="{{ $pengumuman->judul }}">
          </div>
        </div>
        <hr class="featurette-divider">
        @endforeach

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->

      <!-- FOOTER -->
      <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
      </footer>
    </main>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
