<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'venta';
    protected $primaryKey = 'id_venta';

    protected $fillable = [
        'venta_nombre',
        'venta_telefono',
        'venta_correo',
        'venta_direccion',
        'venta_total',
    ];
}
