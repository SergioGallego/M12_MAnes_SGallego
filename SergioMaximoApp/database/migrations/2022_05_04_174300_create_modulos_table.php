<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("comentario");
            $table->foreignId("profesor")
                    ->nullable()
                    ->constrained('users')
                    ->nullOnDelete()
                    ->cascadeOnUpdate();
            $table->foreignId('ciclo')
                  ->constrained('ciclos')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->integer("updated_by");
            $table->unique(['nombre', 'ciclo']);
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
        Schema::dropIfExists('modulos');
    }
}
