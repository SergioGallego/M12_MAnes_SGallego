<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Uf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AlumnoSeeder extends Seeder
{
    private $arrayAlumnos = array (
        array(
            'dni' => '54666456X',
            'apellidos' => 'Anes Gimeno',
            'nombre' => 'Maximo',
            'ciclo' => 'DAW'
    ),
        array(
            'dni' => '88568486V',
            'apellidos' => 'Fernandez Malé',
            'nombre' => 'Joan',
            'ciclo' => 'DAW'
        ),
        array(
            'dni' => '52014493Q',
            'apellidos' => 'Albero Soteras',
            'nombre' => 'Jose',
            'ciclo' => 'DAW'
        ),
        array(
            'dni' => '98133709T',
            'apellidos' => 'Alcaraz',
            'nombre' => 'Silvia',
            'ciclo' => 'DAW'
        ),
        array(
            'dni' => '55620997M',
            'apellidos' => 'Perez',
            'nombre' => 'Joel',
            'ciclo' => 'DAW'
        ),
        array(
            'dni' => '65070141J',
            'apellidos' => 'Utset',
            'nombre' => 'Joan',
            'ciclo' => 'DAW'
        ),
        array(
            'dni' => '07176407Q',
            'apellidos' => 'Cantero',
            'nombre' => 'Jacobo',
            'ciclo' => 'DAW'
        ),
        array(
            'dni' => '84224524L',
            'apellidos' => 'Llopis',
            'nombre' => 'Julia',
            'ciclo' => 'DAW'
        ),
        array(
            'dni' => '46011928Z',
            'apellidos' => 'Barrero',
            'nombre' => 'Gonzalo',
            'ciclo' => 'DAW'
        ),
        array(
            'dni' => '14652083W',
            'apellidos' => 'Sacristan',
            'nombre' => 'Eugenia',
            'ciclo' => 'DAW'
        ),
        array(
            'dni' => '72092848S',
            'apellidos' => 'Rodriguez de la fuente',
            'nombre' => 'Ataulfo',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '46249775H',
            'apellidos' => 'Macias',
            'nombre' => 'Nelson',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '02722048K',
            'apellidos' => 'Ortega',
            'nombre' => 'Sabrina',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '11544184R',
            'apellidos' => 'Cervantes',
            'nombre' => 'Amalia',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '07583458J',
            'apellidos' => 'Candela',
            'nombre' => 'Alvaro',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '31673881Y',
            'apellidos' => 'Carreño',
            'nombre' => 'Xavi',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '43522750B',
            'apellidos' => 'Batista',
            'nombre' => 'Miguel ANgel',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '01920000Y',
            'apellidos' => 'Guerrero',
            'nombre' => 'Alejandra',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '51801441J',
            'apellidos' => 'Alonso',
            'nombre' => 'Ivan',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '03568930C',
            'apellidos' => 'Mayo',
            'nombre' => 'Jose Luiss',
            'ciclo' => 'ASIX'
        ),
        array(
            'dni' => '07953432D',
            'apellidos' => 'Gallego Gudiño',
            'nombre' => 'Daniel',
            'ciclo' => 'SMX'
        ),
        array(
            'dni' => '99906813B',
            'apellidos' => 'Santos',
            'nombre' => 'Marc',
            'ciclo' => 'SMX'
        ),
        array(
            'dni' => '88881140D',
            'apellidos' => 'Souto',
            'nombre' => 'Marc',
            'ciclo' => 'SMX'
        ),
        array(
            'dni' => '12544994N',
            'apellidos' => 'Brener',
            'nombre' => 'Nathan',
            'ciclo' => 'SMX'
        ),
        array(
            'dni' => '93115587H',
            'apellidos' => 'Lanzón',
            'nombre' => 'Alex',
            'ciclo' => 'SMX'
        ),
        array(
            'dni' => '28745348V',
            'apellidos' => 'Cuadrado',
            'nombre' => 'Alex',
            'ciclo' => 'SMX'
        ),
        array(
            'dni' => '71663039F',
            'apellidos' => 'Sol',
            'nombre' => 'Joel',
            'ciclo' => 'SMX'
        ),
        array(
            'dni' => '29259416N',
            'apellidos' => 'Burgos',
            'nombre' => 'Ona',
            'ciclo' => 'SMX'
        ),
        array(
            'dni' => '73384830H',
            'apellidos' => 'Barrera',
            'nombre' => 'Minerva',
            'ciclo' => 'SMX'
        ),
        array(
            'dni' => '40366433F',
            'apellidos' => 'Carrasco',
            'nombre' => 'Jose',
            'ciclo' => 'SMX'
        )
    );

    private function seedAlumno(){
        DB::table('alumnos')->delete();

        $arrayUfs = Uf::all()->pluck('id')->toArray();

        foreach($this->arrayAlumnos as $alumno){
            $al = new Alumno;
            $al->dni = $alumno['dni'];
            $al->apellidos = $alumno['apellidos'];
            $al->nombre = $alumno['nombre'];
            $al->ciclo = $alumno['ciclo'];
            $al->save();

            
        for($i=0; $i < count($arrayUfs); $i++){
            $id = $arrayUfs[$i];
            $al->ufs()->attach($id);
        }

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
