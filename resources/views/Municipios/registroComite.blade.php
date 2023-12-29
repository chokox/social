@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro de comite</div>

                    <div class="card-body">
                         <form method="POST" action="{{ route('comites.store') }}">
                                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Municipio</label>
                                <select class="form-control" name="municipio">
                                    @foreach($municipios as $municipios)
                                       <option value="{{$municipios->id_municipio}}">{{$municipios->nombre}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombramiento en el acta de asamblea</label>
                                <input type="text" class="form-control" name="nombramiento">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Entrega de acreditacion</label>
                                <input type="text" class="form-control" name="acreditacion">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Elaboracion de acreditacion</label>
                                <input type="text" class="form-control" name="elaboracion">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Se acredito en:</label>
                                <select class="form-control" name="se_acredito">
                                    <option>Departamento de Capacitacion a Municipios</option>
                                    <option>Oficina Regional</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Capacito comite</label>
                                <select class="form-control" name="capacito_comite">
                                    <option>Departamento de Capacitacion a Municipios</option>
                                    <option>Oficina Regional</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Autorizo acreditacion</label>
                                <select class="form-control" name="capacito_comite">
                                    @foreach($user as $user)
                                        <option {{$user->id}}>{{$user->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Acta de asamblea</label>
                                <input type="text" class="form-control" name="acta_asamblea">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Lista de asistencia</label>
                                <input type="text" class="form-control" name="lista_asamblea">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Datos del municipio y controladores</label>
                                <input type="text" class="form-control" name="datos_municipio">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Estatus de la informacion</label>
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
@endsection
