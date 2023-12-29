<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcreditacionComite extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_acreditacion';

    //BUSCA UN MUNICIPIO BUSCANDO POR SU ID
    public function scopeBuscaMunicipioEjercicio($query, $id, $ejercicio)
    {
        return $query->where('id_municipio', $id)->where('ejercicio', $ejercicio);
    }
}
