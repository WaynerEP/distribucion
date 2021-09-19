<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPedidos extends Model
{
    use HasFactory;
    protected $table = 'listapedidos';
    protected $primaryKey = 'idListaPedidos';
    protected $fillable = [
        'nombre',
        'idRegistrador',
    ];
    public $timestamps = false;
}
