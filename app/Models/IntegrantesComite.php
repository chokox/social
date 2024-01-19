<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class IntegrantesComite extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_integrante_comite';

    public function scopeContarPorIntegrantes($query, $ejercicio)
    {
        return $query
            ->selectRaw(
                '
            cm.region,
            COUNT(DISTINCT ic.id_integrante_comite) as totalIntegrantes,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Mujer" THEN ic.id_integrante_comite END) as total_mujeres,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Hombre" THEN ic.id_integrante_comite END) as total_hombres,
            COUNT(DISTINCT CASE WHEN ic.lengua_indigena != "NINGUNO" THEN ic.id_integrante_comite END) as total_hablan_lengua_indigena,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Mujer" AND NOT EXISTS(SELECT 1 FROM integrantes_comites AS sub_ic WHERE sub_ic.id_acreditacion_comite_fk = ac.id_acreditacion AND sub_ic.sexo = "Hombre") THEN ac.id_acreditacion END) AS municipios_solo_mujeres,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Hombre" AND NOT EXISTS(SELECT 1 FROM integrantes_comites AS sub_ic WHERE sub_ic.id_acreditacion_comite_fk = ac.id_acreditacion AND sub_ic.sexo = "Mujer") THEN ac.id_acreditacion END) AS municipios_solo_hombres,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Mujer" AND (NOT EXISTS(SELECT 1 FROM integrantes_comites AS sub_ic WHERE sub_ic.id_acreditacion_comite_fk = ac.id_acreditacion AND sub_ic.sexo = "Hombre") OR EXISTS(SELECT 1 FROM integrantes_comites AS sub_ic WHERE sub_ic.id_acreditacion_comite_fk = ac.id_acreditacion AND sub_ic.sexo = "Mujer")) THEN ac.id_acreditacion END) AS municipios_al_menos_una_mujer
        ',
            )
            ->join('acreditacion_comites as ac', 'ac.id_acreditacion', '=', 'id_acreditacion_comite_fk')
            ->join('catalogo_municipios as cm', 'cm.id_municipio', '=', 'ac.id_catalogo_municipio_fk')
            ->join('integrantes_comites as ic', 'ac.id_acreditacion', '=', 'ic.id_acreditacion_comite_fk')
            ->where('ac.estatus', 4)
            ->where('ac.ejercicio', $ejercicio)
            ->groupBy('cm.region');
    }

    public function scopeContarPorComite($query, $ejercicio, $id)
    {
        return $query
            ->join('acreditacion_comites', 'acreditacion_comites.id_acreditacion', '=', 'integrantes_comites.id_acreditacion_comite_fk')
            ->where('acreditacion_comites.ejercicio', $ejercicio)
            ->where('acreditacion_comites.id_acreditacion', $id);
    }

    public function scopeIntegranteComiteMunicipio($query, $id)
    {
        return $query
            ->join('acreditacion_comites', 'acreditacion_comites.id_acreditacion', '=', 'integrantes_comites.id_acreditacion_comite_fk')
            ->join('catalogo_municipios', 'catalogo_municipios.id_municipio', '=', 'acreditacion_comites.id_catalogo_municipio_fk')
            ->where('integrantes_comites.id_integrante_comite', $id);
    }
}
