<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ciclo extends Model
{

    public function modulos(){
        return $this->hasMany(Modulo::class, 'id');
    }

    protected $fillable = [
        'nombre',
        'descripcio',
        'updated_by'
    ];
    use HasFactory;
}
