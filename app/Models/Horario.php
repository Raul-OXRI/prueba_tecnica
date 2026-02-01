<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';

    protected $fillable = [
        'dia',
        'hora_apertura',
        'hora_cierre',
        'status',
        'cod_agencia',
    ];

    public function agencia()
    {
        return $this->belongsTo(Agencia::class, 'cod_agencia');
    }
}
