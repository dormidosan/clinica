
    <div class="panel-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    

<div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="padding-right: 20px !important;">Numero</th>
                                <th class="text-center">Servicio</th>
                                <th class="text-center">Costo total</th>
                                <th class="text-center">Total pagado</th>
                                <th class="text-center">Estado </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php  $i = 1  @endphp
                            @forelse($control->procedimientos as $procedimiento)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>{{ $procedimiento->servicio->tipo_nombre }}</td>            
                                <td>{{ $procedimiento->costo_total  }}</td>
                                <td>{{ $procedimiento->total_pagado  }}</td>
                                <td>@if($procedimiento->pagado == '1')
                                        <span style="color: green">Pagado</span>
                                    @else
                                        <span style="color: red">No pagado</span>
                                    @endif
                                </td>
                                  <!--  -{-{ ($procedimiento->pagado == '1') ? "<h4></h4>" : "No pagado" }-} -->


                                {{-- <td>
                                    <form id="control-{-{$control->id}}" name="control-{-{$control->id}}" class="control" method="post" action="{-{-route('control.post')}}"> 
                                    {{ csrf_field() }}
                                    <input type="hidden" class="form-control border-input" name="control_id" value="{{$control->id}}">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">QUITAR ESTO</button>
                                    </form>
                                </td> --}}
                                
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
    
