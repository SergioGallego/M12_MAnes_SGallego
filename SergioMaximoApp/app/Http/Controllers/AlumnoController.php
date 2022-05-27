<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Ciclo;
use App\Models\Modulo;

use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //Pasamos a la vista todos los alumnos de todos los ciclos
        $alumnos = Alumno::all();
        $ciclos = Ciclo::all();
        return view('alumno.index', array('arrayAlumnos'=>$alumnos, 'arrayCiclos'=>$ciclos));
    }

    public function indexAlumno()
    { //Pasamos a la vista todos los alumnos
        $alumnos = Alumno::all();
        return view('alumno.index', array('arrayAlumnos'=>$alumnos));
    }

    public function show($id) //Pasamos a la vista el alumno seleccionado y todos los ciclos
    {
        $alumno = Alumno::findOrFail($id);
        $ciclos = Ciclo::all();
        return view('alumno.show', array('alumno'=>$alumno, 'arrayCiclos'=>$ciclos));
    }

    public function update(Request $request, $id) //Actualizamos el alumno seleccionado con los nuevos campos y le devolvemos a la vista
    {
        $alumno = Alumno::find($id);
        $alumno->apellidos=$request->input('apellidos');
        $alumno->nombre=$request->input('nombre');
        $alumno->ciclo=$request->input('ciclo');
        $alumno->save();
        return redirect('/menu/alumno/');
    }

    public function store(Request $request) //Insertamos un nuevo alumno con los campos introducidos.
    { 
        $alumno = new Alumno;
        $alumno->dni=$request->input('dni');
        $alumno->nombre=$request->input('name');
        $alumno->apellidos=$request->input('apellidos');
        $alumno->ciclo=$request->input('ciclo');
        $alumno->save();

        $arrayUfs = Uf::where('modulo_id', '=', )->pluck('id')->toArray(); //Guardamos las ID de todas las UFs de un módulo en una variable

        for($i=0; $i < count($arrayUfs); $i++){ //Recorremos todas las UFs apuntando al alumno
            $id = $arrayUfs[$i];
            $alumno->ufs()->attach($id);
        }

        return redirect()->back(); //Devolvemos al usuario a la vista anterior
    }
    
    public function destroy($id) //Elimina al alumno seleccionado y devuelve al usuario a la vista anterior
    {
        Alumno::destroy($id); 
        return redirect()->back();
    }
}
