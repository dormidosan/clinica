<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFoto extends Model
{
    //
    protected $table = 'tipo_fotos';

    public function fotos()
    {
        return $this->hasMany('App\Foto');
    }

    //foraneas
    
}
