<?php

namespace App\Http\Controllers;

use App\Models\IntegrantesComite;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class IntegrantesComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro= new IntegrantesComite ();
        $registro->id_acreditacion_comite_fk= $request->input('id_comite');
        $registro->nombre_completo = $request->input('nombre');
        $registro->sexo = $request->input('sexo');
        $registro->fecha_nacimiento= $request->input('fecha_nacimiento');
        $registro->ocupacion = $request->input('ocupacion');
        $registro->escolaridad = $request->input('escolaridad');
        $registro->lengua_indigena = $request->input('lengua_indigena');
        $registro->usa_computadora = $request->input('usa_computadora');
        $registro->domicilio = $request->input('domicilio');
        $registro->telefono = $request->input('telefono_fijo');
        $registro->celular = $request->input('telefono_celular');
        $registro->correo = $request->input('correo');
        $registro->acceso_internet = $request->input('acceso internet');
        $registro->observacion_identificacion = $request->input('obs_identificacion');
        $registro->observacion_fotografia = $request->input('obs_fotografia');
        $registro->observacion_carta = $request->input('obs_carta');
        $registro->observacion_constancia = $request->input('obs_constancia');
        $registro->save();

        Alert::success('Integrante agregado', null );
        return back();
    }

    public function subirDocumentacionIntegrantes(Request $request, $id)
    {
        $dato = IntegrantesComite::find($id);
        $id_comite= $dato->id_acreditacion_comite_fk;
        $ruta = 'comites/' . now()->year . '/' . $id_comite . '/integrantes/' . $id;

        if ($request->input('tipo') == 'ine' && ($request->hasFile('archivo_ine') && $request->file('archivo_ine')->isValid())) {
            $nombreArchivo = $request->file('archivo_ine')->store($ruta, 'public');
        } elseif ($request->input('tipo') == 'protesta' && ($request->hasFile('archivo_protesta') && $request->file('archivo_protesta')->isValid())) {
            $nombreArchivo = $request->file('archivo_protesta')->store($ruta, 'public');
        } elseif ($request->input('tipo') == 'constancia' && ($request->hasFile('archivo_constancia') && $request->file('archivo_constancia')->isValid())) {
            $nombreArchivo = $request->file('archivo_constancia')->store($ruta, 'public');
        } elseif ($request->input('tipo') == 'fotografia' && ($request->hasFile('archivo_fotografia') && $request->file('archivo_fotografia')->isValid())) {
            $nombreArchivo = $request->file('archivo_fotografia')->store($ruta, 'public');
        }

        if (Storage::disk('public')->exists($nombreArchivo)) {
            if ($request->input('tipo') == 'ine') {
                $dato->archivo_ine = $nombreArchivo;
            } elseif ($request->input('tipo') == 'protesta') {
                $dato->archivo_protesta = $nombreArchivo;
            } elseif ($request->input('tipo') == 'constancia') {
                $dato->archivo_constancia = $nombreArchivo;
            } elseif ($request->input('tipo') == 'fotografia') {
                $dato->archivo_fotografia = $nombreArchivo;
            }
            $dato->save();

            Alert::success('Documentacion cargada', null);
            return back();
        } else {
            Alert::error('Error', 'No se pudo subir el archivo, porfavor intente mas tarde');
            return back();
        }
    }

    public function eliminarDocumentacionIntegrantes($id)
    {
        $tipo = substr($id, 0, 1);
        $idd = substr($id, 1);
        $documento = IntegrantesComite::find($idd);

        if (!$documento) {
            Alert::error('Error', 'Archivo no encontrado');
            return back();
        }

        if ($tipo == 1) {
            Storage::disk('public')->delete($documento->archivo_ine);
            $documento->archivo_ine = null;
        } elseif ($tipo == 2) {
            Storage::disk('public')->delete($documento->archivo_protesta);
            $documento->archivo_protesta = null;
        } elseif ($tipo == 3) {
            Storage::disk('public')->delete($documento->archivo_constancia);
            $documento->archivo_constancia = null;
        } elseif ($tipo == 4) {
            Storage::disk('public')->delete($documento->archivo_fotografia);
            $documento->archivo_fotografia = null;
        }
        $documento->save();

        Alert::success('Documentacion eliminada', null);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $integrantes= IntegrantesComite::where('id_acreditacion_comite_fk',$id)->get();
        return view('Municipios/integrantesComite', compact('id'))->with('integrantes', $integrantes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
