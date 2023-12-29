<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatalogoMunicipio;
use App\Models\User;
use App\Models\AcreditacionComite;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('Municipios/registroComite')
            ->with('municipios', $municipios)
            ->with('user', $user);
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

        $estaAcreditado = AcreditacionComite::BuscaMunicipioEjercicio($request->input('municipio'), now()->year)->get();
        if ($estaAcreditado->isNotEmpty()) {
            Alert::error('Comite ya acreditado', 'Este comite ya se encuentra acreditado');
            return back();
        } else {
            $folioMunicipio = CatalogoMunicipio::where('id_municipio', $request->input('municipio'))->first();
            $folioMunicipio = $folioMunicipio->folio;
            $numeroConsecutivo = AcreditacionComite::BuscaEjercicio(now()->year)->count() + 1;
            $numeroConsecutivoFormateado = str_pad($numeroConsecutivo, 3, '0', STR_PAD_LEFT);
            $registro->folio = $folioMunicipio . ' ' . $numeroConsecutivoFormateado;
            $registro->id_catalogo_municipio_fk = $request->input('municipio');
            $registro->ejercicio = now()->year;
            $registro->nombramiento = $request->input('nombramiento');
            $registro->acreditacion = $request->input('acreditacion');
            $registro->elaboracion_acreditacion = $request->input('elaboracion');
            $registro->acredito_en = $request->input('se_acredito');
            $registro->capacito_comite = $request->input('capacito_comite');
            $registro->id_user_autorizo_fk = $request->input('autorizo_comite');
            $registro->acta_asamblea = $request->input('acta_asamblea');
            $registro->lista_asistencia = $request->input('lista_asamblea');
            $registro->datos_municipio = $request->input('datos_municipio');
            $registro->estatus = $request->input('estatus');
            $registro->save();

            Alert::success('Comite guardado', null);
            return back();
            
        }
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
