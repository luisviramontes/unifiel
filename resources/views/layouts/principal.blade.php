<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UNIFIEL FIRMA ELECTRÓNICA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {!!Html::style('welcome_i/assets/img/3.png')!!}
    {!!Html::style('awelcome_i/assets/img/3.png')!!}


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    {!!Html::script('assets/js/script.js')!!}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {!!Html::style('assets/vendor/bootstrap/css/bootstrap.min.css')!!}
    {!!Html::style('assets/vendor/bootstrap-icons/bootstrap-icons.css')!!}
    {!!Html::style('assets/vendor/boxicons/css/boxicons.min.css')!!}

    {!!Html::style('assets/vendor/quill/quill.snow.css')!!}
    {!!Html::style('assets/vendor/quill/quill.bubble.css')!!}
    {!!Html::style('assets/vendor/remixicon/remixicon.css')!!}
    <!-- Template Main CSS File -->
    {!!Html::style('assets/css/style.css')!!}
    {!!Html::style('assets/css/icons.min.css')!!}
    {!!Html::style('assets/css/app.min.css')!!}
    <!-- ARCHIVOS -->
    {!!Html::style('assets/libs/dropify/dropify.min.css')!!}
    <!-- datatables -->
    {!!Html::style('assets/libs/datatables/dataTables.bootstrap4.min.css')!!}
    {!!Html::style('assets/libs/datatables/buttons.bootstrap4.min.css')!!}
    {!!Html::style('assets/libs/datatables/responsive.bootstrap4.min.css')!!}
    {!!Html::style('assets/libs/datatables/select.bootstrap4.min.css')!!}



    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/welcome" class="logo d-flex align-items-center">
                <img src="{{asset('assets/img/logo.png')}}" alt="">
                <span class="d-none d-lg-block">UNIFIEL</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Buscar" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/messages-2.jpg')}}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/messages-3.jpg')}}" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">
                    @if (Auth::guest())
                    @else
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }} {{ Auth::user()->apellido_p }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->funcion }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/auth/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Cerrar sesión</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                    @endif
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="welcome">
                    <i class="bi bi-grid"></i>
                    <span>Inicio</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>LLave privada/pública</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="priv_pub">
                            <i class="bi bi-circle"></i><span>Generar llaves</span>
                        </a>
                    </li>
                    <li>
                        <a href="encriptar_msj">
                            <i class="bi bi-circle"></i><span>Encriptar mensajes</span>
                        </a>
                    </li>
                    <li>
                        <a href="decifrar_msj">
                            <i class="bi bi-circle"></i><span>Decifrar mensajes</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Firma digital</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="firma_digital">
                            <i class="bi bi-circle"></i><span>Generar firma</span>
                        </a>
                    </li>
                    <li>
                        <a href="verifica_firma">
                            <i class="bi bi-circle"></i><span>Verificar firma</span>
                        </a>
                    </li>


                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Emitir certificados</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="autofirmado">
                            <i class="bi bi-circle"></i><span>Autofirmado</span>
                        </a>
                    </li>
                    <li>
                        <a href="emitido_aut">
                            <i class="bi bi-circle"></i><span>Emitido por autoridad</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->





            <li class="nav-heading">Otros</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="welcome">
                    <i class="bi bi-person"></i>
                    <span>Mi perfil</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">



        <div class="content">
        @if(Session::has('errors'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong><?php print_r($errors) ?>.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
            @yield('contenido')
        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>ISC Luis Alfonso Viramontes</span></strong>. Todos los derechos reservados
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https:www.tecnored.com.mx">ISC Luis Alfonso Viramontes</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    {!!Html::script('assets/vendor/apexcharts/apexcharts.min.js')!!}
    {!!Html::script('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')!!}
    {!!Html::script('assets/vendor/chart.js/chart.min.js')!!}
    {!!Html::script('assets/vendor/echarts/echarts.min.js')!!}
    {!!Html::script('assets/vendor/quill/quill.min.js')!!}
    {!!Html::script('assets/vendor/tinymce/tinymce.min.js')!!}
    {!!Html::script('assets/vendor/php-email-form/validate.js')!!}

    <!-- Template Main JS File -->
    {!!Html::script('assets/js/main.js')!!}
    <!--Form Wizard-->
    {!!Html::script('assets/libs/jquery-steps/jquery.steps.min.js')!!}
    {!!Html::script('assets/libs/jquery-validation/jquery.validate.min.js')!!}
    {!!Html::script('assets/js/pages/form-wizard.init.js')!!}
    <!-- MDB -->
    {!!Html::script('assets/libs/dropify/dropify.min.js')!!}
    <!-- datatables -->
    {!!Html::script('assets/libs/datatables/jquery.dataTables.min.js')!!}
    {!!Html::script('assets/libs/datatables/dataTables.bootstrap4.min.js')!!}
    {!!Html::script('assets/libs/datatables/dataTables.responsive.min.js')!!}
    {!!Html::script('assets/libs/datatables/responsive.bootstrap4.min.js')!!}
    {!!Html::script('assets/libs/datatables/dataTables.buttons.min.js')!!}
    {!!Html::script('assets/libs/datatables/buttons.bootstrap4.min.js')!!}
    {!!Html::script('assets/libs/datatables/buttons.html5.min.js')!!}
    {!!Html::script('assets/libs/datatables/buttons.print.min.js')!!}
    {!!Html::script('assets/libs/datatables/dataTables.keyTable.min.js')!!}
    {!!Html::script('assets/libs/datatables/dataTables.select.min.js')!!}
    {!!Html::script('assets/js/pages/datatables.init.js')!!}





    @yield('javascript')


</body>

</html>