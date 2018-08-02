@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading clearfix">
            <a class="btn btn-success" href="{{ url('expediente') }}" role="button" style="float: left;">Expediente</a>
            <a class="btn btn-primary" href="{{ url('fotos') }}" role="button" style="float: left;">Fotos</a> <!-- /expediente/fotos/ -->
            <a class="btn btn-primary" href="{{ url('controles') }}" role="button" style="float: left;">Controles</a> <!-- /expediente/controles/ -->
            <a class="btn btn-primary" href="{{ url('pagos') }}" role="button" style="float: left;">Pagos</a> <!-- /expediente/pagos/ -->
         </div>
          <form id="crear_expediente" name="crear_expediente" class="crear_expediente" method="post" action="{{ route('fotos.save.post') }}" enctype="multipart/form-data" > 
            {{ csrf_field() }}
            <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
         <div class="panel-body">
            <div class="row justify-content-center">
               <div class="col-md-6 col-md-offset-3">
                  <div class="panel panel-default">
                     <div class="panel-heading clearfix">
                        Carga de imagenes
                     </div>
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Tipo foto</label>
                                 {!! Form::select('tipo_foto_id',$tipo_fotos,null,['id'=>'tipo','class'=>'form-control border-input','required'=>'required','placeholder'=>'seleccione tipo foto']) !!}
                              </div>
                           </div>
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>Seleccionar foto</label>

                                 <!-- input type="file" class="form-control " name="pic" accept="image/*" -->
                                 <!-- COMPONENT START -
                                  <div class="form-group">
                                    <div class="input-group input-file" name="Fichier1">
                                      <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                                        </span>
                                        <input type="text" class="form-control" placeholder='Choose a file...' />
                                        <span class="input-group-btn">
                                             <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                        </span>
                                    </div>
                                  </div>
                                  COMPONENT END -->
                                 <!-- COMPONENT START -->
                                      <div class="input-group input-file" name="objeto_imagen">
                                          <input type="text" class="form-control" placeholder='Choose a file...'  />     
                                              <span class="input-group-btn">
                                              <button class="btn btn-default btn-choose" type="button">Choose</button>
                                          </span>
                                      </div>
                                    <!-- COMPONENT END -->
                              </div>
                           </div>
                        </div>
                        <div class="row justify-content-center">
                           <div class="col-md-4">
                           </div>
                           <div class="col-md-4">
                              <button type="submit" class="btn btn-info btn-fill btn-wd">Subir</button>
                           </div>
                           <div class="col-md-4">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
       </form>
      </div>
   </div>
   <br>
</div>
@endsection

@section("scripts")
    <script type="text/javascript">
      function bs_input_file() {
    $(".input-file").before(
        function() {
            if ( ! $(this).prev().hasClass('input-ghost') ) {
                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0' accept='image/*'  >");
                element.attr("name",$(this).attr("name"));
                element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                });
                $(this).find("button.btn-choose").click(function(){
                    element.click();
                });
                $(this).find("button.btn-reset").click(function(){
                    element.val(null);
                    $(this).parents(".input-file").find('input').val('');
                });
                $(this).find('input').css("cursor","pointer");
                $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file').prev().click();
                    return false;
                });
                return element;
            }
        }
    );
}
$(function() {
    bs_input_file();
});
    </script>
@endsection