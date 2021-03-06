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
            $table->foreignId('alumno_id')
                  ->constrained('alumnos')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->integer('nota')
                  ->nullable();
            $table->primary(['uf_id', 'alumno_id']);
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
