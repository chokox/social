@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
            <br>
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title"> <i class="ri-mail-line"></i>  BUZON NUMERO {{$buzon}}</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="datatable-municipios-preview">
                                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tipo</th>
                                                    <th>Abierto por</th>
                                                    <th>Estatus</th>
                                                    <th>Creado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($todo as $item)
                                                    <tr>
                                                        <td>{{ $item['id_comentario_buzon'] }}</td>
                                                        <td>{{ $item['tipo_comentario'] }}</td>
                                                        <td>abieto por</td>
                                                        <td>estatus</td>
                                                        <td>{{ $item['created_at'] }}</td>
                                                        <td>
                                                            <a title="Editar" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#modalVer{{ $item['id_comentario_buzon'] }}"> 
                                                                <i class="ri-eye-line"></i> Ver
                                                            </a>
                                                        </td>
                                                    </tr>
                                                   <!-- inicioModal para ver buzon-->
                                    <div id="modalVer{{$item['id_comentario_buzon'] }}" class="modal fade" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"> Agregar Buzon </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('buzon.store') }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class=" mb-3">
                                                            <label>Numero de Buzon</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="txtBuzon" />
                                                        </div>
                                                        <div class=" mb-3">
                                                            <label>Dependencia/Programa </label>
                                                            <select class="form-control form-control-sm"
                                                                name="txtAgregarRol" id="txtAgregarRol">
                                                                <option value="0">Seleccione una opcion</option>
                                                                <option value="1">Dependencia/Entidad</option>
                                                                <option value="2">Programa Federal</option>
                                                                <option value="3">Programa social</option>
                                                            </select>
                                                        </div>
                                                        <div class=" mb-3">

                                                            <select class="form-control form-control-sm"
                                                                name="txtTipoBuzon" id="txtTipoBuzon">
                                                                <!-- Opciones serán agregadas dinámicamente -->
                                                            </select>
                                                        </div>

                                                        <div class=" mb-3">
                                                            <label>Ubicacion</label>
                                                            <textarea name="txtUbicacion" class="form-control form-control-sm"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fin  Modal de para ver buzon -->
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