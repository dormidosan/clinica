@extends('layouts.app')

@section('styles')
<!-- code -->
<link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

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
                <div class="panel-heading">Historial de pagos</div>
                        @include('pacientes.pagos.layout1')
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="panel panel-default">
                <div class="panel-heading">Generar pago</div>
                        
                        @include('pacientes.pagos.layout2')
                      
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
        </script>
@endsection