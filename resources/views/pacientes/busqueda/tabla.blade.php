
        @php  $i = 1  @endphp
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