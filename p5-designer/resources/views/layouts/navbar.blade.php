<!-- HEADER -->
<nav id="header" class="navbar navbar-expand-lg navbar-dark text-white bgcolor-secondary">
    <div class="container">
        <a class="navbar-brand d-flex" href="{{ route('welcome') }}">
            <img src="{{asset('images/logo-blanco.png')}}" height="60" alt="asd">
            <div class="d-flex flex-column justify-content-center ms-3">
                <h1 class="logo-title fs-20 mb-2">P5 Designer</h1>
                <h2 class="logo-subtitle fs-14 mb-0">Software de diseño</h2>
            </div>
        </a>
        <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white fs-22"></span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav navbar-options">
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('welcome') }}#testimonios">Testimonios</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('welcome') }}#blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('welcome') }}#precios">Precios</a></li>
                @if (!Auth::user())
                    <li class="nav-item"><a class="nav-link px-3 pe-4" href="{{ route('login') }}">Iniciar sesión</a></li>
                    <li class="nav-item"><a class="nav-link px-3 my-3 main-btn" href="{{ route('signup') }}">Comenzar</a></li>
                @endif
                @if (Auth::user())
                <li class="nav-item"><a class="nav-link px-3 pe-4" href="{{ route('home') }}">Mis diseños</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link px-3 my-3 main-btn logout-btn">Cerrar sesión</button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav><!-- end header -->