@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title"> <i class="ri-pie-chart-fill"></i> Informe de Encuesta Evaluar para Mejorar
                            </h4>
                        </div>

                    </div>
                </div>
                <h4 style="text-align: center"><strong> Encuestas aplicadas: {{ $total }} </strong></h4>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div align="right">
                                    <a type="button" class="btn btn-success"
                                        href="{{ route('programacion_evaluaciones.show', '1' . $id) }}">
                                        <i class="ri-todo-line"></i><span> Ver encuestas</span>
                                    </a>
                                    <br>
                                    <br>
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
                                                    <tr>
                                                        <td>1. ¿A través de qué medio se enteró de los trámites y servicios
                                                            que presta esta Dependencia?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>Medios de difusión</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>En el módulo de información</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>Otro</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2. ¿Identificó fácilmente las diferentes áreas de atención?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3. ¿Considera que en algún momento fue discriminado por parte de
                                                            la Institución?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4. ¿Las instalaciones cuentan con los servicios y condiciones
                                                            necesarios para brindar una buena atención?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5. En la atención brindada, ¿se respetó el horario de atención?
                                                        </td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>6. ¿Cómo se siente con respecto al tiempo que invirtió para
                                                            realizar su trámite o servicio?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>7. ¿Durante el desarrollo del trámite o servicio existió algún
                                                            retraso?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>8. ¿La persona servidora pública respetó los turnos para la
                                                            atención?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>9. ¿Le solicitaron algún requisito o cobro no exhibido?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>10. ¿El servidor público a cambio de brindarle su atención, le
                                                            insinuó o solicitó de forma directa algún tipo de beneficio,
                                                            entre estos (dinero, regalos o favor)?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>11. ¿Algún gestor o tercera persona, para agilizar el trámite,
                                                            servicio o atención de la o el servidor público, le insinuó o
                                                            solicitó de forma directa algún tipo de beneficio, entre estos
                                                            (dinero, regalos o favor)?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>12. ¿Se siente satisfecho con el desempeño de la persona
                                                            servidora pública?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>13. ¿El trámite o servicio que realizó fue satisfactorio?</td>
                                                        <td style="min-width: 200px;">
                                                            <span>SI</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>NO</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>14. Derivado de la atención recibida desea interponer:</td>
                                                        <td style="min-width: 200px;">
                                                            <span>Queja</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>Denuncia</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                            <span>Ninguna</span>
                                                            <span class="progress-value fw-bold">
                                                            </span>
                                                            <div class="progress progress-lg">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: %;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
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
