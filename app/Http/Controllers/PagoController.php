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
        $expediente = Expediente::where('paciente_id','=',$request->paciente_id)->first();
        $pagos = Pago::where('expediente_id','=',$expediente->id)->get();
        //dd($pagos); 

        return view('pacientes.pagos')
        ->with('pagos', $pagos)
        ->with('expediente', $expediente);
    }

    public function generar_pago(Request $request, Redirector $redirect)
    {   
        //$pacientes = Paciente::all();
        //dd("variable"); 
        $pago =  new Pago($request->all());
        
        // $pago->procedimiento_id = 
        // $pago->expediente_id =
        //$expediente = Expediente::where('paciente_id','=',$request->paciente_id)->first();
        //$pagos = Pago::where('expediente_id','=',$expediente->id)->get();
        //dd($pagos); 

        return 'exito';
    }
}
