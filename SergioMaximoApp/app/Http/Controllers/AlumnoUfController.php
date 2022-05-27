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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AlumnoUfController extends Controller
{
    public function boletin($id) //Pasa a la vista el alumno seleccionado junto a todas las UFs y modulo ordenados ascendientemente
    {
        $alumno = Alumno::findOrFail($id);
        $ufs = Uf::orderBy('nombre', 'asc')->get();
        $modulos = Modulo::orderBy('nombre', 'asc')->get();
        return view('notas.boletin', array('alumno'=>$alumno, 'arrayUFs'=>$ufs, 'arrayModulos'=>$modulos));
    }

    public function show($id) //Pasa a la vista el modulo seleccionado junto a todos los alumnos y las UFs de dicho módulo
    {
        $modulo = Modulo::findOrFail($id);
        $alumnos = Alumno::all();
        $ufs = DB::table('ufs')->where('modulo_id', $id)->get();
        return view('notas.show', array('arrayAlumnos'=>$alumnos, 'modulo'=>$modulo, 'arrayUfs'=>$ufs));
    }

    public function downloadNotas($id){ //Pasa a la vista el alumno seleccionado junto a todas las UFs y modulos ordenados ascendientemente y descarga dicha vista como pdf
        $alumno = Alumno::findOrFail($id);
        $arrayUFs = Uf::orderBy('nombre', 'asc')->get();
        $arrayModulos = Modulo::orderBy('nombre', 'asc')->get();
        $pdf = PDF::loadView('notas.download', compact('alumno', 'arrayUFs', 'arrayModulos'));
        return $pdf->download('boletin_' . $alumno->nombre . $alumno->ciclo . '.pdf');
    }

    public function sendNotas($id){ 

        $data["email"] = Auth::user()->email;
        $data["client_name"] = Auth::user()->name;
        $data["subject"] = "Boletín de notas"; //Crea una array con los datos del correo electrónico a enviar
      
        $alumno = Alumno::findOrFail($id); //Guarda el alunmno seleccionada junto a las UFs y Modulos ordenados ascendientemente
        $arrayUFs = Uf::orderBy('nombre', 'asc')->get();
        $arrayModulos = Modulo::orderBy('nombre', 'asc')->get();
        $pdf = PDF::loadView('notas.download', compact('alumno', 'arrayUFs', 'arrayModulos'));  //Carga una vista como PDF

        try{ //Intenta enviar las notas a la dirección de correo electrónico con un asunto y el boletín de notas
            Mail::send('notas.mail', $data, function($message)use($data,$pdf) { 
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), 'boletin.pdf');
            });
        }catch(JWTException $exception){ //En caso de no conseguirlo devolverá una excepcion
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }

        return redirect()->back(); //Nos devuelve a la vista anterior
    }

    public function update(Request $request){ //Actualiza las notas
        $notas = $request->notas; //Guarda las notas en una variable array
        for($i=0; $i < count($notas); $i++){ //Recorre la variable
            $datos = explode("_", $notas[$i]); //Divide cada itineracion en tres partes con explode, que corresponden a la id del alumno [0], la id de la UF [1] y la nota [2]
            if((AlumnoUf::where(['alumno_id' => $datos[0], 'uf_id' => $datos[1]])->count() == 0)){ //Comprueba si el alumno existe en la relación alumnoUF
                $nota = new AlumnoUf; //En caso de no existir crea una nueva relacion introduciendo la id de la UF, la id del alumno y la nota
                $nota->uf_id=$datos[1];
                $nota->alumno_id=$datos[0];
                $nota->nota=$datos[2];
                $nota->save();
            } else { //En caso de existir actualiza la nota a partir de los otros dos campos que hemos conseguido con explode
                AlumnoUf::where(['uf_id' => $datos[1], 'alumno_id' => $datos[0]])->update(['nota' => $datos[2]]);
            }
        }

        return redirect()->back(); //Devuelve al usuario a la vista anterior
    }

}
