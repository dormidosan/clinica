<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    //
    protected $table = 'sexos';

    public function personas()
    {
        return $this->hasMany('App\Persona');
    }

    //foraneas
}
