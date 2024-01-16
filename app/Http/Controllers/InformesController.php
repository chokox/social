<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\IntegrantesComite;
use App\Models\AcreditacionComite;


class InformesController extends Controller
{
    public function resumenAcreditaciones()
    {
       
       //;$sqlQuery = $totComites->toSql();
       // dd ($sqlQuery); 
    $defaultYear = 2023; // Año por defecto
    $totComites = AcreditacionComite::ContarPorRegion($defaultYear)->get();
    $totintegrantes = IntegrantesComite::ContarPorIntegrantes($defaultYear)->get();

    return view('Informe/ResumenAcreditaciones',compact('totComites', 'totintegrantes'));
         
   
    }
}
