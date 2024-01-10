@extends('layouts.app')¿
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Integrantes del Comite</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-xl-end mt-xl-0 mt-2">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#bs-example-modal-lg">Agregar integrante</button>
                                </div>
                                <br>
                                <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Sexo</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Edad</th>
                                            <th>Trabajo</th>
                                            <th>Estudios</th>
                                            <th>Lengua Indigena</th>
                                            <th>uso de computadora</th>
                                            <th>Domicilio</th>
                                            <th>Telefono fijo</th>
                                            <th>Celular</th>
                                            <th>Correo</th>
                                            <th>Acceso a internet</th>
                                            <th>Observaciones</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($integrantes as $integrantes)
                                            <tr>
                                                <td>{{ $integrantes->nombre_completo }}</td>
                                                <td>{{ $integrantes->sexo }}</td>
                                                <td>{{ $integrantes->fecha_nacimiento }}</td>
                                                @php
                                                    $fechaNacimiento = $integrantes->fecha_nacimiento;
                                                    $edad = \Carbon\Carbon::parse($fechaNacimiento)->age;
                                                @endphp
                                                <td>{{ $edad }} años</td>
                                                <td>{{ $integrantes->ocupacion }}</td>
                                                <td>{{ $integrantes->escolaridad }}</td>
                                                <td>{{ $integrantes->lengua_indigena }}</td>
                                                <td>{{ $integrantes->usa_computadora }}</td>
                                                <td>{{ $integrantes->domicilio }}</td>
                                                <td>{{ $integrantes->telefono }}</td>
                                                <td>{{ $integrantes->celular }}</td>
                                                <td>{{ $integrantes->correo }}</td>
                                                <td>{{ $integrantes->acceso_internet }}</td>
                                                <td>{{ $integrantes->observacion_identificacion }} {{ $integrantes->observacion_fotografia }} {{ $integrantes->observacion_carta }} {{ $integrantes->observacion_constancia }}</td>
                                                <td> </td>
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

    <!-- modal registro de integrante-->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Registro de integrante de comite</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('integrantes.store') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" name="id_comite" value="{{ $id }}" hidden>
                            <label for="simpleinput" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Sexo</label>
                            <select class="form-control" name="sexo">
                                <option value="HOMBRE">Hombre</option>
                                <option value="MUJER">Mujer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Ocupacion</label>
                            <input type="text" class="form-control" name="ocupacion">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Escolaridad</label>
                            <select class="form-control" name="escolaridad">
                                <option>PRIMARIA</option>
                                <option>SECUNDARIA</option>
                                <option>CARRERA TECNICA O COMERCIAL</option>
                                <option>LICENCIATURA</option>
                                <option>DIPLOMADO</option>
                                <option>MAESTRIA</option>
                                <option>DOCTORADO</option>
                                <option>POSGRADO</option>
                                <option>SIN ESCOLARIDAD</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">¿Habla lengua indigena?</label>
                            <select class="form-control" name="lengua_indigena">
                                <option>NINGUNO</option>
                                <option>AMUZGO</option>
                                <option>CHATINO</option>
                                <option>CHINANTECO</option>
                                <option>CHOCHOTECO</option>
                                <option>CHONTAL</option>
                                <option>CUICATECO</option>
                                <option>HUAVE</option>
                                <option>IXCATECO</option>
                                <option>MAZATECO</option>
                                <option>MIXE</option>
                                <option>MIXTECO</option>
                                <option>NÁHUATL</option>
                                <option>POPOLACO</option>
                                <option>TRIQUI</option>
                                <option>ZAPOTECO</option>
                                <option>ZOQUE</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">¿Sabe usar computadora?</label>
                            <select class="form-control" name="usa_computadora">
                                <option value="SI">Si</option>
                                <option value="NO">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Domicilio</label>
                            <input type="text" class="form-control" name="domicilio">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">telefono fijo</label>
                            <input type="number" class="form-control" name="telefono_fijo">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">telefono celular</label>
                            <input type="number" class="form-control" name="telefono_celular">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">correo electronico</label>
                            <input type="email" class="form-control" name="correo">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">¿En su Municipio donde se puede tener acceso a
                                Internet?</label>
                            <input type="text" class="form-control" name="acceso_internet">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Observaciones identificacion</label>
                            <input type="text" class="form-control" name="obs_identificacion">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Observaciones fotografia</label>
                            <input type="text" class="form-control" name="obs_fotografia">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Observaciones carta bajo protesta</label>
                            <input type="text" class="form-control" name="obs_carta">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">observaciones constancia</label>
                            <input type="text" class="form-control" name="obs_constancia">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de modal registro de integrante -->
@endsection
