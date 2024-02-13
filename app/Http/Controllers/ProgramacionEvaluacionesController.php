<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramacionEvaluacione;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class ProgramacionEvaluacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buzones = ProgramacionEvaluacione::TraeDependencias()->get();
        return view('AtencionC/programacionEncuestas')->with('buzones', $buzones);
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
        $registro = new ProgramacionEvaluacione();
        $registro->id_catalogo_dependencias_fk = $request->input('txtTipoBuzon');
        $registro->fecha_inicio = $request->input('fecha_inicio');
        $registro->fecha_fin = $request->input('fecha_fin');
        $registro->tipo_intervencion = $request->input('etapa');
        $registro->observaciones = $request->input('observaciones');

        $fechaActual = Carbon::now();
        $elemento = ProgramacionEvaluacione::where('fecha_inicio', '<=', $fechaActual)->where('fecha_fin', '>=', $fechaActual)->value('id_programacion');

        if (is_null($elemento)) {
            $registro->save();
            Alert::success('Evaluacion Programada correctamente', null);
            return back();
        } else {
            Alert::error('Periodo ocupado', 'Ya existe una intervencion en las fechas seleccionadas');
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
        $registro = ProgramacionEvaluacione::find($id);
        $registro->fecha_inicio = $request->input('fecha_inicio');
        $registro->fecha_fin = $request->input('fecha_fin');
        $registro->tipo_intervencion = $request->input('etapa');
        $registro->observaciones = $request->input('observaciones'); 
        $registro->save();
        
        Alert::success('Programacion de evaluación editada correctamente', null);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $dato = ProgramacionEvaluacione::find($id);
            $dato->delete();
            Alert::success('Programacion eliminada', null);
            return back();
        } catch (\Exception $e) {
            Alert::error('Ha ocurrido un error al eliminar la programacion.', null);
            return back();
        }
    }
}
