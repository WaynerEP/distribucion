<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMetaData extends Model
{
    use HasFactory;

    protected $table = 'usuariometadata';
    protected $primaryKey = 'idUsuarioMD';

    protected $fillable = [
        'clave',
        'valor',
        'tipo',
        'fecha',
        'idUsuario'
    ];
    public $timestamps = false;
}
