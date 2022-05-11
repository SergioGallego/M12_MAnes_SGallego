<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    public function index()
    {
        return view('ciclo.index');
    }

    public function show($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        return view('ciclo.show', array('id'=>$id, 'ciclo'=>$ciclo));
    }

    public function edit($id)
    {
        $ciclo = Modulo::findOrFail($id);
        return view('ciclo.edit', array('id'=>$id, 'ciclo'=>$ciclo));
    }
}
