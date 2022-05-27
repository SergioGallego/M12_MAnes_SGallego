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
    public function index() //Pasa a la vista todos los ciclos
    {
        $ciclos = Ciclo::all();
        return view('ciclo.index', array('arrayCiclos'=>$ciclos));
      }

    public function show($id) //Pasa a la vista el ciclo selccionado
    {
        $ciclo = Ciclo::findOrFail($id);
        return view('ciclo.show', array('ciclo'=>$ciclo));
    }

    public function stats($id) //Pasa a la vista el ciclo seleccionado junto a sus modulos, todas las UFs y todos los alumnos
    {
        $ciclo = Ciclo::findOrFail($id);
        $modulos = Modulo::where('ciclo', $id)->get();
        $ufs = Uf::all();
        $alumnos = Alumno::all();
        return view('ciclo.stats', array('ciclo'=>$ciclo, 'arrayAlumnos'=>$alumnos, 'arrayModulos'=>$modulos, 'arrayUfs'=>$ufs));
    }

    public function update(Request $request, $id) //Actualiza el ciclo seleccionado con los campos introducidos
    {
        $ciclo = Ciclo::find($id);
        $ciclo->nombre=$request->input('nombre');
        $ciclo->descripcion=$request->input('descripcion');
        $ciclo->updated_by=Auth::id();
        $ciclo->save();
        return redirect('/menu/ciclo/');
    }

    public function store(Request $request) //Registra el nuevo ciclo a partir de los campos introducidos
    {  
        $ciclo = new Ciclo;
        $ciclo->nombre=$request->input('nombre');
        $ciclo->descripcion=$request->input('descripcion');
        $ciclo->updated_by=Auth::id();
        $ciclo->save();
        return redirect()->back();
    }

    public function destroy($id) //Destruye el ciclo seleccionado
    {
        Ciclo::destroy($id);
        return redirect()->back();
    }
}
