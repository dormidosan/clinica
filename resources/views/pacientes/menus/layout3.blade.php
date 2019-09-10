<form id="controles" name="controles" class="controles" method="get" action="{{ route('paciente.controles.get',$expediente->paciente->id) }}">
   {{-- {{ csrf_field() }}
   <input type="hidden" name="expediente_id" value="{{$expediente->id}}"> --}}
   <button type="submit" class="btn btn-primary" style="float: left;">Controles</button>
</form>