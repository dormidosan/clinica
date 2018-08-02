<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'personas';
    protected $fillable = ['primer_nombre','segundo_nombre','primer_apellido','segundo_apellido','sexo_id','fecha_nac'];


	public function paciente()
    {
        return $this->hasOne('App\Paciente');
    }

    public function doctor()
    {
        return $this->hasOne('App\Doctor');
    }

    //foraneas
    public function sexo()
    {
        return $this->belongsTo('App\Sexo');
    }
}
