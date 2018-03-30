<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('control_id');
            $table->unsignedInteger('servicio_id');
            $table->float('costo_total')->nullable();
            $table->float('total_pagado')->nullable();
            $table->boolean('pagado')->nullable();
            $table->timestamps();

            $table->index(["servicio_id"], 'fk_procedimientos_servicios1_idx');

            $table->index(["control_id"], 'fk_procedimientos_controles1_idx');


            $table->foreign('control_id', 'fk_procedimientos_controles1_idx')
                ->references('id')->on('controles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('servicio_id', 'fk_procedimientos_servicios1_idx')
                ->references('id')->on('servicios')
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
        Schema::dropIfExists('procedimientos');
    }
}
