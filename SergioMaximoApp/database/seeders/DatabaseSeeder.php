<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CicloSeeder::class);
        $this->call(ModuloSeeder::class);
        $this->call(UfSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(NotasSeeder::class);
    }
}
