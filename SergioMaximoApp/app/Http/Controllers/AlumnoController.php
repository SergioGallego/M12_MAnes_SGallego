<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        return view('alumno.index');
    }

    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumno.show', array('id'=>$id, 'alumno'=>$alumno));
    }

    public function edit($id)
    {
        $alumno = alumno::findOrFail($id);
        return view('alumno.edit', array('id'=>$id, 'alumno'=>$alumno));
    }
}
