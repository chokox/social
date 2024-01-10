<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatalogoMunicipio;
use App\Models\User;
use App\Models\AcreditacionComite;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ComitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = CatalogoMunicipio::ConAcreditacionComites(now()->year)->get();
        return view('Municipios/comites')->with('municipios', $municipios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function crearComite($id)
    {
        $municipio = CatalogoMunicipio::where('id_municipio', $id)->first();
        $municipio = $municipio->nombre;
        $user = User::where('rol', 'administrador')->get();
        return view('Municipios/registroComite', compact('municipio', 'id'))->with('user', $user);
    }

    public function subirDocumentacion(Request $request, $id)
    {
        $dato = AcreditacionComite::find($id);
        $ruta = 'comites/' . now()->year . '/' . $id;

        if ($request->input('tipo') == 'acta' && ($request->hasFile('archivo_acta') && $request->file('archivo_acta')->isValid())) {
            $nombreArchivo = $request->file('archivo_acta')->store($ruta, 'public');
        } elseif ($request->input('tipo') == 'lista' && ($request->hasFile('archivo_lista') && $request->file('archivo_lista')->isValid())) {
            $nombreArchivo = $request->file('archivo_lista')->store($ruta, 'public');
        } elseif ($request->input('tipo') == 'acuse' && ($request->hasFile('archivo_acuse') && $request->file('archivo_acuse')->isValid())) {
            $nombreArchivo = $request->file('archivo_acuse')->store($ruta, 'public');
        }

        if (Storage::disk('public')->exists($nombreArchivo)) {
            if ($request->input('tipo') == 'acta') {
                $dato->archivo_acta = $nombreArchivo;
            } elseif ($request->input('tipo') == 'lista') {
                $dato->archivo_lista = $nombreArchivo;
            } elseif ($request->input('tipo') == 'acuse') {
                $dato->archivo_acuse = $nombreArchivo;
            }
            $dato->save();

            Alert::success('Documentacion cargada', null);
            return back();
        } else {
            Alert::error('Error', 'No se pudo subir el archivo, porfavor intente mas tarde');
            return back();
        }
    }

    public function eliminarDocumentacion($id)
    {
        $tipo = substr($id, 0, 1);
        $idd = substr($id, 1);

        $documento = AcreditacionComite::find($idd);

        if (!$documento) {
            Alert::error('Error', 'Archivo no encontrado');
            return back();
        }

        if ($tipo == 1) {
            Storage::delete('public/comites/' . now()->year . '/' .$idd . '/' . $documento->arhivo_acta);
        } elseif ($tipo == 2) {
            Storage::delete('public/comites/' . now()->year . '/' . $idd . '/' . $documento->arhivo_lista);
        } elseif ($tipo == 3) {
            Storage::delete('public/comites/' . now()->year . '/' . $idd . '/' . $documento->arhivo_acuse);
        }
        $documento->delete();

        Alert::success('Documentacion eliminada', null);
        return back();
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
            return redirect()->route('comites.index');
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
