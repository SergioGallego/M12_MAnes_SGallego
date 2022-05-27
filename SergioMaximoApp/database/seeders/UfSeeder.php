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
            'nombre' => 'UF1',
            'modulo' => 'M1',
            'horas' => 48,
            'modulo_id' => 1,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M1',
            'horas' => 36,
            'modulo_id' => 1,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M1',
            'horas' => 24,
            'modulo_id' => 1,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M1',
            'horas' => 12,
            'modulo_id' => 1,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M2',
            'horas' => 50,
            'modulo_id' => 2,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M2',
            'horas' => 54,
            'modulo_id' => 2,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M2',
            'horas' => 24,
            'modulo_id' => 2,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M2',
            'horas' => 48,
            'modulo_id' => 2,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M3',
            'horas' => 26,
            'modulo_id' => 3,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M3',
            'horas' => 45,
            'modulo_id' => 3,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M3',
            'horas' => 24,
            'modulo_id' => 3,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M3',
            'horas' => 65,
            'modulo_id' => 3,
            'updated_by' => 1
        ),array(
            'nombre' => 'UF1',
            'modulo' => 'M5',
            'horas' => 24,
            'modulo_id' => 4,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M5',
            'horas' => 16,
            'modulo_id' => 4,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M5',
            'horas' => 12,
            'modulo_id' => 4,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M5',
            'horas' => 85,
            'modulo_id' => 4,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M5',
            'horas' => 24,
            'modulo_id' => 5,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M9',
            'horas' => 21,
            'modulo_id' => 5,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M9',
            'horas' => 21,
            'modulo_id' => 5,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M9',
            'horas' => 54,
            'modulo_id' => 5,
            'updated_by' => 1
        ),array(
            'nombre' => 'UF1',
            'modulo' => 'M5',
            'horas' => 12,
            'modulo_id' => 6,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M5',
            'horas' => 21,
            'modulo_id' => 6,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M5',
            'horas' => 54,
            'modulo_id' => 6,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M5',
            'horas' => 45,
            'modulo_id' => 6,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M3',
            'horas' => 10,
            'modulo_id' => 7,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M3',
            'horas' => 22,
            'modulo_id' => 7,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M3',
            'horas' => 54,
            'modulo_id' => 7,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M3',
            'horas' => 45,
            'modulo_id' => 7,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M2',
            'horas' => 21,
            'modulo_id' => 8,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M2',
            'horas' => 26,
            'modulo_id' => 8,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M2',
            'horas' => 48,
            'modulo_id' => 8,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M2',
            'horas' => 54,
            'modulo_id' => 8,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M2',
            'horas' => 24,
            'modulo_id' => 9,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M2',
            'horas' => 12,
            'modulo_id' => 9,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M2',
            'horas' => 24,
            'modulo_id' => 9,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M2',
            'horas' => 65,
            'modulo_id' => 9,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M7',
            'horas' => 12,
            'modulo_id' => 10,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M7',
            'horas' => 52,
            'modulo_id' => 10,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M7',
            'horas' => 24,
            'modulo_id' => 10,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M7',
            'horas' => 32,
            'modulo_id' => 10,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M1',
            'horas' => 26,
            'modulo_id' => 11,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M1',
            'horas' => 24,
            'modulo_id' => 11,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M1',
            'horas' => 45,
            'modulo_id' => 11,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M1',
            'horas' => 14,
            'modulo_id' => 11,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M8',
            'horas' => 26,
            'modulo_id' => 12,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M8',
            'horas' => 26,
            'modulo_id' => 12,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M8',
            'horas' => 58,
            'modulo_id' => 12,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M8',
            'horas' => 16,
            'modulo_id' => 12,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF1',
            'modulo' => 'M6',
            'horas' => 26,
            'modulo_id' => 13,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF2',
            'modulo' => 'M6',
            'horas' => 48,
            'modulo_id' => 13,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF3',
            'modulo' => 'M6',
            'horas' => 12,
            'modulo_id' => 13,
            'updated_by' => 1
        ),
        array(
            'nombre' => 'UF4',
            'modulo' => 'M6',
            'horas' => 24,
            'modulo_id' => 13,
            'updated_by' => 1
        ),
    );

    public function seedUf(){ //Recorre la array de UFs guardando a cada uno en la base de datos
        DB::table('ufs')->delete();
        foreach($this->arrayUf as $uf){
            $u = new Uf;
            $u->nombre = $uf['nombre'];
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
