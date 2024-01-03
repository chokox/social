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
                                                        <td style="color: yellow">Información incompleta y/o faltan integrantes </td>
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
                                                    <a type="button" class="btn btn-secondary" title="Registrar" href="{{ route('crearComite', $mun->id_municipio) }}"><i class="ri-quill-pen-line"></i></a>
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
@endsection
