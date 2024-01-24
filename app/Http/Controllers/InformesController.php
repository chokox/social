<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\IntegrantesComite;
use App\Models\AcreditacionComite;
use App\Models\CatalogoMunicipio;


class InformesController extends Controller
{
    public function resumenAcreditaciones()
    {
       //;$sqlQuery = $totComites->toSql();
       // dd ($sqlQuery); 
    //$defaultYear = 2023; 
    $defaultYear = date('Y');
    //resumen acreditaciones
    $totComites = CatalogoMunicipio::ContarPorRegion($defaultYear)->get();
    $totintegrantes = CatalogoMunicipio::ContarPorIntegrantes($defaultYear)->get();
    //resumen acreditaciones mensuales
    $comitesMensual = CatalogoMunicipio::ConteoComitesMensual($defaultYear)->get();
    $contraloresMensual = CatalogoMunicipio::ConteoContraloresMensual($defaultYear)->get();
    $meses = [
        1 => 'enero',
        2 => 'febrero',
        3 => 'marzo',
        4 => 'abril',
        5 => 'mayo',
        6 => 'junio',
        7 => 'julio',
        8 => 'agosto',
        9 => 'septiembre',
        10 => 'octubre',
        11 => 'noviembre',
        12 => 'diciembre',
    ];

    
    return view('Municipios/ResumenAcreditaciones',compact('totComites','totintegrantes','comitesMensual','contraloresMensual','meses'));
  
    }

}
