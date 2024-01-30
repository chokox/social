<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComentariosBuzone;
use App\Models\Buzone;
use RealRashid\SweetAlert\Facades\Alert;

class ComentariosBuzonesController extends Controller
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
        $registro = new ComentariosBuzone();
        $registro->id_buzon_fk = $request->input('nBuzon');
        $registro->tramite_realizado = $request->input('tramite_realizado');
        $registro->nombre = $request->input('nombre');
        $registro->tipo_comentario = $request->input('tipo_comentario');
        $registro->comentario = $request->input('comentario');
        if (!is_null($request->file('multimedia'))) {
            $ruta = 'buzon digital';
            if ($request->hasFile('multimedia') && $request->file('multimedia')->isValid()) {
                $nombreArchivo = $request->file('multimedia')->store($ruta, 'public');
                $registro->multimedia = $nombreArchivo;
            }
        }
        $registro->nombre_servidor = $request->input('nombre_SP');
        $registro->save();

        Alert::success('Comentario Registrado', 'Su comentario se a enviado a la Secretaria de Honestidad, Transparencia y Función Pública para su seguimiento.');
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
        $buzon= Buzone::find($id);
        $buzon=$buzon->numero_buzon;
        $todo= ComentariosBuzone::where('id_buzon_fk',$id)->get();
        return view('AtencionC/verBuzon', compact('buzon'))->with('todo', $todo);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nbuzon)
    {
        return view('AtencionC/buzonPublico', compact('nbuzon'));
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
