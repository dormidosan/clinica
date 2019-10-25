<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    //
    protected $table = 'pagos';
    protected $fillable = ['fecha','monto','procedimiento_id'];

    //foraneas
    public function procedimiento()
    {
        return $this->belongsTo('App\Procedimiento');
    }

    public function expediente()
    {
        return $this->belongsTo('App\Expediente');
    }
}
