<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marca';
    protected $primaryKey = 'id_marca';

    protected $fillable = [
        'marca_nombre',
    ];
}