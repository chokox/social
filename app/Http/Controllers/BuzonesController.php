<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buzone;
use App\Models\TipoBuzone;
use RealRashid\SweetAlert\Facades\Alert;

class BuzonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buzones = Buzone::all();
        //$consulta=TipoBuzone::TipoBuzon($tipo)->get();
        return view('AtencionC/buzones')->with('buzones', $buzones);
    }

    // En tu controlador, crea un método para manejar la solicitud AJAX
    public function obtenerTiposBuzon(Request $request, $tipo)
    {
        $resultados = TipoBuzone::where('tipo', $tipo)->get();
        return response()->json($resultados);
    }

    public function registrarTiposBuzon(Request $request)
    {
        $registro = new TipoBuzone();
        $registro->tipo = $request->input('txtAgregarTipo');
        $registro->nombre_dependecia_programa = $request->input('nombre_dpm');
        $registro->save();

        Alert::success('Registro correcto', 'La Dependencia, Programa o Municipio fue registrado de manera satisfactoria');
        return back();
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
        //
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
