<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcreditacionComite extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_acreditacion';

    //BUSCA UN MUNICIPIO BUSCANDO POR SU ID
    /* public function scopeBuscaMunicipioEjercicio($query, $id, $ejercicio)
    {
        return $query->where('id_catalogo_municipio_fk', $id)->where('ejercicio', $ejercicio);
    } */

    public function scopeBuscaEjercicio($query, $ejercicio)
    {
        return $query->where('ejercicio', $ejercicio);
    }

    public function scopeContarPorRegion($query, $ejercicio)
    {
        return $query->join('catalogo_municipios', 'acreditacion_comites.id_catalogo_municipio_fk', '=', 'catalogo_municipios.id_municipio')
        ->selectRaw('catalogo_municipios.region, COUNT(*) as total')
        ->where('acreditacion_comites.estatus', 4)->where('acreditacion_comites.ejercicio', $ejercicio)
        ->groupBy('catalogo_municipios.region');
    }

    public function scopeConteoComitesMensual ($query, $ejercicio){

        return $query->selectRaw('
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
        COUNT(*) AS total_comites
    ')
    ->from('acreditacion_comites as ac')
    ->join('catalogo_municipios as cm', 'ac.id_catalogo_municipio_fk', '=', 'cm.id_municipio')
    ->where('ac.estatus', 4)
    ->where('ac.ejercicio', $ejercicio)
    ->groupBy('cm.region');

    }

    public function scopeComitesAcreditados($query, $ejercicio, $flag = 1){
        $query->selectRaw('COUNT(*) as total')
            ->where('ejercicio', $ejercicio);

            if ($flag == 1) {
                $query->where('estatus', 4);
            } elseif ($flag == 2) {
                $query->where('estatus', '!=', 4);
            }
        
    }

    public function scopeComites ($query, $ejercicio){

        return $query->selectRaw('
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
        SUM(CASE WHEN MONTH(ac.created_at) = 12 THEN 1 ELSE 0 END) AS diciembreComites
    ')
    ->from('acreditacion_comites as ac')
    ->join('catalogo_municipios as cm', 'ac.id_catalogo_municipio_fk', '=', 'cm.id_municipio')
    ->where('ac.estatus', 4)
    ->where('ac.ejercicio', $ejercicio);

    }



}
