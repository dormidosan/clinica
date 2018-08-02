
    <div class="panel-body">

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Primer Nombre</label>
                    <input type="text" readonly class="form-control border-input" name="primer_nombre" value="{{$expediente->paciente->persona->primer_nombre}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Segundo Nombre</label>
                    <input type="text" readonly class="form-control border-input" name="segundo_nombre" value="{{$expediente->paciente->persona->segundo_nombre}}" >
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Primer Apellido</label>
                    <input type="text" readonly class="form-control border-input" name="primer_apellido" value="{{$expediente->paciente->persona->primer_apellido}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Segundo Apellido</label>
                    <input type="text" readonly class="form-control border-input" name="segundo_apellido" value="{{$expediente->paciente->persona->segundo_apellido}}">
                </div>
            </div>

        </div>

    

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label>Sexo</label>
                        <input type="text" readonly class="form-control border-input" value="{{$expediente->paciente->persona->sexo->nombre_sexo}}" >                
                </div>
            </div>
<!-- <input type="radio" name="gender" value="male"> Male<br> -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Fecha Nacimiento (Mes-Dia-Año)</label>
                    <input type="text" readonly class="form-control border-input" value="{{$expediente->paciente->persona->fecha_nac}}">  
                </div>




            </div>
        </div>




        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" readonly name="direccion" class="form-control border-input" value="{{$expediente->paciente->direccion}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Telefono</label>
                    @php $paciente_telefonos = "" ; @endphp
                    @forelse($expediente->paciente->telefonos as $telefono)
                        @php 
                        $paciente_telefonos = $paciente_telefonos." ".$telefono->numero;
                        @endphp
                    @empty
                    @endforelse
                    <input type="tel" readonly name="telefono" pattern="[0-9][,]" class="form-control border-input" value="{{$paciente_telefonos}}">
                    <!-- input type="text" name="telefono" class="form-control border-input" placeholder="Telefono de contacto" --> 
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" readonly name="email" class="form-control border-input" value="{{$expediente->paciente->email}}" >
                </div>
            </div>
        </div>

        <div class="row">

        </div>






    </div>
    
