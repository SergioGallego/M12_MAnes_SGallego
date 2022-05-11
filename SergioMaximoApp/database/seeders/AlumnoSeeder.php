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
    private $arrayUsers = array (
        array(
            'nombre' => 'Maximo'
        ),
        array(
            'nombre' => 'Joan'
        ),
        array(
            'nombre' => 'Ataulfo'
        ),
    );

    private function seedAlumno(){
        DB::table('alumnos')->delete();
        foreach($this->arrayUsers as $user){
            $us = new Alumno;
            $us->nombre = $user['nombre'];
            $us->save();
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
