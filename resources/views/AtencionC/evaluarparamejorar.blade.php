@extends('layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <center><h3  class="page-title">ENCUESTA “EVALUAR PARA MEJORAR”</h3></center>
                        </div>
                    </div>
                </div>


                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <form action="{{ route('guardarDireccionFisica') }}" method="post">
                        @csrf
                        <div class=" mb-3">
                            <label>Oficina</label>
                            <input type="text" class="form-control form-control-sm" name="oficina" required />
                            <br>
                            <label for="simpleinput" class="form-label">Sexo</label>
                            <select class="form-control" name="sexo">
                                <option value="HOMBRE">Hombre</option>
                                <option value="MUJER">Mujer</option>
                            </select>
                            <br>
                            <label>No. de módulo o ventanilla</label>
                            <input type="text" class="form-control form-control-sm" name="num_modulo" required />
                            <br>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        INFORMACIÓN
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <?php
                                        $preguntas = ['1. ¿A través de qué medio se enteró de los trámites y servicios que presta esta Dependencia?', 
                                                    '2.¿Identificó fácilmente las diferentes áreas de atención?'];
                                        ?>
                                        @foreach ($preguntas as $index => $pregunta)
                                            <a class="text-primary fw-bold mb-1 d-block">{{ $pregunta }}</a>
                                            <div class="mt-2 ms-3">
                                                @foreach (['Medios de difusión', 'En el módulo de información'] as $respuesta)
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio"
                                                            id="informacion{{ $index }}{{ $respuesta }}"
                                                            name="informacion{{ $index }}" class="form-check-input"
                                                            value="{{ $respuesta }}" required>
                                                        <label class="form-check-label"
                                                            for="informacion{{ $index }}{{ $respuesta }}">{{ $respuesta }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        EQUIDAD
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">
                                        <?php
                                        $preguntas = ['3. ¿Considera que en algún momento fue discriminado por parte de la Institución?'];
                                        ?>
                                        @foreach ($preguntas as $index => $pregunta)
                                            <a class="text-primary fw-bold mb-1 d-block">{{ $pregunta }}</a>
                                            <div class="mt-2 ms-3">
                                                @foreach (['SI', 'NO'] as $respuesta)
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio"
                                                            id="mecanismos{{ $index }}{{ $respuesta }}"
                                                            name="mecanismos{{ $index }}" class="form-check-input"
                                                            value="{{ $respuesta }}" required>
                                                        <label class="form-check-label"
                                                            for="mecanismos{{ $index }}{{ $respuesta }}">{{ $respuesta }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        INSTALACIONES
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body">

                                        <?php
                                        $preguntas = ['4. ¿Las instalaciones cuentan con los servicios y condiciones necesarios para brindar una buena atención?'];
                                        ?>
                                        @foreach ($preguntas as $index => $pregunta)
                                            <a class="text-primary fw-bold mb-1 d-block">{{ $pregunta }}</a>
                                            <div class="mt-2 ms-3">
                                                @foreach (['SI', 'NO'] as $respuesta)
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio"
                                                            id="accesibilidad{{ $index }}{{ $respuesta }}"
                                                            name="accesibilidad{{ $index }}"
                                                            class="form-check-input" value="{{ $respuesta }}" required>
                                                        <label class="form-check-label"
                                                            for="accesibilidad{{ $index }}{{ $respuesta }}">{{ $respuesta }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFour">
                                        TIEMPO DE ATENCIÓN
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body">
                                        <?php
                                        $preguntas = ['5. En la atención brindada, ¿se respetó el horario de atención?', '6. ¿Cómo se siente con respecto al tiempo que invirtió para realizar su trámite o servicio?', '7. ¿Durante el desarrollo del trámite o servicio existió algún retraso?', '8. ¿La persona servidora pública respetó los turnos para la atención?'];
                                        ?>
                                        @foreach ($preguntas as $index => $pregunta)
                                            <a class="text-primary fw-bold mb-1 d-block">{{ $pregunta }}</a>
                                            <div class="mt-2 ms-3">
                                                @foreach (['SI', 'NO'] as $respuesta)
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio"
                                                            id="infraestructura{{ $index }}{{ $respuesta }}"
                                                            name="infraestructura{{ $index }}"
                                                            class="form-check-input" value="{{ $respuesta }}"
                                                            required>
                                                        <label class="form-check-label"
                                                            for="infraestructura{{ $index }}{{ $respuesta }}">{{ $respuesta }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFive">
                                        HONESTIDAD
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingFive">
                                    <div class="accordion-body">
                                        <?php
                                        $preguntas = ['9. ¿Le solicitaron algún requisito o cobro no exhibido?', '10. ¿El servidor público a cambio de brindarle su atención, le insinuó o solicitó de forma directa algún tipo de beneficio, entre estos (dinero, regalos o favor)?', '11. ¿Algún gestor o tercera persona, para agilizar el trámite, servicio o atención de la o el servidor público, le insinuó o solicitó de forma directa algún tipo de beneficio, entre estos (dinero, regalos o favor)?'];
                                        ?>
                                        @foreach ($preguntas as $index => $pregunta)
                                            <a class="text-primary fw-bold mb-1 d-block">{{ $pregunta }}</a>
                                            <div class="mt-2 ms-3">
                                                @foreach (['SI', 'NO'] as $respuesta)
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio"
                                                            id="infraestructura{{ $index }}{{ $respuesta }}"
                                                            name="infraestructura{{ $index }}"
                                                            class="form-check-input" value="{{ $respuesta }}"
                                                            required>
                                                        <label class="form-check-label"
                                                            for="infraestructura{{ $index }}{{ $respuesta }}">{{ $respuesta }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseSix">
                                        AMABILIDAD
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingSix">
                                    <div class="accordion-body">
                                        <?php
                                        $preguntas = ['12. ¿Se siente satisfecho con el desempeño de la persona servidora pública?'];
                                        ?>
                                        @foreach ($preguntas as $index => $pregunta)
                                            <a class="text-primary fw-bold mb-1 d-block">{{ $pregunta }}</a>
                                            <div class="mt-2 ms-3">
                                                @foreach (['SI', 'NO'] as $respuesta)
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio"
                                                            id="infraestructura{{ $index }}{{ $respuesta }}"
                                                            name="infraestructura{{ $index }}"
                                                            class="form-check-input" value="{{ $respuesta }}"
                                                            required>
                                                        <label class="form-check-label"
                                                            for="infraestructura{{ $index }}{{ $respuesta }}">{{ $respuesta }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseSeven">
                                        GRADO DE SATISFACCIÓN
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingSeven">
                                    <div class="accordion-body">
                                        <?php
                                        $preguntas = ['13. ¿El trámite o servicio que realizó fue satisfactorio?', 
                                                      '14. Derivado de la atención recibida desea interponer:'];
                                        ?>
                                        @foreach ($preguntas as $index => $pregunta)
                                            <a class="text-primary fw-bold mb-1 d-block">{{ $pregunta }}</a>
                                            <div class="mt-2 ms-3">
                                                @foreach (['SI', 'NO'] as $respuesta)
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio"
                                                            id="infraestructura{{ $index }}{{ $respuesta }}"
                                                            name="infraestructura{{ $index }}"
                                                            class="form-check-input" value="{{ $respuesta }}"
                                                            required>
                                                        <label class="form-check-label"
                                                            for="infraestructura{{ $index }}{{ $respuesta }}">{{ $respuesta }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Guardar Respuestas</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
    function mostrarInput() {
  var radioOpcion1 = document.querySelector('input[value="opcion1"]');
  var inputContainer = document.getElementById('inputContainer');

  if (radioOpcion1.checked) {
    inputContainer.style.display = 'block';
  } else {
    inputContainer.style.display = 'none';
  }
}
    </script>
@endsection
