<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribucion extends Model
{
    use HasFactory;

    protected $table = 'distribucion';
    protected $primaryKey = 'idDistribucion';
    protected $fillable = [
        'idZona',
        'idListaPedidos',
        'idEncargado',
        'montoAsignado',
    ];
    public $timestamps = false;
}
