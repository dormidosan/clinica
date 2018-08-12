<form id="fotos" name="fotos" class="fotos" method="post" action="{{ route('fotos.post') }}">
   {{ csrf_field() }}
   <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
   <button type="submit" class="btn btn-primary" style="float: left;">Fotos</button>
</form>