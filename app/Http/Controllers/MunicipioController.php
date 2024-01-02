<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatalogoMunicipio;

class MunicipioController extends Controller
{
    public function index(){
        $catalogo = CatalogoMunicipio::get();
        //dd($catalogo);
        return view('Municipios/CatalogoMunicipios')->with('catalogo', $catalogo);
    }
}
