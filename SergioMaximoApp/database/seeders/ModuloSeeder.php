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
            'nombre' => 'M3 Programacio',
            'comentario' => '',
            'profesor' => '3',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'M5 Entorns de desenvolupament',
            'comentario' => 'Sistemes Microinformatics i Xarxes',
            'profesor' => '2',
            'updated_by' => 1
        )
    );

    public function seedModulo(){
        DB::table('modulos')->delete();
        foreach($this->arrayModulo as $modulo){
            $m = new Modulo;
            $m->nombre = $modulo['nombre'];
            $m->comentario = $modulo['comentario'];
            $m->profesor = $modulo['profesor'];
            $m->updated_by = $modulo['updated_by'];
            $m->save();
        }
    }

     
    public function run()
    {
        self::seedModulo();
    }
}
