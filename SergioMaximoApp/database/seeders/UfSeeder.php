<?php

namespace Database\Seeders;

use App\Models\Uf;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $arrayUf = array(
        array(
            'nombre' => 'UF4',
            'profesor' => 3,
            'modulo' => 'M3',
            'horas' => 120,
            'modulo_id' => 1,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'profesor' => 2,
            'modulo' => 'M5',
            'horas' => 100,
            'modulo_id' => 2,
            'updated_by' => 1
        )
    );

    public function seedUf(){
        DB::table('ufs')->delete();
        foreach($this->arrayUf as $uf){
            $u = new Uf;
            $u->nombre = $uf['nombre'];
            $u->profesor = $uf['profesor'];
            $u->modulo = $uf['modulo'];
            $u->horas = $uf['horas'];
            $u->modulo_id = $uf['modulo_id'];
            $u->updated_by = $uf['updated_by'];
            $u->save();
        }
    }

     
    public function run()
    {
        self::seedUf();
    }
}
