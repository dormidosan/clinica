<form id="expediente" name="expediente" class="expediente" method="post" action="{{ route('expediente.post') }}">
   {{ csrf_field() }}
   <input type="hidden" name="paciente_id" value="{{$expediente->paciente->id}}">
   <button type="submit" class="btn btn-primary" style="float: left;">Expediente</button>
</form>
