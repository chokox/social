
@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h2 class="page-title">RESÚMEN DE ACREDITACIONES</h2>
                        <p  class="text-muted font-20 mb-3">
                            Este apartado es un Concentrado de Información de las Acreditaciones de los Comités de Contraloría Social que realizarán los trabajos de supervisión y vigilancia de recursos públicos en sus municipios.
                        </p>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a href="#home" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                        <span class="d-none d-md-block"> Ejercicio 2024</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                        <span class="d-none d-md-block"> Ejercicio 2023</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                        <span class="d-none d-md-block"> Ejercicio 2022</span>
                    </a>
                </li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane show active" id="home">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="datatable-municipios-preview">
                                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Región</th>
                                                        <th>Total de Comités</th>
                                                        <th>Total de Integrantes</th>
                                                        <th>Integrantes Mujeres</th>
                                                        <th>Integrantes Hombres</th>
                                                        <th>Hablan lengua indígena</th>
                                                        <th>Municipios con solo mujeres</th>
                                                        <th>Municipios con solo hombres</th>
                                                        <th>Municipios con al menos una mujer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   {{--  @foreach ($catalogo as $item)
                                                        <tr>
                                                            <td>{{ $item['folio'] }}</td>
                                                            <td>{{ $item['nombre'] }}</td>
                                                            <td>{{ $item['region'] }}</td>
                                                            <td>{{ $item['distrito'] }}</td>
                                                        </tr>
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="profile">
                    <p>2023</p>
                </div>
                <div class="tab-pane" id="settings">
                    <p>2022</p>
                </div>
            </div>
            

            
        </div>
    </div>
</div>

@endsection
 

