<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title> Contraloría Social| Honestidad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="imagenes/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{ asset('js/hyper-config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
    .font-head{
        color:  #0a0a0a
    }
    </style>

</head>

<body>

    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg py-lg-1 navbar-dark">
        <div class="container">

            <!-- logo -->
            <a href="index.html" class="navbar-brand me-lg-1">
                <img src="imagenes/ConSocial1.svg" alt="logo" class="logo-dark" height="80" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- menus -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <!-- left menu -->
                <ul class="navbar-nav me-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" purple role="button" aria-haspopup="true"
                            aria-expanded="false" href="{{ route('inicio') }}"><strong>Inicio</strong></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" role="button" aria-haspopup="true"
                            aria-expanded="false" href="{{ route('contraloriasocial') }}"><strong>Contraloria Social</strong></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>Requisitos</strong><div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboards">
                            <a target="_blank"
                                href="{{ asset('files/REQUISITOS PARA SER INTEGRANTE DEL COMITE DE CONTRALORIA SOCIAL.pdf') }}"
                                class="dropdown-item">Requisitos para ser Integrante del Comité de Contraloría
                                Social</a>
                            <a target="_blank"
                                href="{{ asset('files/REQUISITOS PARA ACREDITAR AL COMITE DE CONTRALORIA SOCIAL  ANTE LA SHTFP.pdf') }}"
                                class="dropdown-item">Requisitos para Acreditar al Comité de la Contraloría Social ante
                                la SHTFP</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>Capacitaciones</strong><div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboards">
                            <a target="_blank" href="{{ asset('files/PROMOCION DE CONTRALORIA SOCIAL.pdf') }}"
                                class="dropdown-item">Promoción de Contraloría Social</a>
                            <a target="_blank"
                                href="{{ asset('files/CAPACITACIONES A COMITES DE CONTRALORIA SOCIAL.pdf') }}"
                                class="dropdown-item">Capacitación a Comités de Contraloría Social</a>
                        </div>
                    </li>
                    <ul class="navbar-nav me-auto align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" role="button" aria-haspopup="true"
                                aria-expanded="false" href="{{ route('formatos') }}"><strong>Formatos</strong></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <strong>Marco Legal</strong><div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboards">
                                <a target="_blank" href="{{ asset('files/CONSTITUCION POLITICA DE LOS ESTADOS UNIDOS MEXICANOS.pdf')}}"
                                    class="dropdown-item">CONSTITUCIÓN POLITICA DE LOS ESTADOS UNIDOS MEXICANOS</a>
                                <a target="_blank" href="{{ asset('files/CONSTITUCION POLITICA DEL ESTADO LIBRE Y SOBERANO DE OAXACA.pdf') }}" class="dropdown-item">CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y
                                    SOBERANO
                                    DE OAXACA</a>
                                <a target="_blank" href="{{ asset('files/LEY ORGANICA MUNICIPAL DEL ESTADO DE OAXACA.pdf') }}" class="dropdown-item">LEY ORGANICA MUNICIPAL DEL
                                    ESTADO DE
                                    OAXACA</a>
                                <a target="_blank" href="{{ asset('files/LEY ORGANICA DEL PODER EJECUTIVO DEL ESTADO DE OAXACA.pdf') }}" class="dropdown-item">LEY ORGANICA DEL PODER EJECUTIVO
                                    DEL
                                    ESTADO DE OAXACA</a>
                                <a target="_blank" href="{{ asset('files/LEY DE TRANSPARENCIA, ACCESO A LA INFORMACION PUBLICA Y BUEN GOBIERNO DEL ESTADO DE OAXACA.pdf') }}" class="dropdown-item">LEY DE TRANSPARENCIA, ACCESO A
                                    LA
                                    INFORMACION PUBLICA <br> Y BUEN GOBIERNO DEL ESTADO DE OAXACA</a>
                                <a target="_blank" href="{{ asset('files/LINEAMIENTOS PARA LA INTEGRACION, FUNCIONAMIENTO Y PROMOCION DE LA CONTRALORIA SOCIAL EN EL ESTADO DE OAXACA.pdf') }}" class="dropdown-item">LINEAMIENTOS PARA LA
                                    INTEGRACIÓN,
                                    FUNCIONAMIENTO Y <br>PROMOCIÓN DE LA CONTRALORÍA SOCIAL EN EL ESTADO DE OAXACA</a>
                                <a target="_blank" href="{{ asset('files/REGLAMENTO INTERNO DE LA SECRETARIA DE HONESTIDAD, TRANSPARENCIA Y FUNCION PUBLICA.pdf') }}" class="dropdown-item">REGLAMENTO INTERNO DE LA
                                    SECRETARÍA
                                    DE HONESTIDAD, <br>TRANSPARENCIA Y FUNCIÓN PÚBLICA</a>
                                <a target="_blank" href="{{ asset('files/CONVENIO DE COLABORACION COPLADE-SCTG.pdf') }}" class="dropdown-item">CONVENIO DE COLABORACIÓN
                                    COPLADE-SCTG</a>
                                <a target="_blank" href="{{ asset('files/CIRCULAR PARA LA FORMALIZACION DE LA ACREDITACION.pdf') }}" class="dropdown-item">CIRCULAR PARA LA FORMALIZACIÓN
                                    DE LA
                                    ACREDITACIÓN Y <br>ENTREGA DE RESPORTES EN MATERIA DE CONTRALORÍA SOCIAL</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <strong>Buzones</strong><div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboards">
                                <a target="_blank" href="{{ asset('files/BUZONES DE ATENCION CIUDADANA.pdf') }}"
                                    class="dropdown-item">¿Qué es?</a>
                                <a target="_blank" href="{{ asset('files/RESULTADOS BUZONES DE ATENCION CIUDADANA.pdf') }}" class="dropdown-item">Resultados buzones de atención ciudadana
                                    2023</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" target="_blank" href="{{ asset('files/RESULTADOS EVALUAR PARA MEJORAR.pdf') }}" role="button"
                                 aria-haspopup="true" aria-expanded="false">
                                <strong>Resultados 2023</strong><div class="arrow-down"></div>
                            </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <strong>Presupuesto ciudadano</strong><div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboards">
                                <a target="_blank" href="{{ route('presupuesto2023') }}"class="dropdown-item">2023</a>
                                <a href="{{ route('presupuesto2022') }}" class="dropdown-item">2022</a>
                            </div>
                        </li>
                    </ul>

                    <!-- right menu -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item me-0">
                        <a type="button"  class="btn btn-info rounded-pill" href="{{ route('login') }}"><i class="ri-key-fill"></i> Iniciar sesion</a>
                        </li>
                    </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- START HERO -->
    <section class="hero-section">
        <div class="container">

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
            <div class="col-1"></div>
                <div class="col-2">
                    <img src="imagenes/escudooax.png" alt="logo" class="logo-dark" height="40" />
                    <br class="text-muted mt-4" >Direccion de Contraloria Social

                    <ul class="social-list list-inline mt-3" >
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
                <div class="col-1"></div>                
                <div class="col-5">
                    <h4>
                        <p class = "text-center">
                            <br> Ciudad Administrativa (Edificio 2 “Rufino Tamayo”, Planta Baja)
                            <br> Carretera Internacional Oaxaca-Istmo, km. 11.5
                            <br> Tlalixtac de Cabrera, Oaxaca C.P. 68270
                                                 <!-- Contador de visitas -->
                <div class="text-center">
                    Eres la visita numero: {{$contador}}
                </div>
                <!-- Fin Contador de visitas -->
                            
                        </p>
                                            
                    </h4>

                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->
    <!-- Vendor js -->
    <script src="{{ asset('js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.min.js') }}"></script>

    <!-- Remixicons Icons Demo js -->
    <script src="{{ asset('js/pages/demo.remixicons.js') }}"></script>
</body>

</html>
