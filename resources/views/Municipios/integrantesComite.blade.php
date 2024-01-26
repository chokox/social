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
                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#bs-example-modal-lg"><i class=" ri-user-add-fill"></i>Agregar integrante</a>
                                         @if($estatus == 4)
                                                    <a type="button" class="btn btn-secondary"
                                                            title="Credencial"
                                                            href="{{ route('credencial_integrante', $id) }}"><i
                                                                class="ri-contacts-book-2-line"></i>Credenciales</a>
                                                                @endif
                                </div>
                                <br>
                                <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Sexo</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Edad</th>
                                            <th>Trabajo</th>
                                            <th>Estudios</th>
                                            <th>Lengua Indígena</th>
                                            <th>Uso de computadora</th>
                                            <th>Domicilio</th>
                                            <th>Teléfono fijo</th>
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
                                                <td>{{ $integrantes->observacion_identificacion }}
                                                    {{ $integrantes->observacion_fotografia }}
                                                    {{ $integrantes->observacion_carta }}
                                                    {{ $integrantes->observacion_constancia }}</td>
                                                <td> <a type="button" class="btn btn-primary" title="Documentacion"
                                                        href="" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#bs-example-modal-lg-{{ $integrantes->id_integrante_comite }}"><i
                                                            class="ri-folder-open-fill"></i></a>
                                                    <a type="button" class="btn btn-primary" title="Documentacion"
                                                        href="" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#bs-example-modal-editar-{{ $integrantes->id_integrante_comite }}"><i
                                                            class="ri-pencil-fill"></i></a>
                                                            @if($estatus == 4)
                                                   <a type="button" class="btn btn-primary"
                                                            title="Constancia"
                                                            href="{{ route('constancia_integrante', $integrantes->id_integrante_comite) }}"><i
                                                                class="ri-profile-line"></i></a>
                                                                @endif
                                                    @if($estatus != 4 and (Auth::user()->super() or Auth::user()->administrador()))
                                                      
                                                    
                                                    <form
                                                        action="{{ route('integrantes.destroy', $integrantes->id_integrante_comite) }}"
                                                        method="post" style="display: inline-block; vertical-align: middle;">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="confirmarEliminar()">
                                                            <i class="ri-delete-bin-6-line"></i>
                                                        </button>
                                                    </form>
                                                   
                                                    @endif

                                                    <!-- modal documentacion integrantes-->
                                                    <div class="modal fade"
                                                        id="bs-example-modal-lg-{{ $integrantes->id_integrante_comite }}"
                                                        tabindex="-1" role="dialog"
                                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myLargeModalLabel">
                                                                            Documentación de integrante</h4>
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
                                                                                <td>Credencial de elector</td>
                                                                                @if (empty($integrantes->archivo_ine))
                                                                                    <td>
                                                                                        <form
                                                                                            action="{{ route('CSubirDocInt', $integrantes->id_integrante_comite) }}"
                                                                                            method="POST"
                                                                                            enctype="multipart/form-data" style="display: inline-block; vertical-align: middle;">
                                                                                            @csrf
                                                                                            @method('PUT')
                                                                                            <input type="text"
                                                                                                name="tipo"
                                                                                                value="ine" hidden>
                                                                                            <input type="file"
                                                                                                name="archivo_ine"
                                                                                                accept=".doc, .docx, .pdf">&nbsp;&nbsp;
                                                                                            <button type="submit"
                                                                                                class="btn btn-info">Cargar</button>
                                                                                        </form>
                                                                                    </td>
                                                                                @else
                                                                                    <td><a type="button"
                                                                                            class="btn btn-primary"
                                                                                            href="{{ asset('storage/' . $integrantes->archivo_ine) }}"><i
                                                                                                class="ri-file-download-line"></i>
                                                                                            Descargar</a>&nbsp;
                                                                                            @if($estatus != 4 and (Auth::user()->super() or Auth::user()->administrador()))
                                                                                            <form
                                                                                            action="{{ route('CEliminarDocInt', ['id' => '1' . $integrantes->id_integrante_comite]) }}"
                                                                                            method="post" style="display: inline-block; vertical-align: middle;">
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
                                                                                        @endif
                                                                                    </td>
                                                                                @endif
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Carta bajo protesta</td>
                                                                                @if (empty($integrantes->archivo_protesta))
                                                                                    <td>
                                                                                        <form
                                                                                            action="{{ route('CSubirDocInt', $integrantes->id_integrante_comite) }}"
                                                                                            method="POST"
                                                                                            enctype="multipart/form-data" style="display: inline-block; vertical-align: middle;">
                                                                                            @csrf
                                                                                            @method('PUT')
                                                                                            <input type="text"
                                                                                                name="tipo"
                                                                                                value="protesta" hidden>
                                                                                            <input type="file"
                                                                                                name="archivo_protesta"
                                                                                                accept=".doc, .docx, .pdf">&nbsp;&nbsp;
                                                                                            <button type="submit"
                                                                                                class="btn btn-info">Cargar</button>
                                                                                        </form>
                                                                                    </td>
                                                                                @else
                                                                                    <td><a type="button"
                                                                                            class="btn btn-primary"
                                                                                            href="{{ asset('storage/' . $integrantes->archivo_protesta) }}"><i
                                                                                                class="ri-file-download-line"></i>
                                                                                            Descargar</a>&nbsp;
                                                                                            @if($estatus != 4 and (Auth::user()->super() or Auth::user()->administrador()))
                                                                                        <form
                                                                                            action="{{ route('CEliminarDocInt', ['id' => '2' . $integrantes->id_integrante_comite]) }}"
                                                                                            method="post" style="display: inline-block; vertical-align: middle;">
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
                                                                                        @endif
                                                                                    </td>
                                                                                @endif
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Constancia emitida por la Autoridad
                                                                                    Municipal</td>
                                                                                @if (empty($integrantes->archivo_constancia))
                                                                                    <td>
                                                                                        <form
                                                                                            action="{{ route('CSubirDocInt', $integrantes->id_integrante_comite) }}"
                                                                                            method="POST"
                                                                                            enctype="multipart/form-data" style="display: inline-block; vertical-align: middle;">
                                                                                            @csrf
                                                                                            @method('PUT')
                                                                                            <input type="text"
                                                                                                name="tipo"
                                                                                                value="constancia" hidden>
                                                                                            <input type="file"
                                                                                                name="archivo_constancia"
                                                                                                accept=".doc, .docx, .pdf">&nbsp;&nbsp;
                                                                                            <button type="submit"
                                                                                                class="btn btn-info">Cargar</button>
                                                                                        </form>
                                                                                    </td>
                                                                                @else
                                                                                    <td><a type="button"
                                                                                            class="btn btn-primary"
                                                                                            href="{{ asset('storage/' . $integrantes->archivo_constancia) }}"><i
                                                                                                class="ri-file-download-line"></i>
                                                                                            Descargar</a>&nbsp;
                                                                                            @if($estatus != 4 and (Auth::user()->super() or Auth::user()->administrador()))
                                                                                        <form
                                                                                            action="{{ route('CEliminarDocInt', ['id' => '3' . $integrantes->id_integrante_comite]) }}"
                                                                                            method="post" style="display: inline-block; vertical-align: middle;">
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
                                                                                        @endif
                                                                                    </td>
                                                                                @endif
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Fotografía tamaño infantil</td>
                                                                                @if (empty($integrantes->archivo_fotografia))
                                                                                    <td>
                                                                                        <form
                                                                                            action="{{ route('CSubirDocInt', $integrantes->id_integrante_comite) }}"
                                                                                            method="POST"
                                                                                            enctype="multipart/form-data" style="display: inline-block; vertical-align: middle;">
                                                                                            @csrf
                                                                                            @method('PUT')
                                                                                            <input type="text"
                                                                                                name="tipo"
                                                                                                value="fotografia" hidden>
                                                                                            <input type="file"
                                                                                                name="archivo_fotografia"
                                                                                                accept=".jpeg, .jpg, .png">&nbsp;&nbsp;
                                                                                            <button type="submit"
                                                                                                class="btn btn-info">Cargar</button>
                                                                                        </form>
                                                                                    </td>
                                                                                @else
                                                                                    <td><a type="button"
                                                                                            class="btn btn-primary"
                                                                                            href="{{ asset('storage/' . $integrantes->archivo_fotografia) }}"><i
                                                                                                class="ri-file-download-line"></i>
                                                                                            Descargar</a>&nbsp;
                                                                                            @if($estatus != 4 and (Auth::user()->super() or Auth::user()->administrador()))
                                                                                        <form
                                                                                            action="{{ route('CEliminarDocInt', ['id' => '4' . $integrantes->id_integrante_comite]) }}"
                                                                                            method="post" style="display: inline-block; vertical-align: middle;">
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
                                                                                        @endif                                                                    
                                                                                    </td>
                                                                                    @endif
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- fin de modal documentacion integrantes -->
                                                    <!-- modal edicion integrantes-->
                                                    <div class="modal fade"
                                                        id="bs-example-modal-editar-{{ $integrantes->id_integrante_comite }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                                        Editar</h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-hidden="true"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="{{ route('integrantes.update', $integrantes->id_integrante_comite) }}">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <input type="text" class="form-control"
                                                                                name="id_comite"
                                                                                value="{{ $id }}" hidden>
                                                                            <label for="simpleinput"
                                                                                class="form-label">Nombre Completo</label>
                                                                            <input type="text" class="form-control"
                                                                                name="nombre"
                                                                                placeholder="{{ $integrantes->nombre_completo }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">Sexo</label>
                                                                            <select class="form-control" name="sexo">
                                                                                <option value="HOMBRE">Hombre</option>
                                                                                <option value="MUJER">Mujer</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">Fecha de
                                                                                nacimiento</label>
                                                                            <input type="date" class="form-control"
                                                                                name="fecha_nacimiento"
                                                                                placeholder="{{ $integrantes->fecha_nacimiento }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">Ocupacion</label>
                                                                            <input type="text" class="form-control"
                                                                                name="ocupacion"
                                                                                placeholder="{{ $integrantes->ocupacion }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">Escolaridad</label>
                                                                            <select class="form-control"
                                                                                name="escolaridad">
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
                                                                            <label for="simpleinput"
                                                                                class="form-label">¿Habla lengua
                                                                                indigena?</label>
                                                                            <select class="form-control"
                                                                                name="lengua_indigena">
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
                                                                            <label for="simpleinput"
                                                                                class="form-label">¿Sabe usar
                                                                                computadora?</label>
                                                                            <select class="form-control"
                                                                                name="usa_computadora">
                                                                                <option value="SI">Si</option>
                                                                                <option value="NO">No</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">Domicilio</label>
                                                                            <input type="text" class="form-control"
                                                                                name="domicilio"
                                                                                placeholder="{{ $integrantes->domicilio }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">telefono fijo</label>
                                                                            <input type="number" class="form-control"
                                                                                name="telefono_fijo"
                                                                                placeholder="{{ $integrantes->telefono }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">telefono celular</label>
                                                                            <input type="number" class="form-control"
                                                                                name="telefono_celular"
                                                                                placeholder="{{ $integrantes->celular }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">correo
                                                                                electronico</label>
                                                                            <input type="email" class="form-control"
                                                                                name="correo"
                                                                                placeholder="{{ $integrantes->correo }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">¿En su Municipio donde
                                                                                se puede tener acceso a
                                                                                Internet?</label>
                                                                            <input type="text" class="form-control"
                                                                                name="acceso_internet"
                                                                                placeholder="{{ $integrantes->acceso_internet }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">Observaciones
                                                                                identificacion</label>
                                                                            <input type="text" class="form-control"
                                                                                name="obs_identificacion"
                                                                                placeholder="{{ $integrantes->observacion_identificacion }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">Observaciones
                                                                                fotografia</label>
                                                                            <input type="text" class="form-control"
                                                                                name="obs_fotografia"
                                                                                placeholder="{{ $integrantes->observacion_fotografia }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">Observaciones carta bajo
                                                                                protesta</label>
                                                                            <input type="text" class="form-control"
                                                                                name="obs_carta"
                                                                                placeholder="{{ $integrantes->observacion_carta }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="simpleinput"
                                                                                class="form-label">observaciones
                                                                                constancia</label>
                                                                            <input type="text" class="form-control"
                                                                                name="obs_constancia"
                                                                                placeholder="{{ $integrantes->observacion_constancia }}">
                                                                        </div>
                                                                        <br>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Actualizar</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- fin de modal edicion integrantes -->
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
                            <input type="text" class="form-control" name="id_comite" value="{{ $id }} "
                                hidden>
                            <label for="simpleinput" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre" required maxlength="100">
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
                            <input type="text" class="form-control" name="ocupacion" required  maxlength="70">
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
                            <label for="simpleinput" class="form-label">¿Habla lengua indígena?</label>
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
                            <input type="text" class="form-control" name="domicilio" requerid  maxlength="120">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Teléfono fijo</label>
                            <input type="number" class="form-control" name="telefono_fijo" required >
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Teléfono celular</label>
                            <input type="number" class="form-control" name="telefono_celular" required>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="correo" required  maxlength="60">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">¿En su Municipio donde se puede tener acceso a
                                Internet?</label>
                            <input type="text" class="form-control" name="acceso_internet" required  maxlength="100">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Observaciones identificación</label>
                            <input type="text" class="form-control" name="obs_identificacion" required  maxlength="80">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Observaciones fotografía</label>
                            <input type="text" class="form-control" name="obs_fotografia" required maxlength="80">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Observaciones carta bajo protesta</label>
                            <input type="text" class="form-control" name="obs_carta" required maxlength="80">
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">observaciones constancia</label>
                            <input type="text" class="form-control" name="obs_constancia" required maxlength="80">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de modal registro de integrante -->

    <script>
        function confirmarEliminar() {
            if (confirm('¿Estás seguro de que deseas eliminar este elemento?')) {
                document.getElementById('eliminarForm').submit();
            }
        }
        
    </script>
@endsection
