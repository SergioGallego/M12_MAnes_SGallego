<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index()
    {
        return view('modulo.index');
    }
    
    public function show($id)
    {
        $modulo = Modulo::findOrFail($id);
        return view('modulo.show', array('id'=>$id, 'modulo'=>$modulo));
    }

    public function edit($id)
    {
        $modulo = Modulo::findOrFail($id);
        return view('modulo.edit', array('id'=>$id, 'modulo'=>$modulo));
    }
}
