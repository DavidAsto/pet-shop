<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Especie extends Model
{
    use HasFactory;

    protected $table = 'especie';
    protected $primaryKey = 'id_especie';

    protected $fillable = [
        'especie_nombre',
    ];
}
