<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'producto_nombre',
        'producto_descripcion',
        'producto_imagen',
        'producto_precio_unitario',
        'codigo_especie',
        'codigo_marca',
        'codigo_categoria',
    ];

}
