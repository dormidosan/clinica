<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('paciente_id');
            $table->string('numero', 10)->nullable();
            $table->timestamps();
            
            $table->index(["paciente_id"], 'fk_telefonos_pacientes1_idx');


            $table->foreign('paciente_id', 'fk_telefonos_pacientes1_idx')
                ->references('id')->on('pacientes')
                ->onDelete('no action')
                ->onUpdate('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefonos');
    }
}
