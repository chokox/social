<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoMunicipio extends Model
{
    use HasFactory;
    protected $table = 'catalogo_municipios';
    protected $primaryKey = 'id_municipio';


    public function scopeConAcreditacionComites($query, $year)
    {
        return $query
            ->leftJoin('acreditacion_comites', function ($join) use ($year) {
                $join->on('catalogo_municipios.id_municipio', '=', 'acreditacion_comites.id_catalogo_municipio_fk')
                ->where('acreditacion_comites.ejercicio', $year);
            });
    }


}
