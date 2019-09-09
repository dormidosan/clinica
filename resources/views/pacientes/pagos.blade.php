@extends('layouts.app')



@section('content')
<div class="container-fluid">

 <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="panel panel-default">
    <div class="panel-heading clearfix">
      @include('pacientes.menus.layout1')
      @include('pacientes.menus.layout2')
      @include('pacientes.menus.layout3')
      <form id="pagos" name="pagos" class="pagos" method="post" action="{{ route('pagos.post') }}">
       {{ csrf_field() }}
       <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
       <button type="submit" disabled class="btn btn-success" style="float: left;">Pagos</button>
     </form>


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
@section('styles')
<!-- code -->
<link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker3.min.css') }}">

<style type="text/css">
td.disabled.day {
  background-color: #EEEEEE !important;
  border-radius: 0px !important;
  color: red !important;
}

</style>
@endsection

@section("js")
<!-- code -->
<script src="{{ asset('libs/mobiledetect/js/mobile-detect.min.js') }}" ></script>
<script src="{{ asset('libs/datetimepicker/js/moment.min.js') }}"></script>
<script src="{{ asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}" ></script>


@endsection

@section("scripts")
<!-- code -->
<script type="text/javascript">
  $(function () {
    var detector = new MobileDetect(window.navigator.userAgent)
    console.log( "Mobile: " + detector.mobile());
    // $('#datetimepicker3').datetimepicker({
    //   format: 'LT'
    // });
    //desktop-device-datepicker
    $('.customtimepicker').datetimepicker({
      format: 'LT'
    });

    if (detector.mobile() ) { 
      console.log( "SI Mobile: " + detector.mobile());
      $('span').remove('#desktop-device-datepicker');
      $('#mobile-device-datepicker').attr('style', 'display:block');
    } else {
      console.log( "NO Mobile: " + detector.mobile());
      $('span').remove('#mobile-device-datepicker');
      $('#datecontrol').datepicker({
        endDate: new Date(),
        autoclose: true,
        language: "es",
        format: "yyyy-mm-dd"
        // format: "dd-mm-yyyy"
      });
    }
    

    // $('#datecontrol').datetimepicker({
    //             sideBySide: true
    //             });

  });



</script>
@endsection