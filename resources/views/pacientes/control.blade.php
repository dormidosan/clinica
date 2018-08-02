@extends('layouts.app')
@section('styles')
<!-- code -->
<link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
<style>
.fecha-control {
    padding-left: 325px;
}
</style>
@endsection
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading clearfix">
            <a class="btn btn-success" href="{{ url('expediente') }}" role="button" style="float: left;">Expediente</a>
            <form id="fotos" name="fotos" class="fotos" method="post" action="{{ route('fotos.post') }}">
               {{ csrf_field() }}
               <!-- input type="hidden" name="expediente_id" value="-{-{-$-expediente->id}}" -->
               <button type="submit" class="btn btn-primary" style="float: left;">Fotos</button>
            </form>
            <a class="btn btn-primary" href="{{ url('controles') }}" role="button" style="float: left;">Controles</a>
            <a class="btn btn-primary" href="{{ url('pagos') }}" role="button" style="float: left;">Pagos</a>
            <h4 class="fecha-control">

              Control de fecha: {{ $control->fecha->format('l j \d\e F Y')  }}</h4>
         </div>
         <div class="panel-body">
            <div class="row justify-content-center">
               <div class="col-md-8">
                  <div class="panel panel-default">
                     <div class="panel-heading">Lista de procedimientos realizados</div>
                     @include('pacientes.control.layout1') 
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="panel panel-default">
                     <div class="panel-heading">Generar procedimiento</div>
                     @include('pacientes.control.layout2')
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
@section("js")
<!-- code -->
<script src="{{ asset('libs/datetimepicker/js/moment.min.js') }}"></script>
<script src="{{ asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section("scripts")
<!-- code -->
<script type="text/javascript">
   $(function () {
       $('#datetimepicker3').datetimepicker({
           format: 'LT'
       });
   });

   function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46 )
        return false;
    return true;
    }
</script>
@endsection

