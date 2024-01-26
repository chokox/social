<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buzone;
use App\Models\TipoBuzone;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Response;

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

        // Decodifica el código base64 de manera más segura
        $decodedQR = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $codigoQR), true);

        // Verifica si la decodificación fue exitosa
        if ($decodedQR === false) {
            abort(500, 'Error al decodificar el código QR.');
        }

        // Convierte el código base64 decodificado en un recurso de imagen
        $imagen = imagecreatefromstring($decodedQR);

        // Verifica si la creación del recurso de imagen fue exitosa
        if ($imagen === false) {
            abort(500, 'Error al crear el recurso de imagen.');
        }

        // Crea una respuesta con el tipo de contenido correcto y el encabezado de descarga
        $response = Response::make($decodedQR, 200);
        $response->header('Content-Type', 'image/png');
        $response->header('Content-Disposition', 'attachment; filename="codigo_qr.png"');

        // Libera la memoria del recurso de imagen
        imagedestroy($imagen);

        return $response;
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
