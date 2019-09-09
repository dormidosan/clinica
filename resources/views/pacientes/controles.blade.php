@extends('layouts.app')



@section('content')
<div class="container-fluid">
 <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="panel panel-default">

    <div class="panel-heading clearfix">
      @include('pacientes.menus.layout1')
      @include('pacientes.menus.layout2')
      <form id="controles" name="controles" class="controles" method="post" action="{{ route('controles.post') }}">
       {{ csrf_field() }}
       <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
       <button type="submit" disabled class="btn btn-success" style="float: left;">Controles</button>
     </form>
     @include('pacientes.menus.layout4')
   </div>  


   <div class="panel-body">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">Historial de controles</div>
          @include('pacientes.controles.layout1')
        </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">Generar control</div>

          @include('pacientes.controles.layout2')

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
</div>
@endsection


@section('styles')
<!-- code -->
<link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" /> --}}

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css" integrity="sha256-BqW0zYSKgIYEpELUf5irBCGGR7wQd5VZ/N6OaBEsz5U=" crossorigin="anonymous" /> --}}
{{-- <link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker3.min.css') }}">

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha256-yMjaV542P+q1RnH6XByCPDfUFhmOafWbeLPmqKh11zo=" crossorigin="anonymous" /> --}}

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
<script src="{{ asset('libs/datetimepicker/js/moment.min.js') }}" ></script>
<script src="{{ asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script> --}}
<script src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}" ></script>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script> --}}
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
      console.log( "Es dispositivo movil: " + detector.mobile());
      //REMOVER desktop-datepicker por que usare datepicker para movil
      $('span').remove('#desktop-device-datepicker');
      $('#mobile-device-datepicker').attr('style', 'display:block');
    } else {
      console.log( "No es dispositivo movil: " + detector.mobile());
      //REMOVER mobile-datepicker por que usare datepicker para desktop
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