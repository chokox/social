@extends('micrositio.appmicrositio')
@section('content')
    <!-- START HERO -->
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="mt-md-4">
                        <div>
                            <span class="text-50 ms-1">
                                <h3></h3>
                            </span>
                        </div>
                        <h1 class="text fw-normal mb-4 mt-3 hero-title">
                            Buzón Ciudadano
                        </h1>

                        <p class="mb-4 font-16 text-white-50">Hyper is a fully featured dashboard and admin template
                            comes with tones of well designed UI elements, components, widgets and pages.</p>

                    </div>
                </div>
                <div class="col-md-5 offset-md-2">
                    <div class="text-md-end mt-3 mt-md-0">
                        <img src="{{ asset('imagenes/startup.svg') }}" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END HERO -->
    <!-- START SERVICES -->
    <section class="py-5">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2>¿Para qué sirve el Buzón Ciudadano?</h2>
                        <br>
                        <br>
                        <br>
                        <p class="text-muted mt-2">TEs el medio a través del cual, la Secretaría de Honestidad,
                            Transparencia y Función Pública,
                            conoce tus quejas y/o denuncias, inconformidades, sugerencias, reconocimientos y felicitaciones
                            relacionadas con el actuar
                            de los servidores Públicos del Poder Ejecutivo del Estado de Oaxaca.</p>
                    </div>
                    <br>
                    <h2>Queremos escucharte.</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="text-center p-2 p-sm-3">
                        <div class="avatar-sm m-auto">
                            <span class="avatar-title bg-primary-lighten rounded-circle">
                                <i class="uil uil-desktop text-primary font-24"></i>
                            </span>
                        </div>
                        <h4 class="mt-3">¿Qué es una queja de trámites y servicios y en qué casos se presentan? </h4>
                        <p class="text-muted mt-4 mb-0">Et harum quidem rerum as expedita distinctio nam libero tempore
                            cum soluta nobis est cumque quo.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="text-center p-2 p-sm-3">
                        <div class="avatar-sm m-auto">
                            <span class="avatar-title bg-primary-lighten rounded-circle">
                                <i class="uil uil-vector-square text-primary font-24"></i>
                            </span>
                        </div>
                        <h4 class="mt-3">¿Qué es una denuncia y que puedo denunciar?</h4>
                        <p class="text-muted mt-4 mb-0">Temporibus autem quibusdam et aut officiis necessitatibus saepe
                            eveniet ut sit et recusandae.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="text-center p-2 p-sm-3">
                        <div class="avatar-sm m-auto">
                            <span class="avatar-title bg-primary-lighten rounded-circle">
                                <i class="uil uil-presentation text-primary font-24"></i>
                            </span>
                        </div>
                        <h4 class="mt-3">¿Cuándo presentar un reconocimiento, sugerencia o felicitación?</h4>
                        <p class="text-muted mt-4 mb-0">Nam libero tempore, cum soluta a est eligendi minus id quod
                            maxime placeate facere assumenda est.
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <br>
                    <br>
                    <br>
                    <h2>Tipos de denuncia.</h2>
                    <br>
                    <br>
                    <br>
                    <p class="text-muted mt-2">Estos son algunos ejemplos de faltas administrativas o actos de corrupción
                        que puedes ser cometidos por servidores públicos o personas físicas y morales que estén vinculadas
                        con
                        actos de gobierno, si has sido víctima o eres testigo de ello, ¡DENUNCIA¡, la autoridad está
                        obligada
                        a guardar en todo momento tu identidad y la Secrecía del asunto, también puedes hacerlo de manera
                        anónima.</p>
                </div>
                <div class="">
                    <div class="text p-2 p-sm-3">
                            <i class="mdi mdi-circle-medium text-primary"></i>Cunando un servidor público da o recibe una remuneración monetaria, regalos o favor, para hacer su trabajo o dejarlo de hacer.</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Realizar actos para beneficio propio o para terceros con los que se tenga una relación personal.</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Soborno.</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Abuso de funciones.</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Utilización indebida de información.</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Solicitar un cobro no exhibido.</p>
                    </div>
                </div>




            </div>

        </div>
    </section>
    <!-- END SERVICES -->
@endsection
