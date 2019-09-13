<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Procedimiento;

class ProcedimientoController extends Controller
{
    //
    public function procedimiento(Request $request, Redirector $redirect)
    {   
        //$pacientes = Paciente::all();
        //dd($request->procedimiento_id); 
        $procedimiento = Procedimiento::where('id','=',$request->procedimiento_id)->first();
        //$pagos = Pago::where('expediente_id','=',$expediente->id)->get();
        //dd($pagos); 
        //dd($procedimiento);
        return view('pacientes.pagos.procedimientos')
        ->with('procedimiento', $procedimiento);
    }
}
