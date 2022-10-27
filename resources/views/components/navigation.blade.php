<nav class="navbar navbar-expand-lg bg-danger navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('buku.index') }}">{{ $title }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link @if (Request::is('/')) active @endif" href="{{ route('buku.index') }}">
            Buku Saya
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (Request::is('/')) active @endif" href="{{ route('buku.index') }}">
            Catatan Saya
          </a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              {{ Auth::user()->username }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">My Profile</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link @if (Request::is('/')) active @endif" href="{{ route('buku.index') }}">
              Login
            </a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
