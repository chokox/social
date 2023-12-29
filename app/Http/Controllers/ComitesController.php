<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatalogoMunicipio;
use App\Models\User;
use App\Models\AcreditacionComite;

class ComitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = CatalogoMunicipio::all();
        $user = User::where('rol', 'administrador')->get();
        return view('Administrador/registroComite')->with('municipios', $municipios)->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = new AcreditacionComite();
        $registro->id_municipio = $request->input('municipio');
        $registro->ejercicio = now()->year;

        //$folioMunicipio = CatalogoMunicipio::where('idMunicipio', $request->input('municipio'))->get();
       // $folioMunicipio= $folioMunicipio[0]->folio;

        $estaAcreditado= AcreditacionComite::BuscaMunicipioEjercicio($request->input('municipio'), $registro->ejercicio)->get();
       
        if ($estaAcreditado->count() > 0) {
            dd('esta lleno');
        } else {
            //$registro->folio = ; 
        }
        $registro->ejercicio = now()->year;
        $registro->nombramiento = $request->input('nombramiento');
        $registro->acreditacion = $request->input('acreditacion');
        $registro->elaboracion_acreditacion = $request->input('elaboracion');
        $registro->acredito_en = $request->input('se_acredito');
        $registro->capacito_comite = $request->input('capacito_comite');
        $registro->id_user_autorizo_fk = $request->input('autorizo_acreditacion');
        $registro->acta_asamblea = $request->input('acta_asamblea');
        $registro->lista_asistencia = $request->input('lista_asamblea');
        $registro->datos_municipio = $request->input('datos_municipio');
        $registro->estatus = $request->input('estatus');
        //$registro->save();

        return view('Administrador/registroComite');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
