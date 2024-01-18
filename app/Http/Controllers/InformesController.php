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
  
   /*  SELECT
    cm.region,
    SUM(CASE WHEN MONTH(ac.created_at) = 1 THEN 1 ELSE 0 END) AS eneroComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 2 THEN 1 ELSE 0 END) AS febreroComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 3 THEN 1 ELSE 0 END) AS marzoComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 4 THEN 1 ELSE 0 END) AS abrilComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 5 THEN 1 ELSE 0 END) AS mayoComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 6 THEN 1 ELSE 0 END) AS junioComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 7 THEN 1 ELSE 0 END) AS julioComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 8 THEN 1 ELSE 0 END) AS agostoComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 9 THEN 1 ELSE 0 END) AS septiembreComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 10 THEN 1 ELSE 0 END) AS octubreComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 11 THEN 1 ELSE 0 END) AS noviembreComites,
    SUM(CASE WHEN MONTH(ac.created_at) = 12 THEN 1 ELSE 0 END) AS diciembreComites,
    COUNT(*) AS total_Comites
FROM
    acreditacion_comites as ac
INNER JOIN
    catalogo_municipios as cm ON ac.id_catalogo_municipio_fk = cm.id_municipio
WHERE
    ac.estatus = 4
    AND ac.ejercicio = 2023
GROUP BY cm.region;


       
    SELECT
    cm.region,
    SUM(CASE WHEN MONTH(ic.created_at) = 1 THEN 1 ELSE 0 END) AS eneroContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 2 THEN 1 ELSE 0 END) AS febreroContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 3 THEN 1 ELSE 0 END) AS marzoContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 4 THEN 1 ELSE 0 END) AS abrilContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 5 THEN 1 ELSE 0 END) AS mayoContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 6 THEN 1 ELSE 0 END) AS junioContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 7 THEN 1 ELSE 0 END) AS julioContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 8 THEN 1 ELSE 0 END) AS agostoContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 9 THEN 1 ELSE 0 END) AS septiembreContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 10 THEN 1 ELSE 0 END) AS octubreContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 11 THEN 1 ELSE 0 END) AS noviembreContralores,
    SUM(CASE WHEN MONTH(ic.created_at) = 12 THEN 1 ELSE 0 END) AS diciembreContralores,
    COUNT(*) AS total_Contralores
FROM
    integrantes_comites AS ic
INNER JOIN
    acreditacion_comites AS ac ON ac.id_acreditacion = ic.id_acreditacion_comite_fk
INNER JOIN
    catalogo_municipios AS cm ON cm.id_municipio = ac.id_catalogo_municipio_fk
WHERE
    ac.estatus = 4
    AND ac.ejercicio = 2023
GROUP BY cm.region; */
   
    }
}
