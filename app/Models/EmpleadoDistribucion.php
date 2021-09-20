<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoDistribucion extends Model
{
    use HasFactory;

    protected $table = 'empleadoDistribucion';
    // protected $primaryKey = 'idDistribucion';
    protected $fillable = [
        'idDistribucion',
        'idRepartidor',
    ];
    public $timestamps = false;
}
