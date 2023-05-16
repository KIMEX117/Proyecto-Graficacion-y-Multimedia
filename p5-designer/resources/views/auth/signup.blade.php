<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Registrarse - P5 Designer</title>
</head>
<body>
    @include('layouts.navbar')

    <!-- MAIN CONTENT -->
    <div class="main-content landing-page">

        <!-- MAIN BANNER -->
        <div class="main-banner d-flex justify-content-center align-items-center p-5">
            <div class="container d-flex flex-column justify-content-center align-items-center w-100 h-100">
                {{-- MENSAJES DE ÉXITO Y ERROR --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Éxito</strong> - {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error</strong> - {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- CARD LOGIN -->
                <div class="card-login p-4">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <h1 class="mb-4">
                            REGISTRARSE
                        </h1>
                        <div class="d-flex flex-column mb-3">
                            <label for="username" class="mb-1">Nombre de usuario:</label>
                            <input type="text" name="username" value="{{old('username')}}" placeholder="Mínimo 5 caracteres" minlength="5" maxlength="16">
                            @error('username')
                                <div>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label for="email" class="mb-1">Correo electrónico:</label>
                            <input type="email" name="email" value="{{old('email')}}" placeholder="ejemplo@mail.com">
                            @error('email')
                                <div>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column mb-4">
                            <label for="password" class="mb-1">Contraseña:</label>
                            <input type="password" name="password" id="" placeholder="Mínimo 8 caracteres" minlength="8" maxlength="16">
                            @error('password')
                                <div>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column mb-4">
                            <label for="repeat_password" class="mb-1">Repetir contraseña:</label>
                            <input type="password" name="password_confirmation" id="" placeholder="∗ ∗ ∗ ∗ ∗ ∗ ∗ ∗ ∗" minlength="8" maxlength="16">
                            @error('password_confirmation')
                                <div>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="mb-3">
                            Crear cuenta
                        </button>
                        <div class="d-flex justify-content-center align-items-center">
                            <h2 class="mb-0 me-3">
                                ¿Ya tienes una cuenta?
                            </h2>
                            <a href="{{ route('login') }}" class="mb-0">
                                Inicia sesión
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