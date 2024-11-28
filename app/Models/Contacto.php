<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contacto';
    protected $primaryKey = 'id_contacto';

    protected $fillable = [
        'contacto_nombre',
        'contacto_correo',
        'contacto_telefono',
        'contacto_mensaje',
    ];
}
