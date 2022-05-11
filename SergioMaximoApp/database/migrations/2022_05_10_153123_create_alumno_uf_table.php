<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoUfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_ufs', function (Blueprint $table) {
            $table->foreignId('uf_id')
                  ->constrained('ufs')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('alumno')
                  ->constrained('alumnos')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->integer('nota');
            $table->primary(['uf_id', 'alumno']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_uf');
    }
}
