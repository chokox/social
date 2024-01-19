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
                            <h4 class="page-title">Comites</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Folio</th>
                                            <th>Region</th>
                                            <th>Distrito</th>
                                            <th>Municipio</th>
                                            <th>Atendido por</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($municipios as $mun)
                                            <tr>
                                                @if (empty($mun->folio_comite))
                                                    <td > S/F</td>
                                                @else
                                                    <td>{{ $mun->folio_comite }}</td>
                                                @endif
                                                <td>{{ $mun->region }}</td>
                                                <td>{{ $mun->distrito }}</td>
                                                <td>{{ $mun->nombre }}</td>
                                                <td>{{ $mun->name }}</td>

                                                @switch($mun->estatus ?? -1)
                                                    @case(0)
                                                        <td style="color:  orange">Comité registrado, falta documentacion e integrantes</td>
                                                    @break

                                                    @case(1)
                                                        <td style="color:  orange">Comité e integrantes registrados, falta documentacion</td>
                                                    @break

                                                    @case(2)
                                                        <td style="color:  orange">Comité y documentación registrados, faltan integrantes
                                                        </td>
                                                    @break

                                                    @case(3)
                                                        <td style="color: blue">Listo para validar</td>
                                                    @break

                                                    @case(4)
                                                        <td style="color: green">Comité validado</td>
                                                    @break

                                                    @case(5)
                                                        <td style="color: red">Revisar informacion</td>
                                                    @break

                                                    @default
                                                        <td style="color: red">Sin comite</td>
                                                @endswitch
                                                <td>
                                                    @if (empty($mun->nombramiento))
                                                        <a type="button" class="btn btn-secondary" title="Registrar"
                                                            href="{{ route('crearComite', $mun->id_municipio) }}"><i
                                                                class="ri-quill-pen-line"></i></a>
                                                    @else
                                                        <a type="button" class="btn btn-primary" title="Integrantes"
                                                            href="{{ route('integrantes.show', $mun->id_acreditacion) }}"><i
                                                                class="ri-team-fill"></i></a>
                                                        <a type="button" class="btn btn-primary" title="Documentacion"
                                                            href="" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#bs-example-modal-lg-{{ $mun->id_acreditacion }}"><i
                                                                class="ri-folder-open-fill"></i></a>

                                                        <!-- modal documentacion comite-->
                                                        <div class="modal fade"
                                                            id="bs-example-modal-lg-{{ $mun->id_acreditacion }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myLargeModalLabel">
                                                                            Documentacion de comite</h4>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-hidden="true"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-centered mb-0">
                                                                            <thead class="table-dark">
                                                                                <tr>
                                                                                    <th>Nombre</th>
                                                                                    <th>Archivo</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Acta de asamblea</td>
                                                                                    @if (empty($mun->archivo_acta))
                                                                                        <td>
                                                                                            <form
                                                                                                action="{{ route('CSubirDoc', $mun->id_acreditacion) }}"
                                                                                                method="POST"
                                                                                                enctype="multipart/form-data">
                                                                                                @csrf
                                                                                                @method('PUT')
                                                                                                <input type="text"
                                                                                                    name="tipo"
                                                                                                    value="acta" hidden>
                                                                                                <input type="file"
                                                                                                    name="archivo_acta"
                                                                                                    accept=".doc, .docx, .pdf">&nbsp;&nbsp;
                                                                                                <button type="submit"
                                                                                                    class="btn btn-info">Cargar</button>
                                                                                            </form>
                                                                                        </td>
                                                                                    @else
                                                                                        <td><a type="button"
                                                                                                class="btn btn-primary"
                                                                                                href="{{ asset('storage/' . $mun->archivo_acta) }}"><i
                                                                                                    class="ri-file-download-line"></i>
                                                                                                Descargar</a>&nbsp;
                                                                                            <form
                                                                                                action="{{ route('CEliminarDoc', ['id' => '1' . $mun->id_acreditacion]) }}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                                @method('delete')

                                                                                                <button type="submit"
                                                                                                    class="btn btn-danger"
                                                                                                    onclick="confirmarEliminar()">
                                                                                                    <i
                                                                                                        class="ri-delete-bin-6-line"></i>
                                                                                                    Eliminar
                                                                                                </button>
                                                                                            </form>

                                                                                        </td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Lista de asistencia</td>
                                                                                    @if (empty($mun->archivo_lista))
                                                                                        <td>
                                                                                            <form
                                                                                                action="{{ route('CSubirDoc', $mun->id_acreditacion) }}"
                                                                                                method="POST"
                                                                                                enctype="multipart/form-data">
                                                                                                @csrf
                                                                                                @method('PUT')
                                                                                                <input type="text"
                                                                                                    name="tipo"
                                                                                                    value="lista" hidden>
                                                                                                <input type="file"
                                                                                                    name="archivo_lista"
                                                                                                    accept=".doc, .docx, .pdf">&nbsp;&nbsp;
                                                                                                <button type="submit"
                                                                                                    class="btn btn-info">Cargar</button>
                                                                                            </form>
                                                                                        </td>
                                                                                    @else
                                                                                        <td><a type="button"
                                                                                                class="btn btn-primary"
                                                                                                href="{{ asset('storage/' . $mun->archivo_lista) }}"><i
                                                                                                    class="ri-file-download-line"></i>
                                                                                                Descargar</a>&nbsp;
                                                                                            <form
                                                                                                action="{{ route('CEliminarDoc', ['id' => '2' . $mun->id_acreditacion]) }}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                                @method('delete')

                                                                                                <button type="submit"
                                                                                                    class="btn btn-danger"
                                                                                                    onclick="confirmarEliminar()">
                                                                                                    <i
                                                                                                        class="ri-delete-bin-6-line"></i>
                                                                                                    Eliminar
                                                                                                </button>
                                                                                            </form>

                                                                                        </td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Acuse</td>
                                                                                    @if (empty($mun->archivo_acuse))
                                                                                        <td>
                                                                                            <form
                                                                                                action="{{ route('CSubirDoc', $mun->id_acreditacion) }}"
                                                                                                method="POST"
                                                                                                enctype="multipart/form-data">
                                                                                                @csrf
                                                                                                @method('PUT')
                                                                                                <input type="text"
                                                                                                    name="tipo"
                                                                                                    value="acuse" hidden>
                                                                                                <input type="file"
                                                                                                    name="archivo_acuse"
                                                                                                    accept=".doc, .docx, .pdf">&nbsp;&nbsp;
                                                                                                <button type="submit"
                                                                                                    class="btn btn-info">Cargar</button>
                                                                                            </form>
                                                                                        </td>
                                                                                    @else
                                                                                        <td><a type="button"
                                                                                                class="btn btn-primary"
                                                                                                href="{{ asset('storage/' . $mun->archivo_acuse) }}"><i
                                                                                                    class="ri-file-download-line"></i>
                                                                                                Descargar</a>&nbsp;
                                                                                            <form
                                                                                                action="{{ route('CEliminarDoc', ['id' => '3' . $mun->id_acreditacion]) }}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                                @method('delete')

                                                                                                <button type="submit"
                                                                                                    class="btn btn-danger"
                                                                                                    onclick="confirmarEliminar()">
                                                                                                    <i
                                                                                                        class="ri-delete-bin-6-line"></i>
                                                                                                    Eliminar
                                                                                                </button>
                                                                                            </form>

                                                                                        </td>
                                                                                    @endif
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- fin de modal documentacion comite -->
                                                        <a type="button" class="btn btn-primary" title="Ver/Editar"
                                                            href="{{ route('comites.edit', $mun->id_acreditacion) }}"><i
                                                                class="ri-eye-fill"></i></a>

                                                            @if ($mun->estatus == 3)
                                                        <a type="button" class="btn btn-primary"
                                                            title="Validar"
                                                            href="{{ route('validarComite', $mun->id_acreditacion) }}"><i
                                                                class="ri-thumb-up-fill"></i></a>
                                                                @endif
                                                                 @if ($mun->estatus != 5)
                                                                <a type="button" class="btn btn-primary"
                                                            title="Validar Informacion"
                                                            href="{{ route('revisarComite', $mun->id_acreditacion) }}"><i
                                                                class="ri-thumb-down-fill"></i></a>
                                                                @endif
                                                      {{--   @if ($mun->estatus == 4) --}}
                                                                <a type="button" class="btn btn-primary"
                                                            title="Constancia"
                                                            href="{{ route('constancia_municipio', $mun->id_acreditacion) }}"><i
                                                                class="ri-profile-line"></i></a>
                                                            {{-- @endif --}}
                                                    @endif
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

    <script>
        function confirmarEliminar() {
            if (confirm('¿Estás seguro de que deseas eliminar este documento?')) {
                document.getElementById('eliminarForm').submit();
            }
        }
    </script>
@endsection
