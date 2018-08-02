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
               <div class="col-md-6">
                  @include('pacientes.fotos.layout1')
               </div>
               <div class="col-md-6">
                  @include('pacientes.fotos.layout2')
               </div>
            </div>
            <div class="row justify-content-center">
               <div class="col-md-6">
                  @include('pacientes.fotos.layout3')
               </div>
               <div class="col-md-6">
                  @include('pacientes.fotos.layout4')
               </div>
            </div>
         </div>
      </div>
   </div>
   <br>
</div>
@endsection

