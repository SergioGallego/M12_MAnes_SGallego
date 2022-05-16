<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoUfController extends Controller
{
    public function boletin($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('notas.boletin', array('alumno'=>$alumno));
    }
}
