<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentariosBuzone extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_comentario_buzon';

    public function scopeBuzonAbierto($query, $id)
    {
        return $query
            ->leftJoin('users', 'abierto_por', '=', 'users.id')
            ->where('comentarios_buzones.id_buzon_fk', $id);
    }


}
