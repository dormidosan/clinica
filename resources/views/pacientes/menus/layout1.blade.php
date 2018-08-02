<!-- a class="btn btn-success" href="-{-{ url('expediente') }}" role="button" style="float: left;"></a -->
<form id="fotos" name="fotos" class="fotos" method="post" action="{{ route('expediente.post') }}">
   {{ csrf_field() }}
   <input type="hidden" name="paciente_id" value="{{$expediente->paciente->id}}">
   <button type="submit" class="btn btn-success" style="float: left;">Expediente</button>
</form>
<form id="fotos" name="fotos" class="fotos" method="post" action="{{ route('fotos.post') }}">
   {{ csrf_field() }}
   <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
   <button type="submit" class="btn btn-primary" style="float: left;">Fotos</button>
</form>
<form id="controles" name="controles" class="controles" method="post" action="{{ route('controles.post') }}">
   {{ csrf_field() }}
   <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
   <button type="submit" class="btn btn-primary" style="float: left;">Controles</button>
</form>
<!--a class="btn btn-primary" href="{-{- url('controles') }}" role="button" style="float: left;">Controles</a -->
<!-- a class="btn btn-primary" href="-{-{ url('pagos') }}" role="button" style="float: left;">Pagos</a -->
<form id="controles" name="controles" class="controles" method="post" action="{{ route('pagos.post') }}">
   {{ csrf_field() }}
   <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
   <button type="submit" class="btn btn-primary" style="float: left;">Pagos</button>
</form>

