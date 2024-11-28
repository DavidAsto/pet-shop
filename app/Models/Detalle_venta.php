<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detalle_venta extends Model
{

    use HasFactory;

    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_detalle_venta';

    protected $fillable = [
        'codigo_venta',
        'codigo_producto',
        'detalle_cantidad',
        'detalle_subtotal',
    ];
}
