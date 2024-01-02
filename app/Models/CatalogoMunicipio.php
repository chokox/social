<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoMunicipio extends Model
{
    use HasFactory;
    protected $table = 'catalogo_municipios';
    protected $primaryKey = 'id_municipio';
}
