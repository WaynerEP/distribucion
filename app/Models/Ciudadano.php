<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudadano extends Model
{
    use HasFactory;
    protected $table = 'ciudadano';
    protected $primaryKey = 'dni';
    protected $keyType = 'string';
    protected $fillable = [
        'dni',
        'nombre',
        'aPaterno',
        'aMaterno',
        'telefono',
        'fNacimiento',
        'email',
        'direccion',
        'referencia',
        'genero',
        'seguro',
        'idNivel',
        'idDistrito',
    ];
    public $timestamps = false;
}
