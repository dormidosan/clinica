<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class Control extends Model
{
    //
    protected $table = 'controles';

    public function procedimientos()
    {
        return $this->hasMany('App\Procedimiento');
    }

    //foraneas
    public function expediente()
    {
        return $this->belongsTo('App\Expediente');
    }

    public function getFechaAttribute($date){
        return new Date(Carbon::parse($date));
    }
}
