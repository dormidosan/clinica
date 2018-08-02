<div class="panel panel-default">
   <div class="panel-heading clearfix">
      <form id="fotos" name="fotos" class="fotos" method="post" action="{{ route('fotos.upload.post') }}" target="_blank">
         {{ csrf_field() }}
         <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
         @if($foto4){{$foto4->tipo_foto->tipo_nombre}}@endif <button type="submit" class="btn btn-primary" style="float: right;">Subir</button>
      </form>
   </div>
   <div class="panel-body">
      @if($foto4)
      <img src="{{ asset('storage/fotos') }}/{{$foto4->url}}"
         class="img-responsives" width="200px" 
         style="margin-left: 25px !important; "
         alt="Imagen no disponible">
      @else
      <img src="{{ asset('storage/fotos') }}"
         class="img-responsives" 
         style="margin-left: 25px !important; "
         alt="Imagen no disponible">
      @endif
   </div>
</div>

