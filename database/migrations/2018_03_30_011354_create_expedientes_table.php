<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('tipo_sanguineo_id');
            $table->unsignedInteger('paciente_id');
            $table->timestamps();

            $table->index(["tipo_sanguineo_id"], 'fk_expedientes_tipo_sanguineos1_idx');

            $table->index(["paciente_id"], 'fk_expedientes_pacientes1_idx');


            $table->foreign('tipo_sanguineo_id', 'fk_expedientes_tipo_sanguineos1_idx')
                ->references('id')->on('tipo_sanguineos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('paciente_id', 'fk_expedientes_pacientes1_idx')
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
        Schema::dropIfExists('expedientes');
    }
}
