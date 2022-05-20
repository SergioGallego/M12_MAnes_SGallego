<?php

namespace Database\Seeders;

use App\Models\AlumnoUf;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $arrayNotas = array(
        array(
            'uf_id' => '1',
            'alumno_id' => '1',
            'nota' => '9',
        ),
        array(
            'uf_id' => '1',
            'alumno_id' => '2',
            'nota' => '7',
        ),
        array(
            'uf_id' => '3',
            'alumno_id' => '1',
            'nota' => '9',
        ),
        array(
            'uf_id' => '3',
            'alumno_id' => '2',
            'nota' => '7',
        ),
        array(
            'uf_id' => '2',
            'alumno_id' => '1',
            'nota' => '6',
        ),
        array(
            'uf_id' => '4',
            'alumno_id' => '1',
            'nota' => '6',
        ),
    );

    public function seedModulo(){
        DB::table('alumno_ufs')->delete();
        foreach($this->arrayNotas as $nota){
            $n = new AlumnoUf;
            $n->uf_id = $nota['uf_id'];
            $n->alumno_id = $nota['alumno_id'];
            $n->nota = $nota['nota'];
            $n->save();
        }
    }

     
    public function run()
    {
        self::seedModulo();
    }
}
