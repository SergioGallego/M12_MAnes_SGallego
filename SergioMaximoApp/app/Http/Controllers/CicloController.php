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
}
