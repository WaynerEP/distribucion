<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    protected $table = 'detallePedido';
    protected $primaryKey = 'idDetallePedido';
    protected $fillable = [
        'cantidadPedida',
        'idPedido',
        'idProducto',
        'descuento'
    ];
    public $timestamps = false;
}
