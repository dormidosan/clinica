
<table class="table table-striped table-bordered" >
  <caption>Procedimiento: {{ $procedimiento->servicio->tipo_nombre }}</caption>
  <thead>
    <th>fecha</th>
    <th>monto</th>
  </thead>
  <tbody>
    @forelse($procedimiento->pagos as $pago)    
    <tr>
      <td>{{ $pago->fecha }}</td>
      <td>{{ $pago->monto }}</td>
    </tr>
    @empty
    <tr>
      <td colspan="2" style="text-align: center;">Sin resultados</td>
    </tr>
    
    @endforelse
  </tbody>
</table>
