<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
//use Storage;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Expediente;
use App\Pago;

class PagoController extends Controller
{
    //
    public function pagos(Request $request, Redirector $redirect)
    {   
        //$pacientes = Paciente::all();
        //dd("variable"); 
        $expediente = Expediente::where('id','=',$request->expediente_id)->first();
        $pagos = Pago::where('expediente_id','=',$expediente->id)->get();
        //dd($pagos); 

        return view('pacientes.pagos')
        ->with('pagos', $pagos)
        ->with('expediente', $expediente);
    }
}
