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
      <h1 class="mb-4">Daftar Akun</h1>
      <div class="table-container">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Email</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @if ($users->count())
                @foreach ($users as $index => $user)
                    <tr>
                    <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="/updateakun" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit" name="status" value="Diterima" class="status-button status {{ $user->is_accepted ? 'status-accepted' : 'status-default' }}" onclick="changeStatus(this, 'Diterima', 'status')">Diterima</button>
                            <button type="submit" name="status" value="Ditolak" class="status-button status ms-2 {{ !$user->is_accepted ? 'status-rejected' : 'status-default' }}" onclick="changeStatus(this, 'Ditolak', 'status')">Ditolak</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" class="text-center">Tabel belum ada data</td> <!-- Pesan jika tidak ada data -->
                </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      function changeStatus(button, status, type) {
        const row = button.closest('tr');
        const buttons = row.querySelectorAll(`.status-button.${type}`);
        const statusButtons = row.querySelectorAll('.status-button.status');

        buttons.forEach(btn => {
          if (btn.textContent === status) {
            btn.classList.remove('status-default');
            btn.classList.add(status === 'Diterima' ? 'status-accepted' : 'status-rejected');
          } else {
            btn.classList.add('status-default');
            btn.classList.remove('status-accepted', 'status-rejected');
          }
        });

        // Disable/Enable the 'Diterima' button in the 'Status' column based on 'Pembuatan Akun'
        if (type === 'akun') {
          const diterimaButton = Array.from(statusButtons).find(btn => btn.textContent === 'Diterima');
          if (status === 'Ditolak') {
            diterimaButton.setAttribute('disabled', 'true');
          } else {
            diterimaButton.removeAttribute('disabled');
          }
        }
      }
    </script>
  </body>
</html>
