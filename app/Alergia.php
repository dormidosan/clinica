<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    //
    protected $table = 'alergias';

	public function expedientes()
    {
        return $this->belongsToMany('App\Expediente','alergia_expediente')->withTimestamps();
    }

    //foraneas
}
