
    <div class="panel-body">

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Primer Nombre</label>
                    <input type="text" class="form-control border-input" name="primer_nombre" placeholder="Primer Nombre" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Segundo Nombre</label>
                    <input type="text" class="form-control border-input" name="segundo_nombre" placeholder="Segundo Nombre" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Primer Apellido</label>
                    <input type="text" class="form-control border-input" name="primer_apellido" placeholder="Primer Apellido" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Segundo Apellido</label>
                    <input type="text" class="form-control border-input" name="segundo_apellido" placeholder="Segundo Apellido" required>
                </div>
            </div>

        </div>

    

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @forelse($sexos as $sexo)
                        <label class="btn btn-secondary ">
                            <input type="radio" name="sexo_id" id="option{{$sexo->t_sexo}}" value="{{$sexo->id}}"  required> {{$sexo->nombre_sexo}}
                        </label>
                        @empty
                        @endforelse
                     
                    </div>
                </div>
            </div>
<!-- <input type="radio" name="gender" value="male"> Male<br> -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Fecha Nacimiento (Mes-Dia-Año)</label>
                    <input type="date" id="fecha_nac" name="fecha_nac" class="form-control border-input" min="1960-04-01" max="2019-04-20" required>   
                </div>




            </div>
        </div>




        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" name="direccion" class="form-control border-input" placeholder="Direccion residencial" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="tel" name="telefono" pattern="[0-9]{4}-[0-9]{4}" class="form-control border-input" placeholder="Telefono de contacto">
                    <!-- input type="text" name="telefono" class="form-control border-input" placeholder="Telefono de contacto" --> 
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" name="email" class="form-control border-input" placeholder="usuario@correo.com" required>
                </div>
            </div>
        </div>

        <div class="row">

        </div>






    </div>
    
