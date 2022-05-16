<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Http\Controllers\Controller;
use App\Models\Ciclo;
use App\Models\User;
use Illuminate\Database\QueryException;
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
        return view('modulo.index', array('error'=>false, 'arrayModulos'=>$modulo, 'arrayCiclos'=>$ciclos, 'arrayProfesores'=>$users));
    }

    public function show($id)
    {
        $modulo = Modulo::findOrFail($id);
        $ciclos = Ciclo::all();
        $users = DB::table('users')->where('role_id', 2)->get();
        return view('modulo.show', array('error'=>false, 'modulo'=>$modulo, 'arrayCiclos'=>$ciclos, 'arrayProfesores'=>$users));
    }

    public function update(Request $request, $id)
    {
        $modulo = Modulo::find($id);
        $modulo->nombre=$request->input('nombre');
        $modulo->profesor=$request->input('profesor');
        $modulo->ciclo=$request->input('ciclo');
        $modulo->comentario=$request->input('comentario');
        $modulo->updated_by=Auth::id();
        try {
            $modulo->save();
            return view('modulo.index', array('error'=>false, 'modulo'=>$modulo, 'arrayModulos'=>Modulo::all(), 'arrayCiclos'=>Ciclo::all(), 'arrayProfesores'=>User::all()));
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return view('modulo.show', array('error'=>true, 'modulo'=>$modulo, 'arrayModulos'=>Modulo::all(), 'arrayCiclos'=>Ciclo::all(), 'arrayProfesores'=>User::all()));
            }
        }       
    }

    public function store(Request $request)
    { 
        $modulo = new Modulo;
        $modulo->nombre=$request->input('nombre');
        $modulo->profesor=$request->input('profesor');
        $modulo->ciclo=$request->input('ciclo');
        $modulo->comentario=$request->input('comentario');
        $modulo->updated_by=Auth::id();
        try {
            $modulo->save();
            return view('modulo.index', array('error'=>false, 'arrayModulos'=>Modulo::all(), 'arrayCiclos'=>Ciclo::all(), 'arrayProfesores'=>User::all()));
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return view('modulo.index', array('error'=>true, 'arrayModulos'=>Modulo::all(), 'arrayCiclos'=>Ciclo::all(), 'arrayProfesores'=>User::all()));
            }
        }
    }

    public function destroy($id)
    {
        Modulo::destroy($id);
        return redirect()->back();
    }
}
