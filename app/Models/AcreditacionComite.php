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



}
