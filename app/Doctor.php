<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $table = 'doctores';

	public function servicios()
    {
        return $this->belongsToMany('App\Servicio','doctor_servicio')->withTimestamps();
    }

    //foraneas
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }
}
