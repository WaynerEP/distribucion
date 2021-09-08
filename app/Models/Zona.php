<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $table = 'zona';
    protected $primaryKey = 'idZona';
    protected $fillable = [
        'nombre',
        'fRegistro',
        'idDistrito',
    ];
    public $timestamps = false;


    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'idDistrito')->select(array('idDistrito', 'distrito'));
    }
}
