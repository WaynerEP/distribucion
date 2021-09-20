<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaDistribucion extends Model
{
    use HasFactory;

    protected $table = 'entregadistribucion';
    protected $primaryKey = 'idPedido';
    protected $fillable = [
        'idDistribucion',
        'idPedido',
        'idRepartidor',
        'monto',
        'nota',
        'image',
    ];
    public $timestamps = false;
}
