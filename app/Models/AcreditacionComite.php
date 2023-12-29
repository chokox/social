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
        return $query->where('id_catalogo_municipio_fk', $id)->where('ejercicio', $ejercicio);
    }

    public function scopeBuscaEjercicio($query, $ejercicio)
    {
        return $query->where('ejercicio', $ejercicio);
    }
}
