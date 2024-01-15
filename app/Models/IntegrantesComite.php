<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegrantesComite extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_integrante_comite';

    /* public function scopeContarPorIntegrantes($query, $ejercicio)
    {
        return $query->selectRaw('cm.region, COUNT(*) as total')
        ->join('acreditacion_comites as ac', 'ac.id_acreditacion', '=', 'id_acreditacion_comite_fk')
        ->join('catalogo_municipios as cm', 'cm.id_municipio', '=', 'ac.id_catalogo_municipio_fk')
        ->where('ac.estatus', 4)
        ->where('ac.ejercicio', $ejercicio)
        ->groupBy('cm.region');

        return $query->selectRaw('cm.region, COUNT(DISTINCT ic.id_integrante_comite) as total, COUNT(DISTINCT CASE WHEN ic.sexo = "MUJER" THEN ic.id_integrante_comite END) as total_mujeres, COUNT(DISTINCT CASE WHEN ic.sexo = "HOMBRE" THEN ic.id_integrante_comite END) as total_hombres')
        ->join('acreditacion_comites as ac', 'ac.id_acreditacion', '=', 'id_acreditacion_comite_fk')
        ->join('catalogo_municipios as cm', 'cm.id_municipio', '=', 'ac.id_catalogo_municipio_fk')
        ->join('integrantes_comites as ic', 'ac.id_acreditacion', '=', 'ic.id_acreditacion_comite_fk')
        ->where('ac.estatus', 4)
        ->where('ac.ejercicio', $ejercicio)
            ->groupBy('cm.region');
    } */

    public function scopeContarPorIntegrantes($query, $ejercicio)
    {
        return $query->selectRaw('
            cm.region, 
            COUNT(DISTINCT ic.id_integrante_comite) as total, 
            COUNT(DISTINCT CASE WHEN ic.sexo = "Mujer" THEN ic.id_integrante_comite END) as total_mujeres, 
            COUNT(DISTINCT CASE WHEN ic.sexo = "Hombre" THEN ic.id_integrante_comite END) as total_hombres,
            COUNT(DISTINCT CASE WHEN ic.lengua_indigena != "NINGUNO" THEN ic.id_integrante_comite END) as total_hablan_lengua_indigena,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Mujer" AND NOT EXISTS (SELECT 1 FROM integrantes_comites WHERE id_acreditacion_comite_fk = ac.id_acreditacion AND sexo = "Hombre") THEN ac.id_acreditacion END) as municipios_solo_mujeres,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Hombre" AND NOT EXISTS (SELECT 1 FROM integrantes_comites WHERE id_acreditacion_comite_fk = ac.id_acreditacion AND sexo = "Mujer") THEN ac.id_acreditacion END) as municipios_solo_hombres,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Mujer" AND EXISTS (SELECT 1 FROM integrantes_comites WHERE id_acreditacion_comite_fk = ac.id_acreditacion AND sexo = "Hombre") THEN ac.id_acreditacion END) as municipios_al_menos_una_mujer
        ')
        ->join('acreditacion_comites as ac', 'ac.id_acreditacion', '=', 'id_acreditacion_comite_fk')
        ->join('catalogo_municipios as cm', 'cm.id_municipio', '=', 'ac.id_catalogo_municipio_fk')
        ->join('integrantes_comites as ic', 'ac.id_acreditacion', '=', 'ic.id_acreditacion_comite_fk')
        ->where('ac.estatus', 4)
        ->where('ac.ejercicio', $ejercicio)
        ->groupBy('cm.region');
    }
}
