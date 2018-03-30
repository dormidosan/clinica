<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedienteObservacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente_observacion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('expediente_id');
            $table->unsignedInteger('observacion_id');
            $table->timestamps();

            $table->index(["observacion_id"], 'fk_expediente_observacion_observaciones1_idx');

            $table->index(["expediente_id"], 'fk_expediente_observacion_expedientes1_idx');


            $table->foreign('expediente_id', 'fk_expediente_observacion_expedientes1_idx')
                ->references('id')->on('expedientes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('observacion_id', 'fk_expediente_observacion_observaciones1_idx')
                ->references('id')->on('observaciones')
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
        Schema::dropIfExists('expediente_observacion');
    }
}
