
@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Usuarios</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="datatable-usuarios-preview">
                                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>Identificador</th>
                                                <th>Nombre</th>
                                                <th>Correo Electronico</th>
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($catalogo as $item)
                                                <tr>
                                                    <td>{{ $item['id'] }}</td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ $item['email'] }}</td>
                                                    <td>{{ $item['rol'] }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                                                        data-bs-target="#modalEditarUsuario{{ $item['id'] }}">
                                                            <i class="ri-file-edit-line"></i>
                                                        </button>
                                                        <form
                                                        action="{{ route('catalogo_usuarios.destroy', $item['id'] )}}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" 
                                                                data-bs-placement="top" data-bs-title="Eliminar">
                                                            <i class="ri-delete-bin-2-fill"></i>
                                                        </button>
                                        </form>
                                                        
                                                    </td>   
                                                </tr>
                                                <!--modal editar usuarios-->
                                                <div id="modalEditarUsuario{{ $item['id'] }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" > Editar Usuario </h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                            action="{{ route('catalogo_usuarios.update', $item['id']) }}">
                                                            @csrf
                                                            @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class=" mb-3">
                                                                        <label >Nombre</label>
                                                                        <input type="text" class="form-control form-control-sm" name="txtNombre" placeholder="{{ $item['name'] }}" />
                                                                    </div>
                                                                    <div class=" mb-3">
                                                                        <label >Correo Electronico </label>
                                                                        <input type="text" class="form-control form-control-sm" name="txtEmail" placeholder="{{ $item['email'] }}"   />
                                                                    </div>
                                                                    <div class=" mb-3">
                                                                        <label >Contraseña</label>
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="password" name="txtContrasena" class="form-control">
                                                                            <div class="input-group-text show-password" data-password="true">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" mb-3">
                                                                        <label >Rol administrativo</label>
                                                                        <input type="text" class="form-control form-control-sm" name="txtRol" placeholder="{{ $item['rol'] }}" />
                                                                    </div>   
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"  class="btn btn-primary">Guardar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <!--modal editar usuarios-->
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
 

