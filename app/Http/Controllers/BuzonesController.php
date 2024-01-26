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
       // $buzones = Buzone::all();
        $buzones=Buzone::BuzonTipo()->get();
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
        $registro = new Buzone();
        $registro->numero_buzon = strtoupper($request->input('txtBuzon'));
        $registro->id_catalogo_buzon_fk = $request->input('txtTipoBuzon');
        $registro->ubicacion = $request->input('txtUbicacion');
        $registro->save();

        Alert::success('Buzon Registrado', 'El buzon digital fue registrado de manera satisfactoria');
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
        $registro = Buzone::find($id);
        $registro->numero_buzon = strtoupper($request->input('txtFolio'));
        $registro->ubicacion = $request->input('txtubicacion');
        $registro->save();

        Alert::success('Buzon Registrado', 'El buzon digital fue registrado de manera satisfactoria');
        return back();
    }

    public function descargarQR($id)
{
    $datos = Buzone::find($id);
    $textoQR = $datos->numero_buzon;
    $codigoQR = QrCode::size(300)->generate($textoQR);

    $imagen = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $codigoQR));

    return Response::make($imagen, 200, [
        'Content-Type' => 'image/png',
        'Content-Disposition' => 'attachment; filename="codigo_qr.png"',
    ]);
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
