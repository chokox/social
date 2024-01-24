@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Buzones de Atencion Ciudadana</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div align="right">
                                    <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalAgregarBuzon">
                                        <i><svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-mailbox" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 21v-6.5a3.5 3.5 0 0 0 -7 0v6.5h18v-6a4 4 0 0 0 -4 -4h-10.5" />
                                                <path d="M12 11v-8h4l2 2l-2 2h-4" />
                                                <path d="M6 15h1" />
                                            </svg></i> <span> Agregar Buzon</span>
                                        </a>
                               
                                    <a type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#modalAgregarBuzon">
                                        <i><svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-mailbox" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 21v-6.5a3.5 3.5 0 0 0 -7 0v6.5h18v-6a4 4 0 0 0 -4 -4h-10.5" />
                                                <path d="M12 11v-8h4l2 2l-2 2h-4" />
                                                <path d="M6 15h1" />
                                            </svg></i> <span> Registrar Dependencia/Programa</span>
                                        </a>
                                </div><br>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="datatable-municipios-preview">
                                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Dependencia/Programa</th>
                                                    <th>Numero de buzon</th>
                                                    <th>Ubicacion</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($buzones as $item)
                                                    <tr>
                                                        <td>{{ $item['id_buzon'] }}</td>
                                                        <td>{{ $item['nombre'] }}</td>
                                                        <td></td>
                                                        <td>{{ $item['ubicacion'] }}</td>
                                                        <td>
                                                            <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#modalEditarBuzon{{ $item['id_buzon'] }}">
                                                                <i class="ri-file-edit-line"></i>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                    <!--modal editar municipios-->
                                                    <div id="modalEditarBuzon{{ $item['id_buzon'] }}" class="modal fade"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"> Editar Municipio </h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('catalogo_municipios.update', $item['id_buzon']) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class=" mb-3">
                                                                            <label>Numero de buzon</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="txtFolio"
                                                                                placeholder="{{ $item['folio'] }}" />
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <label>Ubicacion</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="txtRegion"
                                                                                placeholder="{{ $item['region'] }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Guardar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--modal editar municipios-->
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- inicioModal de agregar  buzon-->
                                    <div id="modalAgregarBuzon" class="modal fade" tabindex="-1" role="dialog"
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
                                                                name="txtAgregarNombre" />
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
                                                         
                                                        <select class="form-control form-control-sm" name="txtTipoBuzon"
                                                            id="txtTipoBuzon">
                                                            <!-- Opciones serán agregadas dinámicamente -->
                                                        </select>
                                                        </div>

                                                        <div class=" mb-3">
                                                            <label>Ubicacion</label>
                                                            <textarea class="form-control form-control-sm"></textarea>
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
                                <!-- fin  Modal de agregar buzon -->
                                <!-- inicioModal de resgistrar dependencia/priograma-->
                                    <div id="modalAgregarBuzon" class="modal fade" tabindex="-1" role="dialog"
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
                                                                name="txtAgregarNombre" />
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
                                                         
                                                        <select class="form-control form-control-sm" name="txtTipoBuzon"
                                                            id="txtTipoBuzon">
                                                            <!-- Opciones serán agregadas dinámicamente -->
                                                        </select>
                                                        </div>

                                                        <div class=" mb-3">
                                                            <label>Ubicacion</label>
                                                            <textarea class="form-control form-control-sm"></textarea>
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
                                <!-- fin  Modal de resgistrar dependencia/priograma -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#txtAgregarRol').on('change', function () {
            var tipo = $(this).val();

            $.ajax({
                url: '/obtener-tipos-buzon/' + tipo,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#txtTipoBuzon').empty(); 

                    $.each(data, function (key, value) {
                        $('#txtTipoBuzon').append($('<option>', {
                            value: value.id_tipo_buzon,
                            text: value.nombre_dependecia_programa
                        }));
                    });

                    $('#txtTipoBuzon').selectpicker('refresh');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        $('#txtAgregarRol, #txtTipoBuzon').selectpicker();
    });
</script>



@endsection
