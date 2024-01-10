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
                                    <thead>
                                        <tr>
                                            <th>Folio</th>
                                            <th>Region</th>
                                            <th>Distrito</th>
                                            <th>Municipio</th>
                                            <th>Fecha nombramiento/acreditacion</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($municipios as $mun)
                                            <tr>
                                                @if (empty($mun->folio))
                                                    <td style="color: red">Sin comite</td>
                                                @else
                                                    <td>{{ $mun->folio }}</td>
                                                @endif
                                                <td>{{ $mun->region }}</td>
                                                <td>{{ $mun->distrito }}</td>
                                                <td>{{ $mun->nombre }}</td>
                                                @if (empty($mun->nombramiento))
                                                    <td style="color: red">Sin comite</td>
                                                @else
                                                    <td>{{ $mun->nombramiento }}</td>
                                                @endif
                                                @switch($mun->estatus ?? -1)
                                                    @case(0)
                                                        <td style="color: green">Comité registrado</td>
                                                    @break

                                                    @case(1)
                                                        <td style="color: green">Comité e integrantes registrados</td>
                                                    @break

                                                    @case(2)
                                                        <td style="color: yellow">Información incompleta y/o faltan integrantes
                                                        </td>
                                                    @break

                                                    @case(3)
                                                        <td style="color: blue">Listo para validar</td>
                                                    @break

                                                    @case(4)
                                                        <td style="color: green">Comité validado</td>
                                                    @break

                                                    @default
                                                        <td style="color: red">Sin comite</td>
                                                @endswitch
                                                <td>
                                                    @if (empty($mun->folio))
                                                        <a type="button" class="btn btn-secondary" title="Registrar"
                                                            href="{{ route('crearComite', $mun->id_municipio) }}"><i
                                                                class="ri-quill-pen-line"></i></a>
                                                    @endif
                                                    <a type="button" class="btn btn-primary" title="Integrantes"
                                                        href="{{ route('integrantes.show', $mun->id_acreditacion) }}"><i
                                                            class="ri-team-fill"></i></a>
                                                    <a type="button" class="btn btn-primary" title="Documentacion"
                                                        href="" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#bs-example-modal-lg-{{ $mun->id_acreditacion }}"><i
                                                            class="ri-folder-open-fill"></i></a>
                                                    <!-- modal documentacion comite-->
                                                    <div class="modal fade"
                                                        id="bs-example-modal-lg-{{ $mun->id_acreditacion }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                                        Documentacion de comite</h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-hidden="true"></button>
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
                                                                                                class="btn btn-danger">
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
                                                                                                class="btn btn-danger">
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
                                                                                                class="btn btn-danger">
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
                                                    <a type="button" class="btn btn-primary" title="Editar"
                                                        href="{{ route('integrantes.show', $mun->id_acreditacion) }}"><i
                                                            class="ri-pencil-fill"></i></a>
                                                    <a type="button" class="btn btn-primary"
                                                        title="Informacion Completa"
                                                        href="{{ route('integrantes.show', $mun->id_acreditacion) }}"><i
                                                            class="ri-thumb-up-fill"></i></a>
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
@endsection
