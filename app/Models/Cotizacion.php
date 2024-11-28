<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizacion';
    protected $primaryKey = 'id_cotizacion';

    protected $fillable = [
        'cotizacion_nombre',
        'cotizacion_correo',
        'cotizacion_telefono',
        'cotizacion_descripcion',
    ];
}
