<form id="fotos" name="fotos" class="fotos" method="get" action="{{ route('paciente.fotos.get',$expediente->paciente->id) }}">
   {{-- {{ csrf_field() }} --}}
   {{-- <input type="hidden" name="expediente_id" value="{{$expediente->id}}"> --}}
   <button type="submit" class="btn btn-primary" style="float: left;">Fotos</button>
</form>