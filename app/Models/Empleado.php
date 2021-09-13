<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleado';
    protected $primaryKey = 'idEmpleado';
    protected $fillable = [
        'emailCorporativo',
        'telefono',
        'dni'
    ];
    public $timestamps = false;


    public function ciudadadano()
    {
        return $this->hasOne(Ciudadano::class, 'dni', 'dniCiudadano');
    }
}
