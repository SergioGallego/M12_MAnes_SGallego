<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function indexProfesores()
    {
        $usuarios = User::all();
        return view('profesor.index', array('arrayUsuarios'=>$usuarios));
    }

    public function show($id)
    {
        $profesor = User::findOrFail($id);
        return view('profesor.show', array('profesor'=>$profesor));
    }
 
    public function edit($id)
    {
        $profesor = User::findOrFail($id);
        return view('profesor.edit', array('profesor'=>$profesor));
    }

    public function store(Request $request)
    {
        $profesor = new User;
        $profesor->name=$request->input('name');
        $profesor->email=$request->input('email');
        $profesor->estado=$request->input('estado');
        $profesor->password=Hash::make($request->input('password'));
        $profesor->role_id=$request->input('role_id');
        $profesor->save();
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
}
