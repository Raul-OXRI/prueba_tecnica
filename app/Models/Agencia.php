<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    protected $table = 'agencia';

    protected $fillable = [
        'name',
        'serie_agencia',
        'codigo_agencia',
        'address',
        'phone',
        'status',
        'img',
        'longitud',
        'latitud',
        'cod_municipio',
    ];

    //relación inversa muchos a uno con municipio
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'cod_municipio');
    }

    //relación uno a muchos con horario
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'cod_agencia');
    }

    //relación uno a muchos con usuario
    public function usuarios()
    {
        return $this->hasMany(User::class, 'cod_agencia');
    }
}
