<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    //
    protected $table = 'expedientes';

    public function controles()
    {
        return $this->hasMany('App\Control');
    }

    public function fotos()
    {
        return $this->hasMany('App\Foto');
    }

	public function alergias()
    {
        return $this->belongsToMany('App\Alergia','alergia_expediente')->withTimestamps();
    }

    public function observaciones()
    {
        return $this->belongsToMany('App\Observacion','expediente_observacion')->withTimestamps();
    }

    public function pagos()
    {
        return $this->hasMany('App\Pago');
    }

    //foraneas
    public function tipo_sanguineo()
    {
        return $this->belongsTo('App\TipoSanguineo');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
}
