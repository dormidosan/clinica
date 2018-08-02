<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $table = 'servicios';

    public function doctores()
    {
        return $this->belongsToMany('App\Doctor','doctor_servicio')->withTimestamps();
    }

    public function procedimientos()
    {
        return $this->hasMany('App\Procedimiento');
    }

    //foraneas
}
