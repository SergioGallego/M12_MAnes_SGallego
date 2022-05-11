<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use App\Http\Controllers\Controller;
use App\Models\Modulo;
use Illuminate\Http\Request;

class UfController extends Controller
{
    public function index()
    {
        return view('uf.index');
    }

    public function show($id)
    {
        $uf = Uf::findOrFail($id);
        return view('uf.show', array('id'=>$id, 'uf'=>$uf));
    }

    public function edit($id)
    {
        $uf = Modulo::findOrFail($id);
        return view('uf.edit', array('id'=>$id, 'uf'=>$uf));
    }
}