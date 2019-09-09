<form id="controles" name="controles" class="controles" method="post" action="{{ route('control.save.post') }}">
  {{ csrf_field() }}
  <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
  <input type="hidden" name="control_id" value="{{$control->id}}">
   <div class="panel-body">
      <div class="row">
         <div class="col-md-4">
            <div class="form-group">
               <label>Tipo Servicio</label>
                {!! Form::select('servicio_id',$servicios,null,['id'=>'tipo','class'=>'form-control border-input','required'=>'required','placeholder'=>'seleccione el servicio']) !!}  
            </div>
         </div>
         <div class="col-md-8">
            <div class="form-group">
               <label>Precio</label>
                    <div class="input-group"> 
                        <span class="input-group-addon">$</span>
                    <input type="text" class="form-control border-input" name="costo_procedimiento" placeholder="Costo (Ej: 7.00, 10.00, 50.00 )" pattern="[0-9]+(\.[0-9]{1,2})" onkeypress="return isNumberKey(event)" required="required">
                    </div> 
                    
            </div>
         </div>
         <!-- div class="col-md-12">
            <h4>Descripcion</h4>
            <!- - <div class="card"> 
               <div class="card-body">- ->
            <textarea name="descripcion" class="form-control" required="required" id="exampleTextarea" rows="3"></textarea>
            <!- -    </div>
               </div> - ->
         </div -->
      </div>
      <div class="row">
         <div class="col-md-4">
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <br>
               <button type="submit" class="btn btn-info btn-fill btn-wd">Agregar procedimiento</button>  
            </div>
         </div>
         <div class="col-md-4">
         </div>
      </div>
   </div>
</form>

