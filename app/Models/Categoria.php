<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoriaProducto';
    protected $primaryKey = 'idCategoriaProducto';
    protected $fillable = [
        'nombre',
    ];
    public $timestamps = false;
}
