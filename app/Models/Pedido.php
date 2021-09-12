<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $primaryKey = 'idPedido';
    protected $fillable = [
        'tipoDocumento',
        'nDocumento',
        'fPedido',
        'estadoPedido',
        'idCliente',
        'idEmpleado'
    ];
    public $timestamps = false;
}
