<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{

    public function modulos(){
        return $this->belongsTo(Modulo::class, 'modulo_id');
    }

    public function ufs(){
        return $this->belongsToMany(Alumno::class, 'alumno_ufs')->withPivot('nota');
    }

    protected $fillable = [
        'nombre',
        'modulo',
        'horas',
        'modulo_id',
        'updated_by'
    ];

    use HasFactory;
}
