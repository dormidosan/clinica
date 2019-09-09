<form id="controles" name="controles" class="controles" method="post" action="{{ route('controles.save.post') }}">
  {{ csrf_field() }}
  <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
   <div class="panel-body">
      <div class="row">
         <div class="col-md-4">
            <div class="form-group">
               <label>Fecha</label>
               <span id="mobile-device-datepicker" style="display: none;">
                  <input type="date" id="fecha-mobile" name="fecha" class="form-control border-input" required="required" min="1960-04-01" max="{{date("Y-m-d")}}"  >     
               </span>
               <span id="desktop-device-datepicker">
                <div class='input-group date' id='datecontrol' name="fecha">
                    <input type='text' class="form-control"  placeholder="Fecha" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
               </span>

            </div>
            


         </div>
         <div class="col-md-8">
            <div class="form-group">
               <label>Hora</label>
               <!-- input id="timepicker1" type="text"  class="form-control border-input" name="timepicker1"/ -->
               <div class='input-group date'>
                  <input name="hora" type='text' id="datetimepicker3" class="form-control customtimepicker" required="required"
                     placeholder="h:i AM">
                  <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <h4>Descripcion</h4>
            <!-- <div class="card"> 
               <div class="card-body">-->
            <textarea name="descripcion" class="form-control" required="required" id="exampleTextarea" rows="3"></textarea>
            <!--    </div>
               </div> -->
         </div>
      </div>
      <div class="row">
         <div class="col-md-4">
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <br>
               <button type="submit" class="btn btn-info btn-fill btn-wd">Crear control</button>  
            </div>
         </div>
         <div class="col-md-4">
         </div>
      </div>
   </div>
</form>

