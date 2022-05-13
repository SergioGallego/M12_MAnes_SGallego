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
        return $this->belongsTo(User::class, 'id');
    }

    protected $fillable = [
        'nombre',
        'comentario',
        'ciclo',
        'updated_by'
    ];

    use HasFactory;
}
