<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Landing page - P5 Designer</title>
</head>
<body>
    @include('layouts.navbar')

    <!-- MAIN CONTENT -->
    <div class="main-content landing-page">

        <!-- MAIN BANNER -->
        <div class="main-banner d-flex justify-content-center align-items-center p-5">
            <div class="container d-flex flex-column justify-content-center align-items-center w-100 h-100">
                <h1 class="mb-5">
                    ¡Una simple idea puede cambiar al mundo!
                </h1>
                <h2 class="mb-5">
                    Inicia tu prueba gratuita, sin cobros adicionales.
                </h2>
                <h3 class="mb-5">
                    Comienza ahora a crear tus propios diseños en nuestra plataforma online y únete a la familia P5 Designer. 
                </h3>
                <a href="{{ route('signup') }}" class="main-btn px-3 mb-4">
                    INICIA TU PRUEBA
                </a>
            </div>
        </div><!-- end main banner -->

        <!-- PACKAGE PRICES -->
        <div id="precios" class="package-prices bgcolor-gray">
            <div class="container p-5">
                <h1 class="page-subtitle pb-2 mb-5">
                    Precio de paquetes
                </h1>
                <!-- ROW -->
                <div class="row justify-content-center">
                    <!-- COLUMN -->
                    <div class="col-lg-4 col-md-8 px-md-4 mb-5">
                        <!-- CARD PACKAGE PRICE #1 -->
                        <div class="card-price h-100">
                            <div class="card-details">
                                <span class="card-top-color"></span>
                                <div class="card-subtitles px-4 py-3">
                                    <h3 class="mb-3">Inicial</h3>
                                    <h2 class="mb-3">Gratuita</h2>
                                    <h3>Permanente</h3>
                                </div>
                                <div class="card-benefit-info px-4">
                                    <ul class="list-unstyled text-start">
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>5 archivos colaborativos
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Archivos personales ilimitados
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Plantillas, widgets y plugins
                                        </li>
                                        <li class="d-flex align-items-center mb-0">
                                            <i class="fas fa-check fs-16 pe-3"></i>Aplicación móvil
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-select-package px-4 pb-4 mt-2">
                                <button class="main-btn bgcolor-white px-4">
                                    ELEGIR INICIAL
                                </button>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-8 px-md-4 mb-5">
                        <!-- CARD PACKAGE PRICE #2 -->
                        <div class="card-price h-100">
                            <div class="card-details">
                                <span class="card-top-color bgcolor-green"></span>
                                <div class="card-subtitles px-4 py-3">
                                    <h3 class="mb-3">Profesional</h3>
                                    <h2 class="mb-3">$299.00 MXN</h2>
                                    <h3>Pago anual o $349.00 MXN de forma mensual</h3>
                                </div>
                                <div class="card-benefit-info px-4">
                                    <ul class="list-unstyled text-start">
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>45 archivos colaborativos
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Archivos personales ilimitados
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Plantillas, widgets y plugins
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Historial de cambios
                                        </li>
                                        <li class="d-flex align-items-center mb-0">
                                            <i class="fas fa-check fs-16 pe-3"></i>Aplicación móvil
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-select-package px-4 pb-4 mt-2">
                                <button class="main-btn main-btn-txtwhite bgcolor-green px-4 py-2">
                                    ELEGIR PROFESIONAL
                                </button>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-8 px-md-4 mb-5">
                        <!-- CARD PACKAGE PRICE #3 -->
                        <div class="card-price h-100">
                            <div class="card-details">
                                <span class="card-top-color bgcolor-purple"></span>
                                <div class="card-subtitles px-4 py-3">
                                    <h3 class="mb-3">Empresarial</h3>
                                    <h2 class="mb-3">$4,599.00 MXN</h2>
                                    <h3>Pago anual, sin alternativa mensual</h3>
                                </div>
                                <div class="card-benefit-info px-4">
                                    <ul class="list-unstyled text-start">
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Archivos colaborativos ilimitados
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Archivos personales ilimitados
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Plantillas, widgets y plugins
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Historial de cambios
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check fs-16 pe-3"></i>Soporte técnico preferencial
                                        </li>
                                        <li class="d-flex align-items-center mb-0">
                                            <i class="fas fa-check fs-16 pe-3"></i>Aplicación móvil
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-select-package px-4 pb-4 mt-2">
                                <button class="main-btn main-btn-txtwhite bgcolor-purple px-4">
                                    ELEGIR EMPRESARIAL
                                </button>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end package prices -->

        <!-- TESTIMONIALS -->
        <div id="testimonios" class="testimonials bgcolor-primary">
            <div class="container p-5">
                <h1 class="page-subtitle text-white pb-2 mb-5">
                    TESTIMONIOS
                </h1>
                <!-- ROW -->
                <div class="row justify-content-center">
                    <!-- COLUMN -->
                    <div class="col-xl-4 col-lg-5 col-md-8 px-md-4 d-flex align-items-center mb-5">
                        <!-- CARD TESTIMONIAL #1 -->
                        <div class="card-testimonial px-4 py-3">
                            <i class="fa-solid fa-quote-right mb-3"></i> 
                            <p class="text-justify mb-3">
                                Como principiante en diseño, encontré este sitio web de diseño muy útil y fácil de usar. Lo recomiendo ampliamente para todo tipo de proyectos.
                            </p>
                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                                <h2 class="text-start mb-2 mb-sm-0">Valeria Meza</h2>
                                <h3 class="text-end mb-0">Diseñadora</h3>
                            </div>
                        </div>
                    </div><!-- end column -->
                    <!-- COLUMN -->
                    <div class="col-xl-4 col-lg-5 col-md-8 px-md-4 d-flex align-items-center mb-5">
                        <!-- CARD TESTIMONIAL #2 -->
                        <div class="card-testimonial px-4 py-3">
                            <i class="fa-solid fa-quote-right mb-3"></i> 
                            <p class="text-justify mb-3">
                                Soy programador freelance, utilizo este sitio web de diseño a diario. Es una herramienta versátil que me permite trabajar en una amplia variedad de proyectos desde sitios web hasta aplicaciones móviles.
                            </p>
                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                                <h2 class="text-start mb-2 mb-sm-0">Paúl Flores</h2>
                                <h3 class="text-end mb-0">Programador</h3>
                            </div>
                        </div>
                    </div><!-- end column -->
                    <!-- COLUMN -->
                    <div class="col-xl-4 col-lg-5 col-md-8 px-md-4 d-flex align-items-center mb-5">
                        <!-- CARD TESTIMONIAL #3 -->
                        <div class="card-testimonial px-4 py-3">
                            <i class="fa-solid fa-quote-right mb-3"></i> 
                            <p class="text-justify mb-3">
                                Es una excelente alternativa a Figma y Adobe XD. Ofrece todas las características que necesito para crear diseños impresionantes, y me encanta su interfaz sencilla e intuitiva.
                            </p>
                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                                <h2 class="text-start mb-2 mb-sm-0">Pablo Cota</h2>
                                <h3 class="text-end mb-0">Diseñador UI/UX</h3>
                            </div>
                        </div>
                    </div><!-- end column -->
                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end testimonials -->

        <!-- BLOG -->
        <div id="blog" class="blog bgcolor-gray">
            <div class="container p-5">
                <h1 class="page-subtitle mb-3">
                    BLOG
                </h1>
                <h2 class="text-center mb-5">
                    ENTRADAS MÁS RECIENTES
                </h2>
                <!-- ROW -->
                <div class="row">
                    <!-- COLUMN -->
                    <div class="col-md-6 d-flex justify-content-center pe-sm-0 pe-md-4 pe-lg-0 mb-5">
                        <!-- BLOG ENTRIES #1 -->
                        <div class="blog-entries">
                            <img src="{{asset('images/blog-post1.jpg')}}" class="mb-3" alt="Blog Post #1">
                            <h3 class="mb-3">
                                Mayo 10, 2023 <span>en Fotografía</span>
                            </h3>
                            <h2 class="text-justify mb-3">
                                Importancia del prototipado de aplicaciones móviles
                            </h2>
                            <p class="text-justify mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis sem urna. Duis odio quam, posuere a finibus non, ultricies a eros...
                            </p>
                            <a href="" class="d-flex justify-content-end w-100">
                                Ver más
                            </a>
                        </div><!-- end blog entries -->
                    </div><!-- end column -->
                    <!-- COLUMN -->
                    <div class="col-md-6 d-flex justify-content-center ps-sm-0 ps-md-4 ps-lg-0 mb-5">
                        <!-- BLOG ENTRIES #2 -->
                        <div class="blog-entries">
                            <img src="{{asset('images/blog-post2.jpg')}}" class="mb-3" alt="Blog Post #2">
                            <h3 class="mb-3">
                                Mayo 08, 2023 <span>en Gráficos</span>
                            </h3>
                            <h2 class="text-justify mb-3">
                                Diseño atractivo de iconos y emotes
                            </h2>
                            <p class="text-justify mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis sem urna. Duis odio quam, posuere a finibus non, ultricies a eros...
                            </p>
                            <a href="" class="d-flex justify-content-end w-100">
                                Ver más
                            </a>
                        </div><!-- end blog entries -->
                    </div><!-- end column -->
                </div><!-- end row -->
            </div>
        </div>

    </div><!-- end main content -->
    
    @include('layouts.footer')

    @include('layouts.scripts')
</body>
</html>