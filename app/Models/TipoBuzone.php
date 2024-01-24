<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBuzone extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo_buzon';

    public function scopeTipoBuzon($query, $tipo)
    {
        return $query->where('tipo', $tipo);
    }
}
