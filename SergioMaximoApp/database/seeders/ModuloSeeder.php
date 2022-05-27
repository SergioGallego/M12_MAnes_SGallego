<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $arrayModulo = array(
        array(
            'nombre' => 'M1',
            'comentario' => '',
            'profesor' => '2',
            'ciclo' => '1',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M2',
            'comentario' => '',
            'profesor' => '2',
            'ciclo' => '1',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M3',
            'comentario' => 'Programacio',
            'profesor' => '6',
            'ciclo' => '1',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M5',
            'comentario' => 'Entorns de desenvolupament',
            'profesor' => '5',
            'ciclo' => '1',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M9',
            'comentario' => '',
            'profesor' => '4',
            'ciclo' => '2',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M5',
            'comentario' => '',
            'profesor' => '5',
            'ciclo' => '2',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M3',
            'comentario' => '',
            'profesor' => '2',
            'ciclo' => '2',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M2',
            'comentario' => '',
            'profesor' => '4',
            'ciclo' => '2',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M2',
            'comentario' => '',
            'profesor' => '4',
            'ciclo' => '3',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M7',
            'comentario' => '',
            'profesor' => '5',
            'ciclo' => '3',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M1',
            'comentario' => '',
            'profesor' => '5',
            'ciclo' => '3',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M8',
            'comentario' => '',
            'profesor' => '2',
            'ciclo' => '3',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M6',
            'comentario' => '',
            'profesor' => '4',
            'ciclo' => '3',
            'updated_by' => 1
        ),
    );

    public function seedModulo(){ //Recorre la array de modulos guardando a cada uno en la base de datos
        DB::table('modulos')->delete();
        foreach($this->arrayModulo as $modulo){
            $m = new Modulo;
            $m->nombre = $modulo['nombre'];
            $m->comentario = $modulo['comentario'];
            $m->profesor = $modulo['profesor'];
            $m->ciclo = $modulo['ciclo'];
            $m->updated_by = $modulo['updated_by'];
            $m->save();
        }
    }

     
    public function run()
    {
        self::seedModulo();
    }
}
