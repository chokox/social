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

    public function scopeContarComentariosPorDependencia($query)
    {
        return $query
            ->rightJoin('buzones', 'comentarios_buzones.id_buzon_fk', '=', 'buzones.id_buzon')
            ->rightJoin('tipo_buzones', 'buzones.id_catalogo_buzon_fk', '=', 'tipo_buzones.id_tipo_buzon')
            ->select('tipo_buzones.id_tipo_buzon', 'tipo_buzones.nombre_dependecia_programa', 'tipo_buzones.tipo')
            ->selectRaw('COUNT(DISTINCT comentarios_buzones.id_comentario_buzon) as total_comentarios')
            ->selectRaw('COUNT(DISTINCT buzones.numero_buzon) as total_buzones')
            ->groupBy('tipo_buzones.nombre_dependecia_programa', 'tipo_buzones.tipo', 'tipo_buzones.id_tipo_buzon');
    }

    public function scopeContarPorTipoComentario($query)
    {
        return $query->select('tipo_comentario', \DB::raw('count(*) as total'))
        ->groupBy('tipo_comentario');
    }
}
