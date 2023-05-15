<!-- FOOTER -->
<footer class="text-center text-lg-start text-white bgcolor-primary">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!--Grid row-->
        <div class="row my-4">

            <!-- COLUMNA #1 (Logo y Acerca de nosotros) -->
            <div class="col-md-4 col-sm-12 mb-4 mb-md-0">
                <!-- LOGO -->
                <a href="{{ route('welcome') }}" class="footer-logo d-flex align-items-center justify-content-center mb-4 mx-auto" >
                    <img src="{{asset('images/logo-blanco.png')}}" height="90" alt="" loading="lazy" />
                    <div class="d-flex flex-column ms-3">
                        <h1 class="logo-title mb-2">P5 Designer</h1>
                        <h2 class="logo-subtitle mb-0">Software de diseño</h2>
                    </div>
                </a>
                <!-- BREVE DESCRIPCIÓN -->
                <p class="text-justify">Somos una plataforma especializada en software de creación de diseños para la maquetación, enfocados principalmente en diseñadores y programadores, pero con herramientas fáciles de utilizar por cualquier personas sin importar el tipo de proyecto.</p>
            </div>

            <!-- COLUMNA #2 (Temas de interes) -->
            <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
                <h5 class="text-uppercase text-center fw-bolder mb-4">Información</h5>
                <div class="footerInformacion">
                    <ul class="list-unstyled text-start">
                        <li class="mb-2">
                            <a href="{{ route('welcome') }}#testimonios" class="text-white"><i class="fas fa-circle fs-10 pe-3"></i>Testimonios</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('welcome') }}#blog" class="text-white"><i class="fas fa-circle fs-10 pe-3"></i>Blog</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('welcome') }}#precios" class="text-white"><i class="fas fa-circle fs-10 pe-3"></i>Precios</a>
                        </li>
                        @if (!Auth::user())
                            <li class="mb-2">
                                <a href="{{ route('login') }}" class="text-white"><i class="fas fa-circle fs-10 pe-3"></i>Iniciar sesión</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('signup') }}" class="text-white"><i class="fas fa-circle fs-10 pe-3"></i>Registrarse</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- COLUMNA #3 (Contactanos) -->
            <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
                <h5 class="text-uppercase text-center fw-bolder mb-4">Contáctanos</h5>
                <!-- CONTACTANOS -->
                <div class="footerContactanos">
                    <ul class="list-unstyled text-start">
                        <li>
                            <p><i class="fas fa-map-marker-alt pe-2"></i>Baja California Sur, México</p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone pe-2"></i>612 000 0000</p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope pe-2 mb-0"></i>contacto@p5_designer.mx</p>
                        </li>
                        <li>
                            <p><i class="fas fa-clock pe-2 mb-0"></i>Lunes a Sábados: 8:00am - 9:30pm</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 bgcolor-secondary">
        <a class="text-white" href="">2023 © P5 Designer | Todos los derechos reservados</a>
    </div>
    <!-- Copyright -->
</footer>