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
    public function index() //Pasa a la vista todos los modulos, ciclos y el usuario conectado
    {
        $modulo = Modulo::all();
        $ciclos = Ciclo::all();
        $users = DB::table('users')->where('role_id', 2)->get();
        return view('modulo.index', array('error'=>false, 'arrayModulos'=>$modulo, 'arrayCiclos'=>$ciclos, 'arrayProfesores'=>$users));
    }

    public function show($id) //Pasa a la vista el modulo seleccionado, todos los ciclos y el usuario conectado
    {
        $modulo = Modulo::findOrFail($id);
        $ciclos = Ciclo::all();
        $users = DB::table('users')->where('role_id', 2)->get();
        return view('modulo.show', array('error'=>false, 'modulo'=>$modulo, 'arrayCiclos'=>$ciclos, 'arrayProfesores'=>$users));
    }

    public function update(Request $request, $id) //Actualiza el modulo seleccionado a partir de los campos introducidos
    {
        $modulo = Modulo::find($id);
        $modulo->nombre=$request->input('nombre');
        $modulo->profesor=$request->input('profesor');
        $modulo->ciclo=$request->input('ciclo');
        $modulo->comentario=$request->input('comentario');
        $modulo->updated_by=Auth::id();
        try { //Comprueba si el modulo puede ser guardado
            $modulo->save();
            return view('modulo.index', array('error'=>false, 'modulo'=>$modulo, 'arrayModulos'=>Modulo::all(), 'arrayCiclos'=>Ciclo::all(), 'arrayProfesores'=>User::all()));
        } catch (QueryException $e){ //En caso de que de error (probablemente por repetir campos unicos de un modulo ya existente) nos devolverá a la vista con un mensaje de error
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return view('modulo.show', array('error'=>true, 'modulo'=>$modulo, 'arrayModulos'=>Modulo::all(), 'arrayCiclos'=>Ciclo::all(), 'arrayProfesores'=>User::all()));
            }
        }       
    }

    public function store(Request $request) //Se añade el modulo con los campos introducidos
    { 
        $modulo = new Modulo;
        $modulo->nombre=$request->input('nombre');
        $modulo->profesor=$request->input('profesor');
        $modulo->ciclo=$request->input('ciclo');
        $modulo->comentario=$request->input('comentario');
        $modulo->updated_by=Auth::id();
        try { //Comprueba si el modulo puede ser guardado
            $modulo->save();
            return view('modulo.index', array('error'=>false, 'arrayModulos'=>Modulo::all(), 'arrayCiclos'=>Ciclo::all(), 'arrayProfesores'=>User::all()));
        } catch (QueryException $e){ //En caso de que de error (probablemente por repetir campos unicos de un modulo ya existente) nos devolverá a la vista con un mensaje de error
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return view('modulo.index', array('error'=>true, 'arrayModulos'=>Modulo::all(), 'arrayCiclos'=>Ciclo::all(), 'arrayProfesores'=>User::all()));
            }
        }
    }

    public function destroy($id) //Elimina el modulo seleccionado
    {
        Modulo::destroy($id);
        return redirect()->back();
    }
}
