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
        $totComites = AcreditacionComite::ContarPorRegion(now()->year)->get();
        $totintegrantes = IntegrantesComite::ContarPorIntegrantes(now()->year)->get();
       //;$sqlQuery = $totComites->toSql();
       // dd ($sqlQuery); 
         return view('Informe/ResumenAcreditaciones');
   
    }//10227 10222
}
