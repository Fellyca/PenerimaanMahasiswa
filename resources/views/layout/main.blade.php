
<header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">UFE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link {{ $title == 'home' ? 'active' : '' }}" href="/">Home</a>
            </li>
            @if(Auth::user()->role =="mhs")
              <li class="nav-item">
                <a class="nav-link {{ $title == 'pendaftaran' ? 'active' : '' }}" href="/pendaftaran">Pendaftaran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ $title == 'akun' ? 'active' : '' }}" href="/akun">Akun</a>
              </li>

            @endif
              @if(Auth::user()->role =="admin")
                  
              <li class="nav-item">
                <a class="nav-link {{ $title == 'pendaftaran' ? 'active' : '' }}" href="/updateakun">Daftar Akun</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ $title == 'mahasiswa' ? 'active' : '' }}" href="/updatestatus">Mahasiswa</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link {{ $title == 'pengumuman' ? 'active' : '' }}" href="/pengumuman">Pengumuman</a>
                </li>

                @endif
                
                
                <li class="nav-item">
                  <form action="/logout" method="POST">
                    @csrf
                    <button class="nav-link" type="submit">Logout</button>
                  </form>
                
                </li>
          </ul>
          {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> --}}
        </div>
      </div>
    </nav>
</header>
<div>
    @yield('content')
</div>