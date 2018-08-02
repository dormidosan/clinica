@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading clearfix">
                @include('pacientes.menus.layout1')

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

