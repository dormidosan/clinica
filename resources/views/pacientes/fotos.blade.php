@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading clearfix">
            @include('pacientes.menus.layout1')
            <form id="fotos" name="fotos" class="fotos" method="post" action="{{ route('fotos.post') }}">
   {{ csrf_field() }}
   <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
   <button type="submit" disabled class="btn btn-success" style="float: left;">Fotos</button>
</form>
            @include('pacientes.menus.layout3')
            @include('pacientes.menus.layout4')
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

