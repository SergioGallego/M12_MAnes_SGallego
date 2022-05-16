<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{

    public function ufs(){
        return $this->hasMany(Uf::class, 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'profesor');
    }

    public function ciclos(){
        return $this->belongsTo(Ciclo::class, 'ciclo');
    }

    protected $fillable = [
        'nombre',
        'comentario',
        'profesor',
        'ciclo',
        'updated_by'
    ];

    use HasFactory;
}
