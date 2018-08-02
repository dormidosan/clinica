<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSanguineo extends Model
{
    //
    protected $table = 'tipo_sanguineos';

    public function expedientes()
    {
        return $this->hasMany('App\Expediente');
    }

    //foraneas
}
