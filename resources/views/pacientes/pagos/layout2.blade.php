
{{--    <div class="panel-body"> --}}
    {{-- <div class="row">
         <div class="col-md-12">
          <p id="nombre-procedimiento" style="text-align:center;visibility: hidden;">X</p>
         </div>
    </div> --}}
    <form id="pago_nuevo"  method="post" action="#">
  {{ csrf_field() }}
  <input type="hidden" name="procedimiento_id" value="">
      <div class="row">
         <div class="col-md-6">
            <div class="form-group">
               <label>Fecha</label>
               <span id="mobile-device-datepicker" style="display: none;">
                  <input type="date" id="fecha-mobile" name="fecha" class="form-control border-input" required="required" min="1960-04-01" max="{{date("Y-m-d")}}"  >     
               </span>
               <span id="desktop-device-datepicker">
                <div class='input-group date' id='datecontrol' >
                    <input type='text' class="form-control"  name="fecha" placeholder="Fecha" required />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
               </span>
            </div>           

         </div>
         <div class="col-md-6">
            <div class="form-group">
               <label>Monto</label>
               <div class="input-group"> 
                        <span class="input-group-addon">$</span>
                    <input type="text" class="form-control border-input" name="monto" placeholder="Costo (Ej: 7.00, 10.00 )" pattern="[0-9]+(\.[0-9]{1,2})?" onkeypress="return isNumberKey(event)" required="required">
                    </div> 
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4">
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <br>
               <button id="submit-abono" type="submit" class="btn btn-info btn-fill btn-wd" disabled>Realizar abono</button>  
            </div>
         </div>
         <div class="col-md-4">
         </div>
      </div>
      </form>

   {{-- </div> --}}


