@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title"> <i class="ri-pie-chart-fill"></i> Informe de Encuesta Evaluar para Mejorar</h4>
                        </div>

                    </div>
                </div>
                <h4 style="text-align: center"><strong> Encuestas aplicadas: {{ $total }} </strong></h4>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="datatable-municipios-preview">
                                        <table class="table mb-0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Pregunta</th>
                                                    <th>Resultado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $preguntas = [
                                                    '1. ¿A través de qué medio se enteró de los trámites y servicios que presta esta Dependencia??',
                                                    '2. ¿Identificó fácilmente las diferentes áreas de atención?',
                                                    '3. ¿Considera que en algún momento fue discriminado por parte de la Institución?',
                                                    '4. ¿Las instalaciones cuentan con los servicios y condiciones necesarios para brindar una buena atención?',
                                                    '5. En la atención brindada, ¿se respetó el horario de atención?',
                                                    '6. ¿Cómo se siente con respecto al tiempo que invirtió para realizar su trámite o servicio?',
                                                    '7. ¿Durante el desarrollo del trámite o servicio existió algún retraso?',
                                                    '8. ¿La persona servidora pública respetó los turnos para la atención?',
                                                    '9. ¿Le solicitaron algún requisito o cobro no exhibido?',
                                                    '10. ¿El servidor público a cambio de brindarle su atención, le insinuó o solicitó de forma directa algún tipo de beneficio, entre estos (dinero, regalos o favor)?',
                                                    '11. ¿Algún gestor o tercera persona, para agilizar el trámite, servicio o atención de la o el servidor público, le insinuó o solicitó de forma directa algún tipo de beneficio, entre estos (dinero, regalos o favor)?',
                                                    '12. ¿Se siente satisfecho con el desempeño de la persona servidora pública?',
                                                    '13. ¿El trámite o servicio que realizó fue satisfactorio?',
                                                    '14. Derivado de la atención recibida desea interponer:',
                                                ];
                                                $respuestas = ['pregunta1', 'presgunta2', 'pregunta3', 'pregunta4', 'pregunta5', 'pregunta6', 'pregunta7', 'pregunta8', 'pregunta9', 'pregunta10', 'pregunta11', 'pregunta12', 'pregunta13', 'pregunta14'];
                                                
                                                ?>
                                                @foreach ($preguntas as $index => $pregunta)
                                                    <tr>
                                                        <td>{{ $pregunta }}</td>
                                                        @php
                                                            $cantidadSi = App\Models\EvaluarparaMejorar::where($respuestas[$loop->index], 'SI')
                                                                ->where('id_programacion_fk', $id)
                                                                ->count();
                                                            $porcentajeSi = ($cantidadSi * 100) / $total;

                                                            $cantidadNo = App\EvaluarparaMejorar::where($respuestas[$loop->index], 'NO')
                                                                ->where('id_programacion_fk', $id)
                                                                ->count();
                                                            $porcentajeNo = ($cantidadNo * 100) / $total;
                                                        @endphp
                                                        <td style="min-width: 200px;">
                                                            <span>SI - </span>
                                                            <span class="progress-value fw-bold"> {{ $cantidadSi }}
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: {{ $porcentajeSi }}%;"></div>
                                                            </div>
                                                            <span>NO - </span>
                                                            <span class="progress-value fw-bold"> {{ $cantidadNo }}
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: {{ $porcentajeNo }}%;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
