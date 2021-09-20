<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistribucionTransporte extends Model
{
    use HasFactory;

    protected $table = 'distribuciontransporte';
    // protected $primaryKey = 'idDistribucion';
    protected $fillable = [
        'idTransporte',
        'idConductor',
        'idDistribucion',
        'montoCombustible',
    ];
    public $timestamps = false;
}
