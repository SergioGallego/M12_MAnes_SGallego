<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Http\Controllers\Controller;
use App\Models\Ciclo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModuloController extends Controller
{
    public function index()
    {
        $modulo = Modulo::all();
        $ciclos = Ciclo::all();
        $users = DB::table('users')->where('role_id', 2)->get();
        return view('modulo.index', array('arrayModulos'=>$modulo, 'arrayCiclos'=>$ciclos, 'arrayProfesores'=>$users));
    }

    public function show($id)
    {
        $modulo = Modulo::findOrFail($id);
        $ciclos = Ciclo::all();
        $users = DB::table('users')->where('role_id', 2)->get();
        return view('modulo.show', array('modulo'=>$modulo,  'arrayCiclos'=>$ciclos, 'arrayProfesores'=>$users));
    }

    public function update(Request $request, $id)
    {
        $modulo = Modulo::find($id);
        $modulo->nombre=$request->input('nombre');
        $modulo->profesor=$request->input('profesor');
        $modulo->ciclo=$request->input('ciclo');
        $modulo->comentario=$request->input('comentario');
        $modulo->updated_by=Auth::id();
        $modulo->save();
        return redirect('/menu/modulo/');
    }

    public function store(Request $request)
    { 
        $modulo = new Modulo;
        $modulo->nombre=$request->input('nombre');
        $modulo->profesor=$request->input('profesor');
        $modulo->ciclo=$request->input('ciclo');
        $modulo->comentario=$request->input('comentario');
        $modulo->updated_by=Auth::id();
        $modulo->save();
        return redirect()->back();
    }
}
