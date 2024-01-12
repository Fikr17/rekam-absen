<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <nav class="navbar navbar-light bg-warning">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Bot Absen</span>
      </div>
    </nav>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/status-bot">Status</a>
        </li>
        @if (Session::get('log')==True || Cookie::get('log')==True)
        <li class="nav-item">
          <a class="nav-link" href="/course">Daftar Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/rekam">Rekam Absen</a>
        </li>
          @if (Session::get('level')=='admin' || Cookie::get('level')=='admin')
          <li class="nav-item">
            <a class="nav-link" href="/rencana">Rencana absen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/akun">Akun</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/setting">Setting</a>
          </li>
          @endif
        @endif
      </ul>
      @if (Session::get('log')!=True && Cookie::get('log')!=True)
      <ul class="navbar-nav me-0 mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/log-in">Login</a>
        </li>
      </ul>
      @else
      <ul class="navbar-nav me-0 mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/log-out">Log out</a>
        </li>
      </ul>
      @endif
    </div>
  </div>
</nav>