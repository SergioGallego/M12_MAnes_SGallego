<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\AlumnoUf;
use App\Models\Modulo;
use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class AlumnoUfController extends Controller
{
    public function boletin($id)
    {
        $alumno = Alumno::findOrFail($id);
        $ufs = Uf::orderBy('nombre', 'asc')->get();
        $modulos = Modulo::orderBy('nombre', 'asc')->get();
        return view('notas.boletin', array('alumno'=>$alumno, 'arrayUFs'=>$ufs, 'arrayModulos'=>$modulos));
    }

    public function show($id)
    {
        $modulo = Modulo::findOrFail($id);
        $alumnos = Alumno::all();
        $ufs = DB::table('ufs')->where('modulo_id', $id)->get();
        return view('notas.show', array('arrayAlumnos'=>$alumnos, 'modulo'=>$modulo, 'arrayUfs'=>$ufs));
    }

    public function downloadNotas($id){
        $alumno = Alumno::findOrFail($id);
        $arrayUFs = Uf::orderBy('nombre', 'asc')->get();
        $arrayModulos = Modulo::orderBy('nombre', 'asc')->get();
        $pdf = PDF::loadView('notas.download', compact('alumno', 'arrayUFs', 'arrayModulos'));
        return $pdf->download('boletin_' . $alumno->nombre . $alumno->ciclo . '.pdf');
    }

    public function update(Request $request){
        $notas = $request->notas;
        for($i=0; $i < count($notas); $i++){
            $datos = explode("_", $notas[$i]);
            if((AlumnoUf::where(['alumno_id' => $datos[0], 'uf_id' => $datos[1]])->count() == 0)){
                $nota = new AlumnoUf;
                $nota->uf_id=$datos[1];
                $nota->alumno_id=$datos[0];
                $nota->nota=$datos[2];
                $nota->save();
            } else {
                AlumnoUf::where(['uf_id' => $datos[1], 'alumno_id' => $datos[0]])->update(['nota' => $datos[2]]);
            }
        }

        return redirect()->back();
    }

}
