<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('expediente_id');
            $table->unsignedInteger('tipo_foto_id');
            $table->string('url', 60)->nullable();
            $table->datetime('fecha_subida')->nullable();
            $table->timestamps();
            
            $table->index(["tipo_foto_id"], 'fk_fotos_tipo_fotos1_idx');

            $table->index(["expediente_id"], 'fk_fotos_expedientes1_idx');


            $table->foreign('expediente_id', 'fk_fotos_expedientes1_idx')
                ->references('id')->on('expedientes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tipo_foto_id', 'fk_fotos_tipo_fotos1_idx')
                ->references('id')->on('tipo_fotos')
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
        Schema::dropIfExists('fotos');
    }
}
