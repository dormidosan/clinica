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
use App\Procedimiento;

class PagoController extends Controller
{
    //
    public function pagos(Request $request, Redirector $redirect)
    {   
        //$pacientes = Paciente::all();
        //dd("variable"); 
        $expediente = Expediente::where('paciente_id','=',$request->paciente_id)->first();
        //$pagos = Pago::where('expediente_id','=',$expediente->id)->get();
        //dd($pagos); 
        //number_format($val,2)

        return view('pacientes.pagos')
        //->with('pagos', $pagos)
        ->with('expediente', $expediente);
    }

    public function pago_nuevo(Request $request, Redirector $redirect)
    {   
        //$pacientes = Paciente::all();
        //dd("variable"); 
        $procedimiento = Procedimiento::where('id','=',$request->procedimiento_id)->first();
        $total_pagos = 0.00;
        foreach ($procedimiento->pagos as $pago) {
            $total_pagos = $total_pagos + $pago->monto;
        }
        //if (number_format($procedimiento->costo_total - $total_pagos,2) > number_format('0.00',2)) {
        $valor = $procedimiento->costo_total - ($total_pagos + $request->monto);
        //$valor = '-0.011000000000010';
        if (number_format($valor,2) >= number_format('0.00',2)) {
            $pago =  new Pago($request->all());
            $pago->procedimiento_id = $procedimiento->id;
            $pago->expediente_id = $procedimiento->control->expediente_id;
            $pago->save();
            if (number_format($valor,2) == number_format('0.00',2)) {
                $procedimiento->pagado = 1;
                $procedimiento->save();
            }
            return '1';
        }else{
            return '0';
        }

        // $total_pagos = $total_pagos + $request->monto;
        // if (number_format($procedimiento->costo_total - $total_pagos,2) > number_format('0.00',2)) {        
        //     //GUARDAR PAGO
        //     return 'NO saldado';
        // }else{
        //     return 'saldado';
        // }

        // $pago =  new Pago($request->all());
        
        
        // $pago->procedimiento_id = $procedimiento->id;
        // $pago->expediente_id = $procedimiento->control->expediente_id;
        // //dd($pago);
        // $pago->save();
        // //$expediente = Expediente::where('paciente_id','=',$request->paciente_id)->first();
        // //$pagos = Pago::where('expediente_id','=',$expediente->id)->get();
        // //dd($pagos); 

        // return 'exito0';
    }

    public function pago_listado(Request $request, Redirector $redirect)
    {
        $expediente = Expediente::where('paciente_id','=',$request->paciente_id)->first();
        return view('pacientes.pagos.layout1')
        //->with('pagos', $pagos)
        ->with('expediente', $expediente);
    }
}
