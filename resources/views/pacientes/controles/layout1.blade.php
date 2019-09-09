
<div class="panel-body">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="padding-right: 20px !important;">Numero</th>
                                <th class="text-center" style="width: 40%">Descripcion</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Hora</th>
                                <th class="text-center"> </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php  $i = 1  @endphp
                            @forelse($expediente->controles as $control)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>{{ $control->descripcion }}</td>            
                                <td>{{ $control->fecha->format('l j \d\e F Y')  }}</td>
                                <td>{{ $control->hora  }}</td>
                                <td>
                                    <form id="control{{$control->id}}" name="control{{$control->id}}" class="control" method="post" action="{{route('control.post')}}"> 
                                        {{ csrf_field() }}
                                        <input type="hidden" class="form-control border-input" name="control_id" value="{{$control->id}}">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Acceder al control</button>
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

    



    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label></label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label></label>
                <!-- input type="text" name="telefono" class="form-control border-input" placeholder="Telefono de contacto" --> 
            </div>
        </div>
    </div>







</div>

