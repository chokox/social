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
        return $query->join('catalogo_dependencias', 'catalogo_dependencias.id_catalogo_dependencias', '=', 'buzones.id_catalogo_buzon_fk');
    }

    public function scopeContarPorRegion($query)
    {
        return $query->select('region', \DB::raw('count(*) as total'))
        ->groupBy('region');
    }

    public function scopeBuzonDependencia($query,$id)
    {
        return $query->join('catalogo_dependencias', 'catalogo_dependencias.id_catalogo_dependencias', '=', 'buzones.id_catalogo_buzon_fk')
        ->where('buzones.id_buzon', $id);

    }

    

}
