<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Ciclo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = Ciclo::all();
        $alumnos = Alumno::all();
        return view('alumno.index', array('arrayAlumnos'=>$alumnos, 'arrayCiclos'=>$ciclos));
    }

    public function indexAlumno()
    {
        $ciclos = Ciclo::all();
        $alumnos = Alumno::all();
        return view('alumno.index', array('arrayAlumnos'=>$alumnos, 'arrayCiclos'=>$ciclos));
    }

    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumno.show', array('id'=>$id, 'alumno'=>$alumno));
    }

    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumno.edit', array('id'=>$id, 'alumno'=>$alumno));
    }

    public function store(Request $request)
    { 
        $alumno = new Alumno;
        $alumno->name=$request->input('name');
        $alumno->save();
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        Alumno::destroy($id);
        return redirect()->back();
    }
}
