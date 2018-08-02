<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('expediente_id');
            $table->string('descripcion', 255)->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->timestamps();
            
            $table->index(["expediente_id"], 'fk_controles_expedientes1_idx');


            $table->foreign('expediente_id', 'fk_controles_expedientes1_idx')
                ->references('id')->on('expedientes')
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
        Schema::dropIfExists('controles');
    }
}
