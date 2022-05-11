<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AlumnoSeeder extends Seeder
{
    private $arrayAlumnos = array (
        array(
            'apellidos' => 'Anes Gimeno',
            'nombre' => 'Maximo',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Fernandez Malé',
            'nombre' => 'Joan',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Rodriguez de la fuente',
            'nombre' => 'Ataulfo',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Gallego Gudiño',
            'nombre' => 'Daniel',
            'ciclo' => 'SMX'
        ),
    );

    private function seedAlumno(){
        DB::table('alumnos')->delete();
        foreach($this->arrayAlumnos as $alumno){
            $al = new Alumno;
            $al->apellidos = $alumno['apellidos'];
            $al->nombre = $alumno['nombre'];
            $al->ciclo = $alumno['ciclo'];
            $al->save();
        }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedAlumno();
    }
}
