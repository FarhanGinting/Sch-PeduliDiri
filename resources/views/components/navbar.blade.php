<nav class="mb-70 navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset ('images/logo.png') }}" height="48" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('table') ? 'active' : '' }}" href="{{ route('table') }}">Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('image') ? 'active' : '' }}" href="{{ route('image') }}">Galeri Foto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('showdeleted') ? 'active' : '' }}" href="{{ route('showdeleted') }}">Histori Hapus</a>
                </li>                
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="btn btn-secondary" href="#">Sign In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>