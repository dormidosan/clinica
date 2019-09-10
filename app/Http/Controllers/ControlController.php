<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
//use Storage;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Paciente;
use App\TipoSanguineo;
use App\Alergia;
use App\Sexo;
use App\Persona;
use App\Expediente;
use App\Observacion;
use App\Telefono;
use App\TipoFoto;
use App\Foto;
use App\Control;
use App\Servicio;
use App\Procedimiento;

class ControlController extends Controller
{
    //
    public function controles(Request $request, Redirector $redirect)
    {   
        //$pacientes = Paciente::all();
        $expediente = Expediente::where('paciente_id','=',$request->paciente_id)->first();
        return view('pacientes.controles')
        //->with('pacientes', $pacientes)
        ->with('expediente', $expediente);
    }

    public function controles_save(Request $request, Redirector $redirect)
    {   

    	//dd($request->all()); 
    	// h:i A   10:54 PM
    	// H:i     22:54
    	$control = new Control();
    	$control->expediente_id = $request->expediente_id; 
    	$control->descripcion = $request->descripcion; 
    	$control->fecha = $request->fecha;
    	$control->hora = date('H:i', strtotime($request->hora));
    	$control->save();
    	//dd($control); 

        //$pacientes = Paciente::all();
        $expediente = Expediente::where('id','=',$request->expediente_id)->first();
        return view('pacientes.controles')
        //->with('pacientes', $pacientes)
        ->with('expediente', $expediente);
    }


    public function control(Request $request, Redirector $redirect)
    {   
    	//dd("variable"); 
        //$servicios = Servicio::all();
        $servicios = Servicio::where('id','!=',0)->pluck('tipo_nombre','id');
        $control = Control::where('id','=',$request->control_id)->first();
        $expediente = Expediente::where('id','=',$control->expediente_id)->first();
        //dd($control->fecha->toFormattedDateString());
        //dd(Carbon::parse($control->created_at)->toFormattedDateString()); 
        return view('pacientes.control')
        ->with('control', $control)
        ->with('servicios', $servicios)
        ->with('expediente', $expediente);
    }

    public function control_save(Request $request, Redirector $redirect)
    {   

    	//dd($request->all()); 
    	// h:i A   10:54 PM
    	// H:i     22:54
    	$servicios = Servicio::where('id','!=',0)->pluck('tipo_nombre','id');
        $control = Control::where('id','=',$request->control_id)->first();
        $expediente = Expediente::where('id','=',$control->expediente_id)->first();

    	$procedimiento = new Procedimiento();
    	$procedimiento->control_id = $control->id;
    	$procedimiento->servicio_id = $request->servicio_id;
    	$procedimiento->costo_total = $request->costo_procedimiento; 
    	$procedimiento->total_pagado = 0.01;
    	$procedimiento->pagado = 0;
    	$procedimiento->save();

    	/*
    	$control->expediente_id = $request->expediente_id; 
    	$control->descripcion = $request->descripcion; 
    	$control->fecha = $request->fecha;
    	$control->hora = date('H:i', strtotime($request->hora));
    	$control->save();
    	*/
    	//dd($control); 

        //$pacientes = Paciente::all();
        //$expediente = Expediente::where('id','=',$request->expediente_id)->first();
        return view('pacientes.control')
        ->with('control', $control)
        ->with('servicios', $servicios)
        ->with('expediente', $expediente);
    }

}
