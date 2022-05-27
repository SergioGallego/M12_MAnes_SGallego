<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserSeeder extends Seeder
{
    private $arrayUsers = array (
        array(
            'name' => 'Arnau',
			'email' => 'arnau@inscamidemar.cat',
            'estado' => 'Activo',
            'password' => 'arnau1358',
            'role_id' => 1
        ),
        array(
            'name' => 'Sergio',
			'email' => 'sergio@inscamidemar.cat',
            'estado' => 'Activo',
            'password' => 'sergio676',
            'role_id' => 2
        ),
        array(
            'name' => 'Maximo',
			'email' => 'maximo@inscamidemar.cat',
            'estado' => 'Activo',
            'password' => 'maximomaximo',
            'role_id' => 2
        ),
        array(
            'name' => 'Jordi',
			'email' => 'jordi@inscamidemar.cat',
            'estado' => 'Activo',
            'password' => 'jordijordi',
            'role_id' => 2
        ),
        array(
            'name' => 'Didac',
			'email' => 'didac@inscamidemar.cat',
            'estado' => 'Activo',
            'password' => 'didacdidac',
            'role_id' => 2
        ),
        array(
            'name' => 'Ramon',
			'email' => 'ramon@inscamidemar.cat',
            'estado' => 'Activo',
            'password' => 'ramonramon',
            'role_id' => 2
        ),
    );

    private function seedUser(){ //Recorre la array de usuarios guardando a cada uno en la base de datos
        DB::table('users')->delete();
        foreach($this->arrayUsers as $user){
            $us = new User;
            $us->name = $user['name'];
            $us->email = $user['email'];
            $us->password = Hash::make($user['password']);
            $us->role_id = $user['role_id'];
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
        self::seedUser();
    }
}
