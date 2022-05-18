<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ufs', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string('modulo');
            $table->foreignId('profesor')
                    ->nullable()
                    ->constrained('users')
                    ->nullOnUpdate()
                    ->cascadeOnDelete();
            $table->integer("horas");
            $table->foreignId('modulo_id')
                    ->constrained('modulos')
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->unique(['nombre', 'modulo_id']);
            $table->string("updated_by");
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
        Schema::dropIfExists('ufs');
    }
}
