
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Basic Data Table</h4>

                <div class="tab-content">
                    <div class="tab-pane show active" id="datatable-municipios-preview">
                        <table id="datatable-municipios" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Municipo</th>
                                    <th>Region</th>
                                    <th>Distrito</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($catalogo as $item)
                                    <tr>
                                        <td>{{ $item['folio'] }}</td>
                                        <td>{{ $item['nombre'] }}</td>
                                        <td>{{ $item['region'] }}</td>
                                        <td>{{ $item['distrito'] }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup-modal"
                                            data-target="#modalEditarMunicipio{{ $item['id_municipio'] }}">
                                                <i class="material-icons ">Editar</i>
                                            </button>
                                            
                                        </td>   
                                    </tr>
                                    <!--modal editar municipios-->
                                    
                                    <!--modal editar municipios-->
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div>
</div> 
    
<script>
    
    $(document).ready(function() {
        $('#datatable-municipios').DataTable({
        });
    });
</script> 
@endsection
 

