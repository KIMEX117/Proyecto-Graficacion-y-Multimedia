<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Iniciar sesión - P5 Designer</title>
</head>
<body>
    @include('layouts.navbar')

    <!-- MAIN CONTENT -->
    <div class="main-content landing-page">

        <!-- MAIN CONTENT -->
    <div class="main-content landing-page">

        <!-- MAIN BANNER -->
        <div class="main-banner d-flex justify-content-center align-items-center p-5">
            <div class="container d-flex justify-content-center align-items-center w-100 h-100">
                <!-- CARD LOGIN -->
                <div class="card-login p-4">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h1 class="mb-4">
                            INICIAR SESIÓN
                        </h1>
                        <div class="d-flex flex-column mb-3">
                            <label for="email" class="mb-1">Correo electrónico:</label>
                            <input type="email" type="email" name="email" value="{{old('email')}}" placeholder="micorreo@mail.com">
                            @error('email')
                                <div>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column mb-4">
                            <label for="password" class="mb-1">Contraseña:</label>
                            <input type="password" name="password" placeholder="∗ ∗ ∗ ∗ ∗ ∗ ∗ ∗ ∗">
                            @error('password')
                                <div>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="mb-3">
                            Acceder
                        </button>
                        <div class="d-flex justify-content-center align-items-center">
                            <h2 class="mb-0 me-3">
                                ¿No tienes una cuenta?
                            </h2>
                            <a href="{{ route('signup') }}" class="mb-0">
                                Registrate
                            </a>
                        </div>
                    </form>
                </div><!-- end card login -->
            </div>
        </div><!-- end main banner -->

    </div><!-- end main content -->
    
    @include('layouts.footer')

    @include('layouts.scripts')
</body>
</html>