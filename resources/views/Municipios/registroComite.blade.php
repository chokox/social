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
                            <h4 class="page-title">Registro de Comite</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route('comites.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1">Municipio</label>
                                        <select class="form-control" name="municipio">
                                            @foreach ($municipios as $municipios)
                                                <option value="{{ $municipios->id_municipio }}">{{ $municipios->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label  for="simpleinput" class="form-label">Nombramiento en el acta de asamblea</label>
                                        <input type="text" class="form-control" name="nombramiento">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Entrega de acreditacion</label>
                                        <input type="text" class="form-control" name="acreditacion">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Elaboracion de acreditacion</label>
                                        <input type="text" class="form-control" name="elaboracion">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Se acredito en:</label>
                                        <select class="form-control" name="se_acredito">
                                            <option>Departamento de Capacitacion a Municipios</option>
                                            <option>Oficina Regional</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Capacito comite</label>
                                        <select class="form-control" name="capacito_comite">
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
                                        <input type="text" class="form-control" name="acta_asamblea">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Lista de asistencia</label>
                                        <input type="text" class="form-control" name="lista_asamblea">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Datos del municipio y controladores</label>
                                        <input type="text" class="form-control" name="datos_municipio">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Estatus de la informacion</label>
                                        <input type="text" class="form-control" name="estatus">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
