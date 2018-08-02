<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    //
    protected $table = 'telefonos';

    //foraneas
    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
}
