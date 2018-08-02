<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    //
    protected $table = 'observaciones';

	public function expedientes()
    {
        return $this->belongsToMany('App\Observacion','expediente_observacion')->withTimestamps();
    }

    //foraneas
}
