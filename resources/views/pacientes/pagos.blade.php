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
      <div class="panel-heading" >Generar pago</div>
        @include('pacientes.pagos.layout2')
        <span id="listado-pagos">
          
        </span>

      

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
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        todayHighlight: true
        // format: "dd-mm-yyyy"
      });
    }
    

    // $('#datecontrol').datetimepicker({
    //             sideBySide: true
    //             });
    $('button.abonar').click(function(){
      //var data = $.parseJSON($(this).attr('data-procedimiento'));
      var procedimiento_id = $(this).attr('data-procedimiento');
      console.log(procedimiento_id);

      $.ajax({
        type:'POST',
        url: "{{ route('paciente.procedimiento.post') }}",
        data:{'procedimiento_id':procedimiento_id},
        success:function(result){

                //myTable.clear().draw();
                //myTable.rows.add(result).draw();
                $('#listado-pagos').html(result); 
                $('input[name=procedimiento_id]').val(procedimiento_id); 
               console.log(result);
              }


            });

    });

  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });  

function isNumberKey(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46 )
    return false;
  return true;
}

 $('#pago_nuevo').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting

        // var values = $("#pago_nuevo :input").serializeArray();
        // console.log(values); //use the console for debugging, F12 in Chrome, not alerts
        var data = $("#pago_nuevo").serialize();
        

        $.ajax({
            type:'POST',
            url: "{{ route('paciente.pago.nuevo.post') }}",
            data:data,
            success:function(result){

                console.log(result); 
            }


        });
        console.log("exito");        

        //END
    });



</script>
@endsection