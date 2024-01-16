<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title> Contraloria Social| Honestidad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="imagenes/favicon48.ico">

    <!-- Theme Config Js -->
    <script src="{{ asset('js/hyper-config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
        <div class="container">

            <!-- logo -->
            <a href="index.html" class="navbar-brand me-lg-1">
                <img src="imagenes/logo_social.png" alt="logo" class="logo-dark" height="150" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- menus -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <!-- left menu -->
                <ul class="navbar-nav me-auto align-items-center">
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link active" href="">Contraloria Social</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Requisitos</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Capacitaciones</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Formatos</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Marco Legal</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Resultados 2023</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Presupuesto Ciudadano</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Buzones</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Buzones</a>
                    </li>
                </ul>

                <!-- right menu -->
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-0">
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            target="_blank" class="nav-link d-lg-none">Iniciar Sesion</a>
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            target="_blank" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                            <i class="ri-key-fill"></i> Iniciar </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- START HERO -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-5 offset-md-2">
                    <div class="text-md-end mt-3 mt-md-0">
                        <img src="assets/images/svg/startup.svg" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->
    <div class="container">
        <p></p>
    </div>
    @yield('content')


    <footer class="bg-dark py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="imagenes/escudooax.png" alt="logo" class="logo-dark" height="40" />
                    <p class="text-muted mt-4">Direccion de Contraloria Social</p>

                    <ul class="social-list list-inline mt-3">
                        <li class="list-inline-item text-center">
                            <a href="https://www.facebook.com/HonestidadGobOax"
                                class="social-list-item border-primary text-primary"><i
                                    class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item text-center">
                            <a href="https://twitter.com/HonestidadOax"
                                class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-1">
                            <h4>
                                <p class = "text-muted mt-4 text-center mb-0">
                                    <br> Ciudad Administrativa (Edificio 2 “Rufino Tamayo”, Planta Baja)
                                    <br> Carretera Internacional Oaxaca-Istmo, km. 11.5
                                    <br> Tlalixtac de Cabrera, Oaxaca C.P. 68270
                                </p>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!-- END FOOTER -->
    <!-- Vendor js -->
    <script src="{{ asset('js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.min.js') }}"></script>
</body>
</html>
