
<div class="panel-body">



    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tipo Sanguineo</label>
                {!! Form::select('tipo_sanguineo_id',$tipo_sanguineos,null,['id'=>'tipo','class'=>'form-control border-input','required'=>'required','placeholder'=>'seleccione tipo Sanguineo']) !!}

            </div>
        </div>
        <div class="col-md-8">
            
                    <div class="form-group">
                        <label>Alergias</label>
                        {!! Form::select('l_alergias',$alergias,null,['id'=>'tipo','class'=>'form-control border-input','multiple'=>'multiple','name'=>'l_alergias[]']) !!}


                    </div>

        </div>

        <div class="col-md-12">
            <label>Observaciones</label>
            <!-- <div class="card"> 
                <div class="card-body">-->
                    <textarea name="observacion" class="form-control" id="exampleTextarea" rows="3" ></textarea>
            <!--    </div>
             </div> -->
        </div>


    </div>
    <div class="row">

    </div>






</div>
