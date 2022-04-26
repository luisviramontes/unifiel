<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UNIFIEL FIRMA ELECTRÓNICA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="welcome_i/assets/img/favicon.png" rel="icon">
    <link href="welcome_i/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    {!!Html::style('welcome_i/assets/vendor/aos/aos.css')!!}
    {!!Html::style('welcome_i/assets/vendor/bootstrap/css/bootstrap.min.css')!!}
    {!!Html::style('welcome_i/assets/vendor/bootstrap-icons/bootstrap-icons.css')!!}
    {!!Html::style('welcome_i/assets/vendor/boxicons/css/boxicons.min.css')!!}
    {!!Html::style('welcome_i/assets/vendor/glightbox/css/glightbox.min.css')!!}
    {!!Html::style('welcome_i/assets/vendor/remixicon/remixicon.css')!!}
    {!!Html::style('welcome_i/assets/vendor/swiper/swiper-bundle.min.css')!!}
    <!-- Template Main CSS File -->
    {!!Html::style('welcome_i/assets/css/style.css')!!}

    <!-- =======================================================
  * Template Name: Bootslander - v4.7.2
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.html"><span>UNIFIEL</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="welcome_i/assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="#about">Acerca de</a></li>
                    <li><a class="nav-link scrollto" href="#feature">Servicios</a></li>
                                  
                   
                    @if (Auth::guest())
                    <li class="dropdown"><a href="#"><span>Iniciar Sesión</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/auth/login">Iniciar Sesión</a></li>
                            <li><a href="/auth/register">Registrarse</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/auth/login">Iniciar Sesión</a></li>
                            <li><a href="/auth/register">Registrarse</a></li>
                        </ul>
                        <ul>
                            <li><a href="/welcome">Ingresar</a></li>
                            <li><a href="/auth/logout">Cerrar sesión</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1><span>UNIFIEL</span></h1>
                        <h2>Tu Firma Electrónica en un soló sitio</h2>
                        <div class="text-center text-lg-start">
                            <a href="#about" class="btn-get-started scrollto">Comienza a firmar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="welcome_i/assets/img/3.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                        data-aos="fade-right">
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4"
                            data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                        data-aos="fade-left">
                        <h3>Objetivos Específicos de UNIFIEL</h3>
                        <p>El desarrollo de nuevas tecnologías de información, telecomunicación y transmisión de datos
                            por vía electrónica ha permitido el intercambio de información, la automatización de
                            procesos y la gestión de los documentos que se derivan de ellos. Es por ello, que se hace
                            necesario disponer de un entorno seguro en relación con la autenticación electrónica.</p>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-fingerprint"></i></div>
                            <h4 class="title"><a href="">Autenticidad</a></h4>
                            <p class="description">Asegurar la autenticidad de las personas.</p>
                            <p class="description">Permitir realizar trámites o acceder a servicios que impliquen una
                                certificación de identidad del solicitante.</p>
                        </div>



                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Seguridad</a></h4>
                            <p class="description">Asegurar que la transmisión de datos no sea alterada en ruta o en
                                almacenaje, dado que la comprobación de identidad se realizara a través de la firma
                                electrónica, los documentos firmados electrónicamente tendrán sustento y validez
                                jurídicamente únicamente cuando se verifiquen a través del mismo sistema</p>
                            <p class="description">Garantizar que el emisor de un mensaje o firma de un documento no
                                pueda negar que lo envió o lo firmo.</p>
                            <p class="description">Confirmar la confidencialidad de datos, es decir que nadie más va a
                                ver los intercambios de información que se lleven a cabo dentro del sistema.</p>
                        </div>



                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Costos operativos</a></h4>
                            <p class="description">Reducir costos operativos a través del uso de la firma electrónica
                                para agilizar los procesos, reducción de tiempos de traslados, y evitar el uso de papel.
                            </p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Reusabilidad</a></h4>
                            <p class="description">Podras utlizar cualquer firma electrónica certificada(SAT, FUNCIOÓN
                                PUBLICA, GOBIERNO, etc.. ).</p>
                        </div>


                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Features</h2>
                    <p>Consulta todos los servicios</p>
                </div>

                <div class="row" data-aos="fade-left">
                    <div class="col-lg-3 col-md-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            <i class="ri-store-line" style="color: #ffbb2c;"></i>
                            <h3><a href="">Llave privada/pública</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                            <h3><a href="">Firmas Digitales</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                            <h3><a href="">Cerificados de Seguridad</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                            <h3><a href="">Firma electrónica</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
                            <i class="ri-database-2-line" style="color: #47aeff;"></i>
                            <h3><a href="">Firma Electrónica Avanzada</a></h3>
                        </div>
                    </div>
                    
                   
                </div>

            </div>
        </section><!-- End Features Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>UNIFIEL</h3>
                            <p class="pb-3"><em>LUIS ALFONSO VIRAMONTES RODRIGUEZ</em></p>
                            <p>
                               Zacatecas, México <br>
                                <strong>Télefono:</strong> +524921377768<br>
                                <strong>Email:</strong> luis_alfonso133@hotmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Enlaces</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Acerca de</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Servicios</a></li>
                           
                        </ul>
                    </div>

                   

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>UNIFIEL</span></strong>.Todos los derechos reservados
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
                Designed by <a href="">ISC LUIS ALFONSO VIRAMONTES RODRIGUEZ</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    {!!Html::script('welcome_i/assets/vendor/purecounter/purecounter_vanilla.js')!!}
    {!!Html::script('welcome_i/assets/vendor/aos/aos.js')!!}
    {!!Html::script('welcome_i/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')!!}
    {!!Html::script('welcome_i/assets/vendor/glightbox/js/glightbox.min.js')!!}
    {!!Html::script('welcome_i/assets/vendor/swiper/swiper-bundle.min.js')!!}
    {!!Html::script('welcome_i/assets/vendor/php-email-form/validate.js')!!}

    {!!Html::script('welcome_i/assets/js/main.js')!!}


    <!-- Template Main JS File -->
    {!!Html::script('welcome_i/assets/js/main.js')!!}


</body>

</html>