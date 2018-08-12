@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <form id="expediente" name="expediente" class="expediente" method="post" action="{{ route('expediente.post') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="paciente_id" value="{{$expediente->paciente->id}}">
                  <button type="submit" disabled class="btn btn-success" style="float: left;">Expediente</button>
               </form>

                @include('pacientes.menus.layout2')
                @include('pacientes.menus.layout3')
                @include('pacientes.menus.layout4')

            </div>
            <div class="panel-body">
               <div class="row justify-content-center">
                  <div class="col-md-8">
                     <div class="panel panel-default">
                        <div class="panel-heading">Datos personales</div>
                          @include('pacientes.expediente.layout1')
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="panel panel-default">
                        <div class="panel-heading">Datos medicos</div>
                        @include('pacientes.expediente.layout2')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
      

</div>
<div class="row justify-content">
         <div class="col-md-3">
         </div>
         <div class="col-md-2">
            <div class="text-center">
               <!-- button type="submit" class="btn btn-info btn-fill btn-wd">Crear Expediente</button -->
            </div>
         </div>
      </div>
@endsection

