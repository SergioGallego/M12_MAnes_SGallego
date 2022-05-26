<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Models\Ufs;
use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Modulo;
use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CicloController extends Controller
{
    public function index()
    {
        $ciclos = Ciclo::all();
        return view('ciclo.index', array('arrayCiclos'=>$ciclos));
      }

    public function show($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        return view('ciclo.show', array('ciclo'=>$ciclo));
    }

    public function stats($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        $modulos = Modulo::where('ciclo', $id)->get();
        $ufs = Uf::all();
        $alumnos = Alumno::all();
        return view('ciclo.stats', array('ciclo'=>$ciclo, 'arrayAlumnos'=>$alumnos, 'arrayModulos'=>$modulos, 'arrayUfs'=>$ufs));
    }

    public function update(Request $request, $id)
    {
        $ciclo = Ciclo::find($id);
        $ciclo->nombre=$request->input('nombre');
        $ciclo->descripcion=$request->input('descripcion');
        $ciclo->updated_by=Auth::id();
        $ciclo->save();
        return redirect('/menu/ciclo/');
    }

    public function store(Request $request)
    { 
        $ciclo = new Ciclo;
        $ciclo->nombre=$request->input('nombre');
        $ciclo->descripcion=$request->input('descripcion');
        $ciclo->updated_by=Auth::id();
        $ciclo->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        Ciclo::destroy($id);
        return redirect()->back();
    }
}
