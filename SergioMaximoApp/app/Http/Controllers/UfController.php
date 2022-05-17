<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use App\Http\Controllers\Controller;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UfController extends Controller
{
    public function index($id)
    {
        $ufs = DB::table('ufs')->where('modulo_id', $id)->get();
        return view('uf.index', array('arrayUfs'=>$ufs));
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

    public function destroy($id)
    {
        Uf::destroy($id);
        return redirect()->back();
    }
}
