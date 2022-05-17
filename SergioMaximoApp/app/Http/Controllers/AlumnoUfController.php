<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Modulo;
use App\Models\Uf;
use Illuminate\Http\Request;

class AlumnoUfController extends Controller
{
    public function boletin($id)
    {
        $alumno = Alumno::findOrFail($id);
        $ufs = Uf::orderBy('nombre', 'asc')->get();
        $modulos = Modulo::orderBy('nombre', 'asc')->get();
        return view('notas.boletin', array('alumno'=>$alumno, 'arrayUFs'=>$ufs, 'arrayModulos'=>$modulos));
    }
}
