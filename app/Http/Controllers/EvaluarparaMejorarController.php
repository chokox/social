<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\EvaluarparaMejorar;
use App\Models\ProgramacionEvaluacione;
use Carbon\Carbon;
use Auth;

class EvaluarparaMejorarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function viewEvaluarparaMejorar()
     {
         $fechaActual = Carbon::now();
         $elemento = ProgramacionEvaluacione::where('fecha_inicio', '<=', $fechaActual)->where('fecha_fin', '>=', $fechaActual)->value('id_programacion');
 
         if (is_null($elemento)) {
             Alert::error('Sin encuesta programada', 'No se encuentra ninguna evaluación programada para estas fechas.');
             return back();
         } else {
             return view('AtencionC/evaluarparamejorar');
         }
     }
    public function guardarRespuestasEvaluarparaMejorar(Request $request)
    {
        
            
                
            $fechaActual = Carbon::now();
            $elemento = ProgramacionEvaluacione::where('fecha_inicio', '<=', $fechaActual)->where('fecha_fin', '>=', $fechaActual)->value('id_programacion');

            $evaluarparaMejorar = new EvaluarparaMejorar();
            $evaluarparaMejorar->id_programacion_fk = $elemento;
            $evaluarparaMejorar->id_user_fk = Auth::id();
            $evaluarparaMejorar->oficina = $request->input('oficina');
            $evaluarparaMejorar->sexo = $request->input('sexo');
            $evaluarparaMejorar->tramite_servicio = $request->input('tipo');
            $evaluarparaMejorar->pregunta1 = $request->input('informacion1');
            $evaluarparaMejorar->pregunta2 = $request->input('informacion2');
            $evaluarparaMejorar->pregunta3 = $request->input('informacion3');
            $evaluarparaMejorar->pregunta4 = $request->input('informacion4');
            $evaluarparaMejorar->pregunta5 = $request->input('informacion5');
            $evaluarparaMejorar->pregunta6 = $request->input('informacion6');
            $evaluarparaMejorar->pregunta7 = $request->input('informacion7');
            $evaluarparaMejorar->pregunta8 = $request->input('informacion8');
            $evaluarparaMejorar->pregunta9 = $request->input('informacion9');
            $evaluarparaMejorar->pregunta10 = $request->input('informacion10');
            $evaluarparaMejorar->pregunta11 = $request->input('informacion11');
            $evaluarparaMejorar->pregunta12 = $request->input('informacion12');
            $evaluarparaMejorar->pregunta13 = $request->input('informacion13');
            $evaluarparaMejorar->pregunta14 = $request->input('informacion14');

            $evaluarparaMejorar->save();

            Alert::success('Evaluación Terminada', 'El usuario realizo correctamente la evaluación');
            return back();
        
    }

    public function ResultadosEncuesta($id)
    {
        $total = EvaluarparaMejorar::where('id_programacion_fk', $id)->count();

        if ($total > 0) {
            return view('AtencionC/informeEncuestasEpM', compact('id', 'total'));
        } else {
            Alert::error('No se tiene registrada ninguna encuesta aun.', null);
            return back();
        }
    }
}
