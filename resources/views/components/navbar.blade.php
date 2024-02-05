<nav class="mb-70 navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('images/logo.png') }}" height="48" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('table') ? 'active' : '' }}"
                        href="{{ route('catatan.table') }}">Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('image') ? 'active' : '' }}"
                        href="{{ route('catatan.image') }}">Galeri Foto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('showdeleted') ? 'active' : '' }}"
                        href="{{ route('catatan.showdeleted') }}">Histori Hapus</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user()->foto != '')
                                <div class="rounded-circle overflow-hidden" style="width: 54px; height: 54px;">
                                    <img src="{{ asset(Auth::user()->foto) }}" class="img-fluid dropdown-toggle"
                                        alt="User Photo" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @else
                                <img src="{{ asset('images/profile.gif') }}" class="img-fluid dropdown-toggle"
                                    width="54px" alt="Default User Photo">
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('auth.show', Auth::id()) }}">Profile Akun</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                        </div>
                    </li>
                @endif
            </ul>


        </div>
    </div>
</nav>
