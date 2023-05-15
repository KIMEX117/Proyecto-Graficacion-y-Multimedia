<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Proyecto - P5 Designer</title>
</head>
<body class="user-project">
    <form action="" method="" class="d-flex flex-column h-100">
        <!-- TOOLBAR -->
        <div class="header-toolbar ps-2">
            <!-- FIGURES BAR -->
            <div class="figures-bar d-flex align-items-center">
                <a href="{{ route('home') }}">
                    <img src="{{asset('images/logo-blanco.png')}}" alt="">
                </a>
                <div class="d-flex">
                    <button type="button" class="mx-1">
                        <img src="{{asset('images/icono-cursor.png')}}" alt="">
                    </button>
                    <button type="button" class="mx-1">
                        <img src="{{asset('images/icono-cuadrado.png')}}" alt="">
                    </button>
                    <button type="button" class="mx-1">
                        <img src="{{asset('images/icono-linea-diagonal.png')}}" alt="">
                    </button>
                    <button type="button" class="mx-1">
                        <img src="{{asset('images/icono-circulo.png')}}" alt="">
                    </button>
                    <button type="button" class="mx-1">
                        <img src="{{asset('images/icono-triangulo.png')}}" alt="">
                    </button>
                    <button type="button" class="mx-1">
                        <img src="{{asset('images/icono-texto.png')}}" alt="">
                    </button>
                </div>
            </div>
            <!-- PROJECT TITLE -->
            <div class="project-title d-flex justify-content-center align-items-center">
                <input type="text" name="title" id="" value="Lorem ipsum" required>
            </div>
            <!-- PROJECT SAVE -->
            <div class="project-save d-flex justify-content-center align-items-center">
                <button class="main-btn save-btn px-3">
                    GUARDAR CAMBIOS
                </button>
            </div>
        </div><!-- end toolbar -->

        <!-- PROJECT -->
        <div class="d-flex h-100">
            <!-- SIDEBAR ELEMENTS -->
            <div class="sidebar-elements bgcolor-tertiary  px-2">
                <h2 class="text-center p-3">
                    Elementos
                </h2>
                <!-- ROW -->
                <div class="row">
                    <!-- COLUMN -->
                    <div class="col-12">
                        <!-- FIGURE INFO #1 -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('images/icono-circulo.png')}}" class="icon-figure" alt="">
                                <h3 class="name-figure ms-2 mb-0">
                                    Rectángulo 22
                                </h3>
                            </div>
                            <div class="btns-figure d-flex align-items-center">
                                <button type="button">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-arrow-up"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div><!-- end figure info -->
                    </div><!-- end column -->
                    <!-- COLUMN -->
                    <div class="col-12">
                        <!-- FIGURE INFO #2 -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('images/icono-circulo.png')}}" class="icon-figure" alt="">
                                <h3 class="name-figure ms-2 mb-0">
                                    Rectángulo 22
                                </h3>
                            </div>
                            <div class="btns-figure d-flex align-items-center">
                                <button type="button">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-arrow-up"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div><!-- end figure info -->
                    </div><!-- end column -->
                    <!-- COLUMN -->
                    <div class="col-12">
                        <!-- FIGURE INFO #3 -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('images/icono-circulo.png')}}" class="icon-figure" alt="">
                                <h3 class="name-figure ms-2 mb-0">
                                    Rectángulo 22
                                </h3>
                            </div>
                            <div class="btns-figure d-flex align-items-center">
                                <button type="button">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-arrow-up"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div><!-- end figure info -->
                    </div><!-- end column -->
                </div><!-- end row -->
            </div>

            <!-- AREA CANVAS -->
            <div class="area-canvas">

            </div>

            <!-- SIDEBAR OPTIONS -->
            <div class="sidebar-options bgcolor-tertiary">
                
                <!-- MEASURES -->
                <div class="measures px-2 mb-4">
                    <!-- TITLE -->
                    <h2 class="text-center px-2 my-3">
                        Medidas
                    </h2>
                    <!-- INPUTS -->
                    <div class="row justify-content-center px-2 m-0">
                        <!-- INPUT "X" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">X:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "Y" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">Y:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "W" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">W:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "H" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">H:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "ROUNDED CORNER" -->
                        <div class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">
                                    <img src="{{asset('images/icono-curva.png')}}" class="me-1" alt="">:
                                </label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                    </div><!-- end row -->
                </div><!-- end measures -->

                <!-- FILLED -->
                <div class="filled px-2 mb-4">
                    <!-- TITLE -->
                    <div class="d-flex flex-column text-center mb-3">
                        <h2 class="px-2 mb-0">
                            Relleno
                        </h2>
                    </div>
                    <!-- BUTTONS COLORS -->
                    <div class="d-flex justify-content-between px-3 mb-3">
                        <button type="button" class="btn-color btn-color-black"></button>
                        <button type="button" class="btn-color btn-color-white"></button>
                        <button type="button" class="btn-color btn-color-yellow"></button>
                        <button type="button" class="btn-color btn-color-red"></button>
                        <button type="button" class="btn-color btn-color-green"></button>
                        <button type="button" class="btn-color btn-color-blue"></button>
                    </div>
                    <!-- INPUTS -->
                    <div class="row justify-content-center px-2 m-0">
                        <!-- INPUT "R" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">R:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "G" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">G:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "B" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">B:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "OPACITY" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="" class="d-flex align-items-center">
                                    <img src="{{asset('images/icono-opacidad.png')}}" alt="">:
                                </label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                    </div><!-- end row -->
                </div><!-- end filled -->

                <!-- BORDED -->
                <div class="filled px-2 mb-4">
                    <!-- TITLE -->
                    <div class="d-flex flex-column text-center mb-3">
                        <h2 class="px-2 mb-0">
                            Borde
                        </h2>
                    </div>
                    <!-- BUTTONS COLORS -->
                    <div class="d-flex justify-content-between px-3 mb-3">
                        <button type="button" class="btn-color btn-color-black"></button>
                        <button type="button" class="btn-color btn-color-white"></button>
                        <button type="button" class="btn-color btn-color-yellow"></button>
                        <button type="button" class="btn-color btn-color-red"></button>
                        <button type="button" class="btn-color btn-color-green"></button>
                        <button type="button" class="btn-color btn-color-blue"></button>
                    </div>
                    <!-- INPUTS -->
                    <div class="row justify-content-center px-2 m-0">
                        <!-- INPUT "R" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">R:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "G" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">G:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "B" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">B:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "OPACITY" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="" class="d-flex align-items-center">
                                    <img src="{{asset('images/icono-opacidad.png')}}" alt="">:
                                </label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                        <!-- INPUT "THICKNESS" -->
                        <div class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">Grosor:</label>
                                <input type="text" name="" id="" class="ms-2" required>
                            </div>
                        </div>
                    </div><!-- end row -->
                </div><!-- end filled -->

            </div><!-- end sidebar options -->
        </div><!-- end project -->

    </form><!-- end form -->

    @include('layouts.scripts')
</body>
</html>