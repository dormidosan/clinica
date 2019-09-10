@extends('layouts.app')



@section('content')
<div class="container-fluid">
 <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="panel panel-default">
    <div class="panel-heading clearfix">
     @include('pacientes.menus.layout1')
     <form  action="#">
      {{-- {{ csrf_field() }}
      <input type="hidden" name="expediente_id" value="{{$expediente->id}}"> --}}
      <button type="submit" disabled class="btn btn-success" style="float: left;">Fotos</button>
    </form>
    @include('pacientes.menus.layout3')
    @include('pacientes.menus.layout4')
  </div>
  <div class="panel-body">
   <div class="row justify-content-center">
    <div class="col-md-8">
     <div class="panel panel-default">
      <div class="panel-heading">Fotos</div>


      <div class="table-responsive" id="div-tabla-pacientes" >
        <table id="tabla-pacientes" class="table table-striped table-bordered" style="width:100%;"  >
         <thead>
          <tr>
           <th>miniatura</th>
           <th>tipo</th>
           <th>fecha</th>
           <th></th>
         </tr>
       </thead>
       <tbody>
         @forelse($fotos as $foto)
         <tr>
                      {{-- <td><img src="{-{ asset('storage/fotos/'.$foto->url) }} " alt="" class="img-responsive" style="width: 100px; "> </td>
                      <td><img src="{-{ url('storage/fotos/'.$foto->url) }} " alt="" class="img-responsive" style="width: 100px; "> </td> --}}
                      {{-- <td><img src="{{ URL::to('storage/fotos/'.$foto->url) }}" alt="" class="compress" style="width: 100px; "> </td> --}}
                      <td>
                        <a href="{{ URL::to('storage/fotos/'.$foto->url) }}" class="preview" title="Lake and a mountain" target="_blank" >
                         <img src="{{ URL::to('storage/fotos/'.$foto->url) }}" alt="gallery thumbnail" style="width: 50px; " />
                       </a>
                     </td>      
                     <td>{{ $foto->tipo_foto->tipo_nombre }}</td>
                     <td>{{ $foto->fecha_subida }}</td>
                     <td></td>
                   </tr>
                   @empty

                   @endforelse


                 </tbody>
               </table>
             </div>
           </div>
         </div>
         <div class="col-md-4">
          <form id="crear_expediente" name="crear_expediente" class="crear_expediente" method="post" action="{{ route('fotos.save.post') }}" enctype="multipart/form-data" > 
            {{ csrf_field() }}
            <input type="hidden" name="expediente_id" value="{{$expediente->id}}">

           <div class="panel panel-default">    

            <div class="panel-heading clearfix">
              Carga de imagenes
            </div>
            <div class="panel-body">

              <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                 <label>Tipo foto</label>
                 {!! Form::select('tipo_foto_id',$tipo_fotos,null,
                 ['id'=>'tipo','class'=>'form-control border-input','required'=>'required','placeholder'=>'seleccione tipo foto']) !!}
               </div>
             </div>
             <div class="col-md-8">
              <div class="form-group">
               <label>Seleccionar foto</label>

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
</form>
</div>
</div>



</div>
</div>
</div>
<br>
</div>
</div>
<p id='preview'><img src='' alt='Image preview' style='width:500px;display: none;' /></p>
@endsection


@section('styles')
<!-- code -->
<style type="text/css">
a{
 text-decoration:none;
 color:#f30; 
}
img{border:none;}
#preview{
 position:absolute;
 border:1px solid #ccc;
 background:#333;
 padding:5px;
 display:none;
 color:#fff;
}






</style>
@endsection



@section('scripts')
<script type="text/javascript">


 $( document ).ready(function() {
  $('option[value=""]').attr('disabled', 'disabled');
  bs_input_file();
  console.log( "ready!fotos" );
  imagePreview();

  $('a.preview').click(function(e)
  {
          // Special stuff to do when this link is clicked...

          // Cancel the default action
          e.preventDefault();
        });
});



 this.imagePreview = function(){  
   /* CONFIG */

   xOffset = 10;
   yOffset = 30;
   cStyle = "width:500px";

      // these 2 variable determine popup's distance from the cursor
      // you might want to adjust to get the right result

      /* END CONFIG */
      $("a.preview").hover(function(e){
       $("#preview").remove();
       this.t = this.title;
       this.title = "";  
       var c = (this.t != "") ? "<br/>" + this.t : "";
       console.log("<p id='preview'><img src='"+ this.href +"' alt='Image preview' style='"+cStyle+"' />"+ c +"</p>");
       $("body").append("<p id='preview'><img src='"+ this.href +"' alt='Image preview' style='"+cStyle+"' />"+ c +"</p>");                        
       $("#preview").css("top",(e.pageY - xOffset) + "px").css("left",(e.pageX + yOffset) + "px").fadeIn("fast");                 
     },
     function(){
       this.title = this.t; 
       $("#preview").remove();
     });  
      $("a.preview").mousemove(function(e){
       $("#preview").css("top",(e.pageY - xOffset) + "px").css("left",(e.pageX + yOffset) + "px");
     });         
    };


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


// $(function() {
//     bs_input_file();
// });

</script>

@endsection


