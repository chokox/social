<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $catalogo = User::where('deprecated', 0)->get();
        return view('Usuarios/CatalogoUsuarios')->with('catalogo', $catalogo);
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'txtNombre' => ['nullable', 'regex:/^[A-Za-z\s]+$/'],
                'txtEmail' => ['nullable', 'email'],
                'txtContrasena' => ['nullable', 'string', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
                'txtRol' => ['nullable', 'regex:/^[A-Za-z\s]+$/']
            ], [
                'txtNombre.regex' => 'El campo nombre debe contener solo letras y espacios.',
                'txtEmail.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
                'txtContrasena.regex' => 'La contraseña debe contener al menos una letra, un número y un caracter especial, y tener una longitud mínima de 8 caracteres.',
                'txtRol.regex' => 'El campo rol debe contener solo letras y espacios.'
            ]);
    
            if ($validator->fails()) {
                Alert::info($validator->errors()->first(), null);
                return back()->withErrors($validator)->withInput();
            }
    
            $dato = User::find($id);
    
            if ($request->filled('txtNombre')) {
                $dato->nombre = $request->input('txtNombre');
            }
            if ($request->filled('txtEmail')) {
                $dato->email = $request->input('txtEmail');
            }
            if ($request->filled('txtContrasena')) {
                $nuevaContraseña = bcrypt($request->input('txtContrasena'));
                $dato->password = $nuevaContraseña;
            }
            if ($request->filled('txtRol')) {
                $dato->rol = $request->input('txtRol');
            }
            $dato->save();
            Alert::success('Usuario Guardado', 'Los datos se han guardado correctamente.');
            return back();
        } catch (\Exception $e) {
            Alert::error('Ha ocurrido un error al actualizar los datos.', null);
            return back();
        }

    }

    public function destroy($id){
        try {
            
    
            $dato = User::find($id);
            $dato->deprecated = '1';
            $dato->save();
    
            Alert::success('Usuario Eliminado', 'Los datos fueron marcados como obsoletos correctamente.');
            return back();
        } catch (\Exception $e) {
            Alert::error('Ha ocurrido un error al marcar los datos como obsoletos.', null);
            return back();
        }
        
    }
    

}
