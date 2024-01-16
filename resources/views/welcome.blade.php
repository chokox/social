@extends('micrositio.appmicrositio')
@section('content')
    <section class="row mt-3 mb-3">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{ asset('imagenes/slide1.png') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('imagenes/slide2.png') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('imagenes/slide3.png') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('imagenes/slide4.jpg') }}" alt="fourth slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
        <div class="col-sm-1"></div>
        </div>
    </section>
        <!-- START SERVICES -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="text-center p-2 p-sm-3">
                        <div class="m-auto">
                            <img class="mx-auto d-block" style="width: 30%;"
                                src="{{ asset('imagenes/Acreditacion.svg') }}" alt="">
                        </div>
                        <h4 class="mt-3">ACREDITACIÓN</h4>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/COMITES DE CONTRALORIA SOCIAL 2023.pdf') }}">
                            <span class="text-muted mt-2 mb-0">COMITÉS DE CONTRALORÍA SOCIAL 2023</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/COMITES DE CONTRALORIA SOCIAL 2022.pdf') }}">
                            <span class="text-muted mt-2 mb-0">COMITÉS DE CONTRALORÍA SOCIAL 2022</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/COMITES DE CONTRALORIA SOCIAL 2021.pdf') }}">
                            <span class="text-muted mt-2 mb-0">COMITÉS DE CONTRALORÍA SOCIAL 2021</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/COMITES DE CONTRALORIA SOCIAL 2020.pdf') }}">
                            <span class="text-muted mt-2 mb-0">COMITÉS DE CONTRALORÍA SOCIAL 2020</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/COMITES DE CONTRALORIA SOCIAL 2019.pdf') }}">
                            <span class="text-muted mt-2 mb-0">COMITÉS DE CONTRALORÍA SOCIAL 2019</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="https://www.oaxaca.gob.mx/sctg/wp-content/uploads/sites/40/2016/02/ACREDITACION-DE-COMITES-DE-CONTRALORIA-SOCIAL-2018-1.pdf">
                            <span class="text-muted mt-2 mb-0">COMITÉS DE CONTRALORÍA SOCIAL 2018</span>
                        </a>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="text-center p-2 p-sm-3">
                        <div class="m-auto">
                            <img class="mx-auto d-block" style="width: 30%;"
                                src="{{ asset('imagenes/seguimiento.svg') }}" alt="">
                        </div>
                        <h4 class="mt-3">SEGUIMIENTO A ACCIONES</h4>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/REPORTE DE VIGILANCIA RECIBIDOS 2023.pdf') }}">
                            <span class="text-muted mt-2 mb-0">REPORTE DE VIGILANCIA RECIBIDOS 2023</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/REPORTE DE VIGILANCIA RECIBIDOS 2022.pdf') }}">
                            <span class="text-muted mt-2 mb-0">REPORTE DE VIGILANCIA RECIBIDOS 2022</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/REPORTE DE VIGILANCIA RECIBIDOS 2021.pdf') }}">
                            <span class="text-muted mt-2 mb-0">REPORTE DE VIGILANCIA RECIBIDOS 2021</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/REPORTE DE VIGILANCIA RECIBIDOS 2020.pdf') }}">
                            <span class="text-muted mt-2 mb-0">REPORTE DE VIGILANCIA RECIBIDOS 2020</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/REPORTE DE VIGILANCIA RECIBIDOS 2019.pdf') }}">
                            <span class="text-muted mt-2 mb-0">REPORTE DE VIGILANCIA RECIBIDOS 2019</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="https://www.oaxaca.gob.mx/sctg/wp-content/uploads/sites/40/2016/02/ACREDITACION-DE-COMITES-DE-CONTRALORIA-SOCIAL-2018-1.pdf">
                            <span class="text-muted mt-2 mb-0">REPORTE DE VIGILANCIA RECIBIDOS 2018</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/RESUMEN DE REPORTES RECIBIDOS 2018.pdf') }}">
                            <span class="text-muted mt-2 mb-0">RESUMEN DE REPORTES RECIBIDOS 2018</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="text-center p-2 p-sm-3">
                        <div class="m-auto">
                            <img class="mx-auto d-block" style="width: 30%;"
                                src="{{ asset('imagenes/Talleres.svg') }}" alt="">
                        </div>
                        <h4 class="mt-3">TALLERES</h4>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/TALLERES IMPARTIDOS 2023.pdf') }}">
                            <span class="text-muted mt-2 mb-0">TALLERES IMPARTIDOS 2023</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/TALLERES IMPARTIDOS 2022.pdf') }}">
                            <span class="text-muted mt-2 mb-0">TALLERES IMPARTIDOS 2022</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/TALLERES IMPARTIDOS 2021.pdf') }}">
                            <span class="text-muted mt-2 mb-0">TALLERES IMPARTIDOS 2021</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/TALLERES IMPARTIDOS 2020.pdf') }}">
                            <span class="text-muted mt-2 mb-0">TALLERES IMPARTIDOS 2020</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="{{ asset('files/TALLERES IMPARTIDOS 2019.pdf') }}">
                            <span class="text-muted mt-2 mb-0">TALLERES IMPARTIDOS 2019</span>
                        </a>
                        <br>
                        <a target="_blank" class="text-center"
                            href="https://www.oaxaca.gob.mx/sctg/wp-content/uploads/sites/40/2016/02/ACREDITACION-DE-COMITES-DE-CONTRALORIA-SOCIAL-2018-1.pdf">
                            <span class="text-muted mt-2 mb-0">TALLERES IMPARTIDOS 2018</span>
                        </a>


                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="text-center p-2 p-sm-3">
                        <div class=" m-auto">
                            <img class="mx-auto d-block" style="width: 30%;"
                                src="{{ asset('imagenes/eje-buzones.png') }}" alt="">
                        </div>
                        <h4 class="mt-3">BUZONES DE ATENCIÓN CIUDADANA</h4>
                        <a target="_blank" class="text-center" href="{{ asset('files/RESULTADOS 2023.pdf') }}">
                            <span class="text-muted mt-2 mb-0">RESULTADOS 2023</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="text-center p-2 p-sm-3">
                        <div class="m-auto">
                            <img class="mx-auto d-block" style="width: 30%;"
                                src="{{ asset('imagenes/eje-evaluar-para-mejorar.png') }}" alt="">
                        </div>
                        <h4 class="mt-3">EVALUAR PARA MEJORAR</h4>
                        <a target="_blank" class="text-center" href="public/files/EVALUAR PARA MEJORAR.pdf">
                            <span class="text-muted mt-2 mb-0">EVALUAR PARA MEJORAR</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICES -->

    <!-- START FEATURES 1 -->
    <section class="py-5 bg-light-lighten border-top border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3>Guía practica para <span class="text-primary">Contraloras y Contralores Sociales</span>
                        </h3>
                        <p></p>
                        <p></p>
                        <p></p>
                        <embed src="files/GUIA2023.pdf#toolbar=1&navpanes=0&scrollbar=1" type="application/pdf"
                            width="100%" height="500px" />

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
