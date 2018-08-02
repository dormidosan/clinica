@extends('layouts.app')
@section('content')
<div class="container-fluid">
   <form id="crear_expediente" name="crear_expediente" class="crear_expediente" method="post" action="{{ route('creacion.post') }}" autocomplete="on">
      {{ csrf_field() }}
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="panel panel-default">
               <div class="panel-heading clearfix">Datos personales</div>
               @include('pacientes.creacion.layout1')
            </div>
         </div>
         <div class="col-md-4">
            <div class="panel panel-default">
               <div class="panel-heading clearfix">Datos medicos</div>
               @include('pacientes.creacion.layout2')
            </div>
         </div>
      </div>
      <br>
      <div class="row justify-content">
         <div class="col-md-3">
         </div>
         <div class="col-md-2">
            <div class="text-center">
               <button type="submit" class="btn btn-info btn-fill btn-wd">Crear Expediente</button>
            </div>
         </div>
      </div>
   </form>
</div>
@endsection

