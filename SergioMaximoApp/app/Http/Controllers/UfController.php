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
    public function index($id)
    {
        $profesores = User::all();
        $ufs = DB::table('ufs')->where('modulo_id', $id)->get();
        $modulo = Modulo::findOrFail($id);
        return view('uf.index', array('modulo'=>$modulo, 'arrayUfs'=>$ufs, 'arrayProf'=>$profesores));
    }

    public function show($id)
    {
        $uf = Uf::findOrFail($id);
        return view('uf.show', array('id'=>$id, 'uf'=>$uf));
    }

    public function update(Request $request, $id, $idMod)
    {
        $uf = Uf::find($id);
        $uf->nombre=$request->input('nombre');
        $uf->horas=$request->input('horas');
        $uf->profesor=$request->input('profesor');
        $uf->modulo=$request->input('modulo');
        $uf->modulo_id=$request->input('modulo_id');
        $uf->updated_by=Auth::id();
        try {
            $uf->save();
            return view('uf.index', array('error'=>false, 'modulo'=>Modulo::findOrFail($idMod), 'arrayUfs'=>$ufs = DB::table('ufs')->where('modulo_id', $idMod)->get(), 'arrayProf'=>User::all()));
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return view('uf.index', array('error'=>true, 'modulo'=>Modulo::findOrFail($idMod), 'arrayUfs'=>$ufs = DB::table('ufs')->where('modulo_id', $idMod)->get(), 'arrayProf'=>User::all()));
            }
        }       
    }

    public function store(Request $request)
    { 
        $uf = new Uf;
        $uf->nombre=$request->input('nombre');
        $uf->horas=$request->input('horas');
        $uf->modulo=$request->input('modulo');
        $modulo = DB::table('modulos')->where('nombre', $uf->modulo)->get('profesor');
        $profesor = $modulo->id;
        $uf->profesor= $profesor;
        $uf->modulo_id=$request->input('modulo_id');
        $uf->updated_by=Auth::id();
        try {
            $uf->save();
            return redirect('/menu/uf/' . $uf->modulo_id);
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return view('uf.index', array('error'=>true, 'modulo'=>$uf->modulo_id, 'arrayUfs'=>$ufs = DB::table('ufs')->where('modulo_id', $uf->modulo_id)->get(), 'arrayProf'=>User::all()));
            }
        }
    }

    public function destroy($id)
    {
        $uf = Uf::findOrFail($id);
        Uf::destroy($id);
        return redirect('/menu/uf/' . $uf->modulo_id);
    }
}
