<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('ciclo.stats', array('ciclo'=>$ciclo));
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
}
