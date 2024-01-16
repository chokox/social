@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            @if ($edicion == 'edicion')
                                <h4 class="page-title">Editar Comite de {{ $municipio }}</h4>
                            @else
                                <h4 class="page-title">Registro del Comite de {{ $municipio }}</h4>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($edicion == 'edicion')
                                    <form method="POST" action="{{ route('comites.update', $id) }}">
                                        @method('PUT')
                                    @else
                                        <form method="POST" action="{{ route('comites.store') }}">
                                @endif
                                @csrf
                                @if ($edicion != 'edicion')
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="municipio"
                                            value="{{ $id }}" hidden>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nombramiento en el acta de asamblea</label>
                                    <input type="date" class="form-control" name="nombramiento"
                                        @if ($edicion == 'edicion') value="{{ $dato->nombramiento }}" @endif>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Entrega de acreditacion</label>
                                    <input type="date" class="form-control" name="acreditacion"
                                        @if ($edicion == 'edicion') value="{{ $dato->acreditacion }}" @endif>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Elaboracion de acreditacion</label>
                                    <input type="date" class="form-control" name="elaboracion"
                                        @if ($edicion == 'edicion') value="{{ $dato->elaboracion_acreditacion }}" @endif>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Se acredito en:</label>
                                    <select class="form-control" name="se_acredito">
                                        @if ($edicion == 'edicion')
                                            <option>{{ $dato->acredito_en }}</option>
                                        @endif
                                        <option>Departamento de Capacitacion a Municipios</option>
                                        <option>Oficina Regional</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Capacito comite</label>
                                    <select class="form-control" name="capacito_comite">
                                        @if ($edicion == 'edicion')
                                            <option>{{ $dato->capacito_comite }}</option>
                                        @endif
                                        <option>Departamento de Capacitacion a Municipios</option>
                                        <option>Oficina Regional</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Autorizo acreditacion</label>
                                    <select class="form-control" name="autorizo_comite">
                                        @foreach ($user as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Acta de asamblea</label>
                                    <input type="text" class="form-control" name="acta_asamblea"
                                        @if ($edicion == 'edicion') placeholder="{{ $dato->acta_asamblea }}" @endif>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Lista de asistencia</label>
                                    <input type="text" class="form-control" name="lista_asamblea"
                                        @if ($edicion == 'edicion') placeholder="{{ $dato->lista_asistencia }}" @endif>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Datos del municipio y controladores</label>
                                    <input type="text" class="form-control" name="datos_municipio"
                                        @if ($edicion == 'edicion') placeholder="{{ $dato->datos_municipio }}" @endif>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Estatus de la informacion</label>
                                    <select class="form-control" name="estatus">
                                        @if ($edicion != 'edicion')
                                            <option value="0">Información completa (solo faltan integrantes)</option>
                                        @endif
                                    </select>
                                </div>
                                <br>
                                @if ($edicion == 'edicion')
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
