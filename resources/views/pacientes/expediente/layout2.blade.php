
<div class="panel-body">



    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tipo Sanguineo</label>
                <input type="text" readonly name="direccion" class="form-control border-input" value="{{$expediente->tipo_sanguineo->tipo_nombre}}">
            </div>
        </div>
        <div class="col-md-8">
            <label>Alergias</label>
                    <div class="form-group">
                    @php $expediente_alergias = "" ; @endphp
                    @forelse($expediente->alergias as $alergia)
                        @php 
                        $expediente_alergias = $expediente_alergias." ".$alergia->tipo_nombre;
                        @endphp
                    @empty
                    @endforelse
                    <input type="text" readonly class="form-control border-input" name="l_alergias" value="{{$expediente_alergias}}">
                    
                    </div>

        </div>

        <div class="col-md-12">
            <label>Observaciones</label>
            <!-- <div class="card"> 
                <div class="card-body">-->
                    @php $expediente_observaciones = "" ; @endphp
                    @forelse($expediente->observaciones as $observacion)
                        @php 
                        $expediente_observaciones = $expediente_observaciones." ".$observacion->observacion;
                        @endphp
                    @empty
                    @endforelse
                    <textarea name="observacion" readonly class="form-control" id="exampleTextarea" rows="3">{{$expediente_observaciones}}</textarea>
            <!--    </div>
             </div> -->
        </div>


    </div>
    <div class="row">

    </div>






</div>
