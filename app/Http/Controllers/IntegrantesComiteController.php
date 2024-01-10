<?php

namespace App\Http\Controllers;

use App\Models\IntegrantesComite;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
