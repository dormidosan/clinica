@extends('layouts.app')



@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading clearfix">
                    <label>Busqueda avanzada de expedientes</label>
                    <a class="btn btn-primary" href="{{ url('creacion') }}" role="button" style="float: right;">Crear Paciente</a>
                </div>

                <div class="panel-body">
                    <!-- form id="buscar_expedientes" name="buscar_expedientes" class="buscar_expedientes"  autocomplete="on" method="post"> 
                        {-{ csrf_field() }}                        
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" id="buscarExpediente">Busca expediente</button>                        
                                </form -->

                                <div class="table-responsive" id="div-tabla-pacientes" style="display: none;">
                                    <table id="tabla-pacientes" class="table table-striped table-bordered" style="width:100%;"  >
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <!-- th class="text-center">codigo paciente</th -->
                                                <th class="text-center">nombre completo</th>
                                                <th class="text-center">sexo</th>
                                                <th class="text-center">fecha nacimiento</th>
                                                <th class="text-center">telefonos</th>
                                                <th class="text-center">direccion</th>
                                                <th class="text-center">email</th>
                                                <th class="text-center">     </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla-pacientes-tbody" class="text-center">
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
                                                <form id="expediente{{$paciente->id}}" name="expediente{{$paciente->id}}" c
                                                    lass="expediente" method="get" action="{{route('paciente.expediente.get',$paciente->id)}}"> 
                                                    {{-- {{ csrf_field() }} --}}
                                                    {{-- <input type="hidden" class="form-control border-input" name="paciente_id" value="{{$paciente->id}}"> --}}
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

        @section('styles')
        <!-- code -->
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap.min.css"/> --}}

<link rel="stylesheet" href="{{ asset('libs/datatable/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('libs/datatable/Responsive-2.2.2/css/responsive.bootstrap.min.css') }}">

<style type="text/css">
.table > thead > tr > th.text-center {
    vertical-align: middle;  
}

</style>

@endsection
@section('js')
{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js" defer></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js" defer></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap.min.js" defer></script> --}}

<script src="{{ asset('libs/datatable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('libs/datatable/DataTables-1.10.18/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('libs/datatable/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('libs/datatable/Responsive-2.2.2/js/responsive.bootstrap.min.js') }}"></script>

@endsection
@section('scripts')
<script type="text/javascript">
    var myTable;

    $( document ).ready(function() {
        console.log( "ready!listado" );
        createDataTable('#tabla-pacientes');    
        //$("#div-tabla-pacientes").removeAttr('style');
        $('#div-tabla-pacientes').attr('style', 'display:block;');
        //populateTable();    
        //document.getElementById("tabla-pacientes").style.display = "block"; 
    });

    function createDataTable(tableSelector) {
        myTable = $(tableSelector).DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "autoWidth": false,
            "paging":   true,
            "bLengthChange": false,
            "lengthMenu": [10],
            "ordering": false,
            "info":     false
        } );          
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

    function populateTable() {
        var data ;
        $.ajax({
            type:'POST',
            url: "{{ url('busqueda') }}",
            data:data,
            success:function(result){

                //myTable.clear().draw();
                //myTable.rows.add(result).draw();
                myTable.destroy();
                $("#tabla-pacientes-tbody").html(result); 
                //myTable.rows().invalidate().draw();

                //myTable.ajax.reload();
                createDataTable('#tabla-pacientes');   
            }


        });
    }




     $('#buscar_expedientes').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting
        var values = $("#buscar_expedientes :input").serializeArray();
        console.log(values); //use the console for debugging, F12 in Chrome, not alerts
        var data = $("#buscar_expedientes").serialize();
        

        $.ajax({
            type:'POST',
            url: "{{ url('busqueda') }}",
            data:data,
            success:function(result){

                //myTable.clear().draw();
                //myTable.rows.add(result).draw();
                myTable.destroy();
                $("#tabla-pacientes-tbody").html(result); 
                //myTable.rows().invalidate().draw();

                //myTable.ajax.reload();
                createDataTable('#tabla-pacientes');   
            }


        });
        console.log("exito");        

        //END
    });


</script>

@endsection
