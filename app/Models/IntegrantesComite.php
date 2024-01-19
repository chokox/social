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

        return $query->selectRaw('
            cm.region, 
            COUNT(DISTINCT ic.id_integrante_comite) as totalIntegrantes, 
            COUNT(DISTINCT CASE WHEN ic.sexo = "Mujer" THEN ic.id_integrante_comite END) as total_mujeres, 
            COUNT(DISTINCT CASE WHEN ic.sexo = "Hombre" THEN ic.id_integrante_comite END) as total_hombres,
            COUNT(DISTINCT CASE WHEN ic.lengua_indigena != "NINGUNO" THEN ic.id_integrante_comite END) as total_hablan_lengua_indigena,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Mujer" AND NOT EXISTS(SELECT 1 FROM integrantes_comites AS sub_ic WHERE sub_ic.id_acreditacion_comite_fk = ac.id_acreditacion AND sub_ic.sexo = "Hombre") THEN ac.id_acreditacion END) AS municipios_solo_mujeres,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Hombre" AND NOT EXISTS(SELECT 1 FROM integrantes_comites AS sub_ic WHERE sub_ic.id_acreditacion_comite_fk = ac.id_acreditacion AND sub_ic.sexo = "Mujer") THEN ac.id_acreditacion END) AS municipios_solo_hombres,
            COUNT(DISTINCT CASE WHEN ic.sexo = "Mujer" AND (NOT EXISTS(SELECT 1 FROM integrantes_comites AS sub_ic WHERE sub_ic.id_acreditacion_comite_fk = ac.id_acreditacion AND sub_ic.sexo = "Hombre") OR EXISTS(SELECT 1 FROM integrantes_comites AS sub_ic WHERE sub_ic.id_acreditacion_comite_fk = ac.id_acreditacion AND sub_ic.sexo = "Mujer")) THEN ac.id_acreditacion END) AS municipios_al_menos_una_mujer
        ')
        ->join('acreditacion_comites as ac', 'ac.id_acreditacion', '=', 'id_acreditacion_comite_fk')
        ->join('catalogo_municipios as cm', 'cm.id_municipio', '=', 'ac.id_catalogo_municipio_fk')
        ->join('integrantes_comites as ic', 'ac.id_acreditacion', '=', 'ic.id_acreditacion_comite_fk')
        ->where('ac.estatus', 4)
        ->where('ac.ejercicio', $ejercicio)
        ->groupBy('cm.region');

    }

    

    public function scopeConteoContraloresMensual ($query, $ejercicio){
        
        return $query->selectRaw('
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
        COUNT(*) AS total_contralores
    ')
    ->from('integrantes_comites AS ic')
    ->join('acreditacion_comites as ac', 'ac.id_acreditacion', '=', 'ic.id_acreditacion_comite_fk')
    ->join('catalogo_municipios as cm', 'cm.id_municipio', '=', 'ac.id_catalogo_municipio_fk')
    ->where('ac.estatus', 4)
    ->where('ac.ejercicio', $ejercicio)
    ->groupBy('cm.region');

    }

     public function scopeIntegrantesTotal ($query, $ejercicio){
        
        return $query->selectRaw('COUNT(DISTINCT ic.id_integrante_comite) as totalIntegrantes')
        ->from('acreditacion_comites as ac')
        ->join('integrantes_comites as ic', 'ac.id_acreditacion', '=', 'ic.id_acreditacion_comite_fk')
        ->where('ac.ejercicio', $ejercicio);

    }

    public function scopeContralores($query, $ejercicio){
        
        return $query->selectRaw('
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
        SUM(CASE WHEN MONTH(ic.created_at) = 12 THEN 1 ELSE 0 END) AS diciembreContralores
    ')
    ->from('integrantes_comites AS ic')
    ->join('acreditacion_comites as ac', 'ac.id_acreditacion', '=', 'ic.id_acreditacion_comite_fk')
    ->join('catalogo_municipios as cm', 'cm.id_municipio', '=', 'ac.id_catalogo_municipio_fk')
    ->where('ac.estatus', 4)
    ->where('ac.ejercicio', $ejercicio);

    }

    public function scopeModalIntegrantes($query, $ejercicio, $flag){
        
        return $query->selectRaw('
        cm.region,
        cm.distrito,
        cm.nombre,
        ic.nombre_completo,
        ic.telefono,
        ic.celular,
        ic.sexo,
        ic.lengua_indigena,
        ic.correo,
        ac.datos_municipio
    ')
    ->from('integrantes_comites AS ic')
    ->join('acreditacion_comites as ac', 'ac.id_acreditacion', '=', 'ic.id_acreditacion_comite_fk')
    ->join('catalogo_municipios as cm', 'cm.id_municipio', '=', 'ac.id_catalogo_municipio_fk')
    ->where('ac.estatus', 4)
    ->where('ac.ejercicio', $ejercicio);
        if ($flag == 1) {
            $query->where('cm.region', 'COSTA');
        } elseif ($flag == 2) {
            $query->where('cm.region', 'CUENCA DEL PAPALOAPAN');
        } elseif ($flag == 3) {
            $query->where('cm.region', 'ISTMO');
        } elseif ($flag == 4) {
            $query->where('cm.region', 'MIXTECA');
        } elseif ($flag == 5) {
            $query->where('cm.region', 'SIERRA DE FLORES MAGÓ');
        } elseif ($flag == 6) {
            $query->where('cm.region', 'SIERRA DE JUÁREZ');
        } elseif ($flag == 7) {
            $query->where('cm.region', 'SIERRA SUR');
        } elseif ($flag == 8) {
            $query->where('cm.region', 'VALLES CENTRALES');
        } 

        return $query;
        

    }


}
