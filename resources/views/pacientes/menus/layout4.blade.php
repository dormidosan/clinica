<form id="pagos" name="pagos" class="pagos" method="get" action="{{ route('paciente.pagos.get',$expediente->paciente->id) }}">
   {{-- {{ csrf_field() }}
   <input type="hidden" name="expediente_id" value="{{$expediente->id}}"> --}}
   <button type="submit" class="btn btn-primary" style="float: left;">Pagos</button>
</form>

