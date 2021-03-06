


    <div class="row">
        <div class="col-md-12">
            <div class="form-group">

                @forelse($expediente->controles as $control)
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered" style="width:100%">
                        <caption>
                            Fecha: {{ $control->fecha->format('l j \d\e F Y')  }} <br>
                            Descripción: {{ $control->descripcion }}
                        </caption>
                        <thead>
                            <tr>
                                <th class="text-center" style="padding-right: 20px !important;">Numero</th>
                                <th class="text-center">Procedimiento</th>
                                <th class="text-center">Costo</th>
                                <th class="text-center">Abonado</th>
                                <th class="text-center">Restante</th>
                                <th>    </th>
                                <!-- th class="text-center"> </th -->
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php  $i = 1  @endphp
                            
                                @forelse($control->procedimientos as $procedimiento)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $procedimiento->servicio->tipo_nombre }}</td>            
                                        <td>{{ $procedimiento->costo_total  }}</td>
                                        <td>{{-- {{ $procedimiento->total_pagado  }} --}}
                                            @php
                                                $total_pagado = 0.00                                                
                                            @endphp
                                            @forelse($procedimiento->pagos as $pago)
                                                 @php
                                                 $total_pagado = $total_pagado + $pago->monto;            
                                                 @endphp
                                            @empty
                                            @endforelse
                                            {{ $total_pagado }}
                                        </td>    
                                        <td>{{ $procedimiento->costo_total - $total_pagado }}</td>  
                                        <td>
                                            @if ($procedimiento->pagado)
                                                <span style="color: blue">Pagado</span>
                                            @else
                                                <button type="button" 
                                                class="btn btn-success abonar" 
                                                data-procedimiento="{{ $procedimiento->id }}" >Abonar</button>
                                                
                                            @endif
                                        </td>                                
                                    </tr>
                                @empty

                                @endforelse
                            

                            {{-- @php  $i = 1  @endphp
                            @forelse($pagos as $pago)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>{{ $pago->procedimiento->servicio->tipo_nombre }}</td>            
                                <td>{{ $pago->fecha  }}</td>
                                <td>{{ $pago->monto  }}</td>
                                td>
                                    <form id="control{-{$control->id}}" name="control{-{$control->id}}" class="control" method="post" action="{-{route('control.post')}}"> 
                                    {{ csrf_field() }}
                                    <input type="hidden" class="form-control border-input" name="control_id" value="{-{$control->id}}">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Acceder al control</button>
                                    </form>
                                </td 
                                
                            </tr>
                            @empty
                            @endforelse --}}

                        </tbody>
                    </table>
                    
                </div>
                <br>
                @empty
                @endforelse

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



