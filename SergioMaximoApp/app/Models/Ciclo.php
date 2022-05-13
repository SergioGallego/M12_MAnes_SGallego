<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{

    public function modulo(){
        return $this->hasMany(Modulo::class, 'modulo');
    }

    protected $fillable = [
        'nombre',
        'descripcio',
        'updated_by'
    ];

    use HasFactory;

    
}
