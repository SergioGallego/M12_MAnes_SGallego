<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use App\Http\Controllers\Controller;
use App\Models\Modulo;
use Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UfController extends Controller
{
    public function index($id) //Pasa a la vista todos los usuarios, las Ufs del modulo seleccionado y el mismo módulo
    {
        $profesores = User::all();
        $ufs = DB::table('ufs')->where('modulo_id', $id)->get();
        $modulo = Modulo::findOrFail($id);
        return view('uf.index', array('modulo'=>$modulo, 'arrayUfs'=>$ufs, 'arrayProf'=>$profesores));
    }

    public function show($id) //Pasa a la vista la Uf seleccionada
    {
        $uf = Uf::findOrFail($id);
        return view('uf.show', array('uf'=>$uf));
    }

    public function update(Request $request, $id) //Actualiza la UF con los campos introducidos
    {
        $uf = Uf::find($id);
        $uf->nombre=$request->input('nombre');
        $uf->horas=$request->input('horas');
        $uf->modulo=$request->input('modulo');
        $uf->modulo_id=$request->input('modulo_id');
        $uf->updated_by=Auth::id();
        try { //Comprueba si la UF puede ser guardada
            $uf->save();
            return redirect('/menu/uf/' . $uf->modulo_id);
        } catch (QueryException $e){ //En caso de que de error (probablemente por repetir campos unicos de una UF ya existente) nos devolverá a la vista con un mensaje de error
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect('/menu/uf/' . $uf->modulo_id);
            }
        }  
    }

    public function store(Request $request) //Añade una UF con los campos introducidos
    { 
        $uf = new Uf;
        $uf->nombre=$request->input('nombre');
        $uf->horas=$request->input('horas');
        $uf->modulo=$request->input('modulo');
        $uf->modulo_id=$request->input('modulo_id');
        $uf->updated_by=Auth::id();
        try { //Comprueba si la UF puede ser guardada
            $uf->save();
            return redirect('/menu/uf/' . $uf->modulo_id);
        } catch (QueryException $e){  //En caso de que de error (probablemente por repetir campos unicos de una UF ya existente) nos devolverá a la vista con un mensaje de error
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect('/menu/uf/' . $uf->modulo_id);
            }
        }
    }

    public function destroy($id) //Elimina la UF seleccionada
    {
        $uf = Uf::findOrFail($id);
        Uf::destroy($id);
        return redirect('/menu/uf/' . $uf->modulo_id);
    }
}
