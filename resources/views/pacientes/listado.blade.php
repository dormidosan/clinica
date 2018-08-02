@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <a class="btn btn-primary" href="{{ url('creacion') }}" role="button" style="float: right;">Crear Paciente</a>

                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="padding-right: 20px !important;">Numero</th>
                                <th class="text-center">nombre completo</th>
                                <th class="text-center">sexo</th>
                                <th class="text-center">fecha nacimiento</th>
                                <th class="text-center">telefonos</th>
                                <th class="text-center">direccion</th>
                                <th class="text-center">email</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php  $i = 1 + ($pacientes->currentpage()-1)*$pacientes->perpage() @endphp
                            @forelse($pacientes as $paciente)
                            <tr>
                                <td>{{ $i++ }}</td>
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

                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    {!! $pacientes->render() !!}
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
