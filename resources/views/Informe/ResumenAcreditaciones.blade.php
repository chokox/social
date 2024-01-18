
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
                                <div class="tab-pane show active" id="scroll-horizontal-preview">
                                    <table  id="scroll-horizontal-datatable" class="table nowrap order-column w-100">
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
                                                            <td>{{ $itemB['totalIntegrantes'] }}</td>
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
            </div>

        </div>
    </div>
</div>
<script>

</script>
@endsection
 

