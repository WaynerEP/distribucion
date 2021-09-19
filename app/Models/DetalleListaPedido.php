<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleListaPedido extends Model
{
    use HasFactory;

    protected $table = 'detallelistapedido';
    protected $fillable = [
        'idListaPedido',
        'idPedido',
        'idEmpaquetador',
    ];
    public $timestamps = false;
}
