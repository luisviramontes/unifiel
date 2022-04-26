<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UNIFIEL</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="welcome_i/assets/img/3.png" rel="icon">
    <link href="welcome_i/assets/img/3.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    {!!Html::style('assets/vendor/bootstrap/css/bootstrap.min.css')!!}
    {!!Html::style('assets/vendor/bootstrap-icons/bootstrap-icons.css')!!}
    {!!Html::style('assets/vendor/boxicons/css/boxicons.min.cs')!!}
    {!!Html::style('assets/vendor/quill/quill.snow.css')!!}
    {!!Html::style('assets/vendor/quill/quill.bubble.css')!!}
    {!!Html::style('assets/vendor/remixicon/remixicon.css')!!}
    {!!Html::style('assets/vendor/simple-datatables/style.css')!!}


    <!-- Template Main CSS File -->
    {!!Html::style('assets/css/style.css')!!}

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="authentication-bg">
    {!! Form::open(['route' => 'auth/register', 'class' => 'form']) !!}
    <div class="container">
        @if (Session::has('errors'))
        <div class="alert alert-warning  alert-dismissible fade show mt-4 bt-4" role="alert">
            <ul>
                <strong>Oops! Something went wrong : </strong>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
        @endif
    </div>
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">UNIFIEL</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Registrate para comenzar a firmar
                                        </h5>
                                        <p class="text-center small">Ingresa tus datos personales para crear tu cuenta
                                        </p>
                                    </div>


                                    <form action="/auth/register" id="formulario" name="formulario"
                                        class="row g-3 needs-validation">
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Tu nombre</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Ingresa tu nombre" id="name" required>
                                            <div class="invalid-feedback">Por favor,ingresa tu nombre!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Apellido paterno</label>
                                            <input type="text" name="apellido_p" class="form-control"
                                                placeholder="Ingresa tu apellido paterno" id="apellido_p" required>
                                            <div class="invalid-feedback">Por favor,ingresa tu apellido paterno!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_m"
                                                placeholder="Ingresa tu apellido materno" class="form-control"
                                                id="apellido_m">
                                            <div class="invalid-feedback">Por favor,ingresa tu apellido materno!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" placeholder="Ingresa tu email"
                                                class="form-control" id="email" required>
                                            <div class="invalid-feedback">Por favor ingresa tu email!</div>
                                        </div>



                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Contraseña</label>
                                            <input type="password" name="password" placeholder="Ingresa tu contraseña"
                                                class="form-control" id="password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Repetir contraseña</label>
                                            <input type="password" onKeyUp="valida_contra();"
                                                name="password_confirmation" placeholder="Repite tu contraseña"
                                                class="form-control" id="password_confirmation" required>
                                            <div class="text-danger" id='error_pass' name="error_pass"></div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">Yo acepto los
                                                    <a href="#">terminos y condiciones</a></label>
                                                <div class="invalid-feedback">Al registrarme.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" id="submit3" type="submit">Crear
                                                cuenta</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Ya tienes una cuenta? <a
                                                    href="pages-login.html">Inicia sesión</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                    Designed by <a href="">ISC LUIS ALFONSO VIRAMONTES RODRIGUEZ</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
<script>
function valida_contra() {
    aux1 = document.getElementById('password').value;
    aux2 = document.getElementById('password_confirmation').value;
    if (aux1 != aux2) {
        document.getElementById("error_pass").innerHTML = "Las contraseñas no coinciden.";
        document.getElementById("error_pass").value = "1";
        document.getElementById('submit3').disabled = true;
    } else {
        document.getElementById("error_pass").innerHTML = "";
        document.getElementById("error_pass").value = "0";
        document.getElementById('submit3').disabled = false;
    }
}
</script>