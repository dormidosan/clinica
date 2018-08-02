@extends('layouts.app')

@section('styles')
<!-- code -->
<style type="text/css">
    .table > thead > tr > th.text-center {
    vertical-align: middle;  
    }
</style>

@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label>Busqueda avanzada de expedientes</label>
                </div>
                <div class="panel-body">
                <form id="buscar_expedientes" name="buscar_expedientes" class="buscar_expedientes" method="post" action="{{ route('busqueda.post') }}" autocomplete="on"> 
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <label> Codigo</label>
                            <input type="text" class="form-control border-input" name="codigo" placeholder="Codigo paciente">
                        </div>
                        <div class="col-md-8">
                            <label> Nombre</label>
                            <input type="text" class="form-control border-input" name="nombre" placeholder="Nombre paciente">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Buscar expediente</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        
                    </div>
                </form>
                    <br>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Numero</th>
                                <th class="text-center">codigo paciente</th>
                                <th class="text-center">nombre completo</th>
                                <th class="text-center">sexo</th>
                                <th class="text-center">fecha nacimiento</th>
                                <th class="text-center">telefonos</th>
                                <th class="text-center">direccion</th>
                                <th class="text-center">email</th>
                                <th class="text-center">     </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php  $i = 1  @endphp
                            @forelse($pacientes as $paciente)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>{{ $paciente->id }}</td>
                                <td>{{ $paciente->persona->primer_nombre . " " . $paciente->persona->segundo_nombre . " " . $paciente->persona->primer_apellido . " " . $paciente->persona->segundo_apellido }}</td>
                                <td>{{ $paciente->persona->sexo->nombre_sexo  }}</td>
                                <td>{{ $paciente->persona->fecha_nac  }}</td>
                                <td>
                                    @forelse($paciente->telefonos as $telefono)
                                    {{ $telefono->numero  }}
                                    @empty
                                    N/A
                                    @endforelse
                                </td>
                                <td>{{ $paciente->direccion  }}</td>
                                <td>{{ $paciente->email  }}</td>
                                <td>
                                    <form id="expediente{{$paciente->id}}" name="expediente{{$paciente->id}}" class="expediente" method="post" action="{{route('expediente.post')}}"> 
                                    {{ csrf_field() }}
                                    <input type="hidden" class="form-control border-input" name="paciente_id" value="{{$paciente->id}}">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Acceder al expediente</button>
                                    </form>
                                </td>
                                
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
                </div>
                
            </div>
        </div>
    </div>
    
</div>
@endsection
