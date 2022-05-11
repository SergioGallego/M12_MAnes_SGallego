<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{

    public function ufs(){
        return $this->hasMany(Uf::class, 'id');
    }

    protected $fillable = [
        'nombre',
        'comentario',
        'updated_by'
    ];

    use HasFactory;
}
