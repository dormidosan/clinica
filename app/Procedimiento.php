<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    //
    protected $table = 'procedimientos';

	public function pagos()
    {
        return $this->hasMany('App\Pago');
    }


    //foraneas
    public function control()
    {
        return $this->belongsTo('App\Control');
    }

    public function servicio()
    {
        return $this->belongsTo('App\Servicio');
    }
}
