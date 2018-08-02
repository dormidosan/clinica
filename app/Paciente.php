<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $table = 'pacientes';
    protected $fillable = ['direccion','email'];

	public function expediente()
    {
        return $this->hasOne('App\Expediente');
    }

    public function telefonos()
    {
        return $this->hasMany('App\Telefono');
    }

    //foraneas
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }
}
