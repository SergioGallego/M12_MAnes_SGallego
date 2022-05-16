<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index()
    {
        $modulo = Modulo::all();
        return view('modulo.index', array('arrayModulo'=>$modulo));
      }

    public function show($id)
    {
        $modulo = Modulo::findOrFail($id);
        return view('modulo.show', array('modulo'=>$modulo));
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
