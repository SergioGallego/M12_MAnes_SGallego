<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $arrayCiclo = array(
        array(
            'nombre' => 'DAW',
            'descripcion' => 'Desenvolupament de Aplicaciones Web',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'ASIX',
            'descripcion' => 'Administració de sistemes i xarxes',
            'updated_by' => 1
        ),
        array(
            'nombre' => 'SMX',
            'descripcion' => 'Sistemes Microinformatics i Xarxes',
            'updated_by' => 1
        )
    );

    public function seedCiclo(){ //Recorre la array de ciclos guardando a cada uno en la base de datos
        DB::table('ciclos')->delete();
        foreach($this->arrayCiclo as $ciclo){
            $c = new Ciclo;
            $c->nombre = $ciclo['nombre'];
            $c->descripcion = $ciclo['descripcion'];
            $c->updated_by = $ciclo['updated_by'];
            $c->save();
        }
    }

     
    public function run()
    {
        self::seedCiclo();
    }
}
