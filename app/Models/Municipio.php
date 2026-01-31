<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipio';

    protected $fillable = [
        'name',
        'cod_departamento',
    ];

    //relación inversa muchos a uno con departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'cod_departamento');
    }
}
