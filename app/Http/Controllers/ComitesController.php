<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatalogoMunicipio;

class ComitesController extends Controller
{
    public function registro()
    {
        $municipios= CatalogoMunicipio::all();
        return view('Administrador/registroComite')->with('municipios', $municipios);;
    }
}
