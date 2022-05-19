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
            'apellidos' => 'Albero Soteras',
            'nombre' => 'Jose',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Alcaraz',
            'nombre' => 'Silvia',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Perez',
            'nombre' => 'Joel',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Utset',
            'nombre' => 'Joan',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Cantero',
            'nombre' => 'Jacobo',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Llopis',
            'nombre' => 'Julia',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Barrero',
            'nombre' => 'Gonzalo',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Sacristan',
            'nombre' => 'Eugenia',
            'ciclo' => 'DAW'
        ),
        array(
            'apellidos' => 'Rodriguez de la fuente',
            'nombre' => 'Ataulfo',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Macias',
            'nombre' => 'Nelson',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Ortega',
            'nombre' => 'Sabrina',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Cervantes',
            'nombre' => 'Amalia',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Candela',
            'nombre' => 'Alvaro',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Carreño',
            'nombre' => 'Xavi',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Batista',
            'nombre' => 'Miguel ANgel',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Guerrero',
            'nombre' => 'Alejandra',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Alonso',
            'nombre' => 'Ivan',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Mayo',
            'nombre' => 'Jose Luiss',
            'ciclo' => 'ASIX'
        ),
        array(
            'apellidos' => 'Gallego Gudiño',
            'nombre' => 'Daniel',
            'ciclo' => 'SMX'
        ),
        array(
            'apellidos' => 'Santos',
            'nombre' => 'Marc',
            'ciclo' => 'SMX'
        ),
        array(
            'apellidos' => 'Souto',
            'nombre' => 'Marc',
            'ciclo' => 'SMX'
        ),
        array(
            'apellidos' => 'Brener',
            'nombre' => 'Nathan',
            'ciclo' => 'SMX'
        ),
        array(
            'apellidos' => 'Lanzón',
            'nombre' => 'Alex',
            'ciclo' => 'SMX'
        ),
        array(
            'apellidos' => 'Cuadrado',
            'nombre' => 'Alex',
            'ciclo' => 'SMX'
        ),
        array(
            'apellidos' => 'Sol',
            'nombre' => 'Joel',
            'ciclo' => 'SMX'
        ),
        array(
            'apellidos' => 'Burgos',
            'nombre' => 'Ona',
            'ciclo' => 'SMX'
        ),
        array(
            'apellidos' => 'Barrera',
            'nombre' => 'Minerva',
            'ciclo' => 'SMX'
        ),
        array(
            'apellidos' => 'Carrasco',
            'nombre' => 'Jose',
            'ciclo' => 'SMX'
        )
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
