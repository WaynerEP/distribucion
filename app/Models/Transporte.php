<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    protected $table = 'transporte';
    protected $primaryKey = 'idTransporte';
    protected $fillable = [
        'matricula',
        'capacidad',
        'fAdquisicion',
        'fVehiculo',
        'altura',
        'ancho',
        'capcidadCombustible',
        'estado',
        'fBaja'
    ];
    public $timestamps = false;
}
