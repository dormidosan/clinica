@extends('layouts.app')

@section('styles')
<!-- code -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

<style type="text/css">
.table > thead > tr > th.text-center {
    vertical-align: middle;  
}
.table-responsive {
   overflow-x: inherit;
}
</style>

@endsection

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
                    <form id="buscar_expedientes" name="buscar_expedientes" class="buscar_expedientes"  autocomplete="on" method="post"> 
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
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" id="buscarExpediente">Busca expediente</button>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>

                        </div>
                    </form>
                    <br>
                    <div class="table-responsive" id="div-tabla-pacientes">
                        <table id="tabla-pacientes" class="table table-striped table-bordered" >
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
                            <tbody id="tabla-pacientes-tbody"></tbody>

                        </table>

                    </div>

                </div>
                
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@endsection
@section('scripts')
<script type="text/javascript">
    $( document ).ready(function() {
        console.log( "ready!listado" );
        $('#tabla-pacientes').DataTable({
            "autoWidth": false,
            "paging":   false,
            "ordering": false,
            "info":     false
        } );  

    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });     

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
                $("#tabla-pacientes-tbody").html(result);    

            }


        });
        console.log("exito");        

        //END
    });


</script>

@endsection
