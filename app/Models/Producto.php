<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey = 'idProducto';
    protected $fillable = [
        'codigo',
        'nombre',
        'cantidad',
        'precio',
        'idAlmacen',
        'idCategoriaProducto',  
    ];
    public $timestamps = false;
}
