<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class VerificacionFisicaController extends Controller
{
 

    public function viewDireccionFisica()
    {
       
        return view('AtencionC/verificacionFisica');
    }

    public function guardarRespuestas(Request $request)
    {
        // Validar y procesar los datos del formulario
        $respuestas = $request->input(); // Obtener todas las respuestas del formulario

        // Almacenar las respuestas en la base de datos
        VerificacionFinanciera::create($respuestas);

        // Redirigir a la página deseada después de guardar las respuestas
        return redirect()->route('ruta_deseada');
    }
}
