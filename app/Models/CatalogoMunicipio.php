<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoMunicipio extends Model
{
    use HasFactory;
    protected $table = 'catalogo_municipios';
    protected $primaryKey = 'id_municipio';


    protected $fillable = ['folio', 'nombre', 'region', 'distrito'];

    protected static function boot()
    {
        parent::boot();

        //agrega automaticamente a mayusculas en la tabla
        static::saving(function ($model) {
            $model->folio = strtoupper($model->folio);
            $model->nombre = strtoupper($model->nombre);
            $model->region = strtoupper($model->region);
            $model->distrito = strtoupper($model->distrito);
        });
    }


    public function scopeConAcreditacionComites($query, $year)
    {
        return $query
        ->leftJoin('acreditacion_comites', function ($join) use ($year) {
            $join->on('catalogo_municipios.id_municipio', '=', 'acreditacion_comites.id_catalogo_municipio_fk')
            ->where('acreditacion_comites.ejercicio', $year);
        })
        ->leftJoin('users', 'acreditacion_comites.id_user_atendio_fk', '=', 'users.id');

    }

    public function scopeMunicipioYAcreditacion($query, $id)
    {
        return $query
            ->Join('acreditacion_comites', 'acreditacion_comites.id_catalogo_municipio_fk', '=', 'id_municipio')
            ->where('acreditacion_comites.id_acreditacion', $id);
    }


}
