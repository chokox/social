<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buzone extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_buzon';

    public function scopeBuzonTipo($query)
    {
        return $query->join('tipo_buzones', 'tipo_buzones.id_tipo_buzon', '=', 'buzones.id_catalogo_buzon_fk');
    }

}
