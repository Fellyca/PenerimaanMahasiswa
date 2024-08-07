<!doctype html>
<html lang="en">
  <head><script src="/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/css/daftarmhs.css" rel="stylesheet">
    <link rel="icon" href="/img/logo (3).png" type="image/png">
  </head>
  <body>

    @extends('layout.main')

    @section('content')
    @endsection
    
    @extends('layout.mode')

@section('mode')
@endsection

    <div class="container pt-5">
      <h1 class="mb-4">Daftar Mahasiswa</h1>
      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}

      </div>
    @endif
      
      <div class="table-container">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Program Studi</th>
              <th>Jalur Masuk</th>
              <th>Status</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            @if ($mahasiswas->count())
                @foreach ($mahasiswas as $index => $mahasiswa)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->program_studi }}</td>
                        <td>{{ $mahasiswa->jalur_masuk }}</td>
                        <td>
                            <form action="/updatestatus/{{ $mahasiswa->id }}" method="POST">
                                @csrf
                                <select name="status" class="form-select" onchange="this.form.submit()" {{ in_array($mahasiswa->status, ['diterima', 'ditolak']) ? 'disabled' : '' }}>
                                    <option value="diproses" {{ $mahasiswa->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="diterima" {{ $mahasiswa->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ $mahasiswa->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </form>
                            
                        </td>
                        <td>
                            <a href="/updatestatus/{{ $mahasiswa->id }}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Tabel belum ada data</td> <!-- Pesan jika tidak ada data -->
                </tr>
            @endif
        </tbody>
        
        </table>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
