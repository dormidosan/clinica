<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $table = 'fotos';

    //foraneas
    public function expediente()
    {
        return $this->belongsTo('App\Expediente');
    }
    public function tipo_foto()
    {
        return $this->belongsTo('App\TipoFoto');
    }

}
