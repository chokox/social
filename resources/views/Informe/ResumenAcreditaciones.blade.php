
@extends('layouts.app')

@section('content')
@php
use Carbon\Carbon;
@endphp

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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ejercicioAño-select" class="form-label">Año</label>
                                <select class="form-select selectpicker" id="ejercicioAño-select" data-width="auto" style="max-width: 150px;">
                                    <option value="2024">Ejercicio 2024</option>
                                    <option value="2023">Ejercicio 2023</option>
                                    <option value="2022">Ejercicio 2022</option>
                                    <option value="2021">Ejercicio 2021</option>
                                    <option value="2020">Ejercicio 2020</option>
                                </select>
                            </div>
                            <div class="tab-content">
                               
                                    <table  class="table table-bordered table-centered mb-0">
                                        <thead class="table-dark ">
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
                                            @php
                                                $totalComites = 0;
                                                $totalIntegrantes = 0;
                                                $totalMujeres = 0;
                                                $totalHombres = 0;
                                                $totalHablanLenguaIndigena = 0;
                                                $totalMunicipiosMujeres = 0;
                                                $totalMunicipiosHombres = 0;
                                                $totalMunipiosAlmenosMujer = 0;
                                                $aux=0;
                                                
                                            @endphp
                                        
                                            @foreach ($totComites as $itemA)
                                                <tr>
                                                    <td>{{ $itemA['region'] }}</td>
                                                    <td>{{ $itemA['total'] }}</td>
                                        
                                                    @php
                                                        $totalComites += $itemA['total'];
                                                    @endphp
                                        
                                                    @foreach ($totintegrantes as $itemB)
                                                        @if ($itemA['region'] == $itemB['region'])
                                                            <td>
                                                                @php
                                                                $aux++;
                                                                @endphp
                                                                
                                                                <a type="button" class="btn btn-primary" href="{{ route('modalIntegrantes', ['modalAux' => $aux]) }}" 
                                                                    data-bs-toggle="modal" data-bs-target="#modalVerIntegrantes">
                                                                    {{ $itemB['totalIntegrantes'] }}
                                                                </a>
                                                                
                                                            </td>  
                                                            <td>{{ $itemB['total_mujeres'] }}</td>
                                                            <td>{{ $itemB['total_hombres'] }}</td>
                                                            <td>{{ $itemB['total_hablan_lengua_indigena'] }}</td>
                                                            <td>{{ $itemB['municipios_solo_mujeres'] }}</td>
                                                            <td>{{ $itemB['municipios_solo_hombres'] }}</td>
                                                            <td>{{ $itemB['municipios_al_menos_una_mujer'] }}</td>
                                        

                                                            @php
                                                                $totalIntegrantes += $itemB['totalIntegrantes'];
                                                                $totalMujeres += $itemB['total_mujeres'];
                                                                $totalHombres += $itemB['total_hombres'];
                                                                $totalHablanLenguaIndigena += $itemB['total_hablan_lengua_indigena'];
                                                                $totalMunicipiosMujeres += $itemB['municipios_solo_mujeres'];
                                                                $totalMunicipiosHombres += $itemB['municipios_solo_hombres'];
                                                                $totalMunipiosAlmenosMujer += $itemB['municipios_al_menos_una_mujer'];
                                                            @endphp
                                                        @endif
                                                    <!--modal integrantes-->
                                                <div id="modalVerIntegrantes" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" > Directorio de Contralores</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <!--modal integrantes-->
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tr style="font-weight: bold;">
                                            <td>TOTAL</td>
                                            <td>{{ $totalComites }}</td>
                                            <td>{{ $totalIntegrantes }}</td>
                                            <td>{{ $totalMujeres }}</td>
                                            <td>{{ $totalHombres }}</td>
                                            <td>{{ $totalHablanLenguaIndigena }}</td>
                                            <td>{{ $totalMunicipiosMujeres }}</td>
                                            <td>{{ $totalMunicipiosHombres }}</td>
                                            <td>{{ $totalMunipiosAlmenosMujer }}</td>
                                        </tr>
                                    </table>
                                
                            </div> 
                            
                        </div> 
                    </div> 
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="scroll-horizontal-datatable" class="table table-bordered table-centered mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th rowspan="2" class="align-middle">Region</th>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <th colspan="2" style="text-align: center;">{{ strtoupper(Carbon::create()->month($i)->locale('es')->isoFormat('MMMM')) }}</th>
                                        @endfor
                                        <th colspan="2" style="text-align: center;">TOTAL</th>
                                    </tr>
                                    <tr>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <th>Comites</th>
                                            <th>Contralores</th>
                                        @endfor
                                        <th>Comites</th>
                                        <th>Contralores</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($comitesMensual as $itemA)
                                        <tr>
                                            <td>{{ $itemA['region'] }}</td>
                                            
                                            @php
                                                $totalComitesPorMes = 0;
                                            @endphp
                                
                                            @for ($i = 1; $i <= 12; $i++)
                                                <td>{{ $itemA["{$meses[$i]}Comites"] }}</td>
                                                @php
                                                    $totalComitesPorMes += $itemA["{$meses[$i]}Comites"];
                                                @endphp
                                
                                                @php
                                                    $contralorParaEsteMes = collect($contraloresMensual)
                                                        ->where('region', $itemA['region'])
                                                        ->first();
                                                @endphp
                                
                                                <td>{{ $contralorParaEsteMes["{$meses[$i]}Contralores"] }}</td>
                                            @endfor
                                
                                            <td>{{ $itemA['total_comites'] }}</td>
                                            @php
                                                $totalContraloresParaEstaRegion = collect($contraloresMensual)
                                                    ->where('region', $itemA['region'])
                                                    ->sum('total_contralores');
                                            @endphp
                                            <td>{{ $totalContraloresParaEstaRegion }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                {{-- Agregar la última fila con los totales de comités y contralores por mes --}}
                                <tr style="font-weight: bold;">
                                    <td>TOTAL</td>
                                    @php
                                    $totalComitesAnual = 0;
                                    $totalContraloresAnual = 0;
                                    @endphp
                                    @foreach ($comitesMensual as $itemA)
                                    @php
                                    $totalComitesAnual += $itemA['total_comites'];
                                    @endphp
                                    @foreach ($contraloresMensual as $itemB)
                                    @if ($itemA['region'] == $itemB['region'])
                                    @php
                                    $totalContraloresAnual += $itemB['total_contralores'];
                                    @endphp
                                    @endif
                                    @endforeach
                                    @endforeach

                                    @for ($i = 1; $i <= 12; $i++)
                                        @php
                                        $totalComitesPorMes = collect($comitesMensual)->sum("{$meses[$i]}Comites");
                                        $totalContraloresPorMes = collect($contraloresMensual)->sum("{$meses[$i]}Contralores");
                                        @endphp
                                        <td>{{ $totalComitesPorMes }}</td>
                                        <td>{{ $totalContraloresPorMes }}</td>   
                                    @endfor
                                    <td>{{ $totalComitesAnual }}</td>
                                    <td>{{ $totalContraloresAnual }}</td>
                                </tr>
                            </table>      
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 


