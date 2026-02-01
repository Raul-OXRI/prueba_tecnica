<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';

    protected $fillable = [
        'name',
    ];

    //relación uno a muchos con municipio
    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'cod_departamento');
    }
}
