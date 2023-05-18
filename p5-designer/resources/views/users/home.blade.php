<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Mis diseños - P5 Designer</title>
</head>
<body>
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
                    <li class="nav-item">
                        <div class="user-data d-flex flex-column text-end pe-lg-4 pe-0 pt-lg-0 pt-3">
                            <h3>{{Auth::user()->username}}</h3>
                            <h4 class="text-lg-end text-center">{{Auth::user()->email}}</h4>
                        </div>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link px-3 my-3 main-btn logout-btn">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav><!-- end header -->

    <!-- MAIN CONTENT -->
    <div class="main-content user-designs bgcolor-primary">

        <!-- USER DESIGNS -->
        <div class="container d-flex flex-column h-100 p-5">
            <h1 class="text-center text-md-start mb-3">
                Mis diseños
            </h1>
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-center mb-5">
                <h2 class="d-flex align-items-center mb-3 mb-md-0">
                    Cantidad actual creados: 
                    <b class="ms-4">
                        @if (isset($designs))
                            {{count($designs)}}
                        @endif
                    </b>
                </h2>
                <a href="{{route('design.create')}}" class="main-btn add-btn bgcolor-add-btn px-3">
                    DISEÑO NUEVO
                </a>
            </div>
            <!-- LIST OF DESIGNS -->
            <div class="designs-list">
                {{-- MENSAJES DE ALERTA DEL RESPONSE AL ELIMINAR UN DISEÑO --}}
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

                <!-- ROW -->
                <div class="row">
                    @if (isset($designs))
                        @if (count($designs)>0)
                            {{-- SI SE TIENE AL MENOS UN DISEÑO CREADO, SE MUESTRA EN PANTALLA LA TARJETA --}} 
                            @foreach ($designs as $design)
                                <!-- COLUMN -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <!-- CARD DESIGN -->
                                    <div class="card-design mb-4 p-2">
                                        <a href="{{url('/design/'.$design->id.'/edit')}}" class="text-white">
                                            <img src="{{asset('images/diseño-preview.png')}}" class="mb-3" alt="">
                                            <div class="d-flex flex-column">
                                                <h1 class="mb-2">
                                                    {{$design->title}}
                                                </h1>
                                                <h2 class="d-flex align-items-center mb-3">
                                                    Editado: <span class="ms-1">{{$design->updated_at}}</span>
                                                </h2>
                                                
                                            </div>
                                        </a>
                                        <div class="d-flex justify-content-center mb-2">
                                            <form id="formDestroy" action="{{route('design.delete', $design->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="text" name="id" value="{{$design->id}}" hidden>
                                            </form>
                                            <button type="button" onclick="destroy({{$design->id}})"  class="main-btn remove-btn px-3">
                                                ELIMINAR
                                            </button>
                                        </div>
                                    </div><!-- end card design -->  
                                </div><!-- end col -->
                            @endforeach
                        @else
                            {{-- ESTE MENSAJE ES EN CASO DE NO TENER NINGÚN DISEÑO CREADO --}} 
                            <div class="col-md-12">
                                <h3 class="designs-none d-flex justify-content-center align-items-center">
                                    Actualmente no hay diseños disponibles para mostrar.
                                </h3>
                            </div>
                        @endif 
                    @endif

                </div><!-- end row -->

            </div><!-- end list of designs -->
        </div><!-- end user designs -->
        @if (isset($designs))
        {{ $designs }} {{-- YA TRAE LOS DISEÑOS FILTRADOS POR ID  --}}
        @endif

    </div><!-- end main content -->
    
    @include('layouts.footer')

    @include('layouts.scripts')

    <script>
        function destroy(id){
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Confirme esta acción para eliminar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0ab39c',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, ¡Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("formDestroy").submit();
                }
            })
        }
    </script>
</body>
</html>