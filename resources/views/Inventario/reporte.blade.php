<table>
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Producto</th>
        <th>Cantidad</th>
    
        <th>Costo Divisa</th>
        <th>Ganancia %</th>
        <th>Costo Petro [CD+(CD*%G))/60]</th>
       
        <th>Fecha del Obsequio</th>
       
 </tr>
    </thead>
    <tbody>
    @foreach($inventario as $inv)
        <tr>
           <td>{{  $inv->id }}</td>
            <td>{{ $inv->productos->nombre }}</td>
            <td>{{ $inv->cantidad }}</td>
            <td>{{ $inv->costoDivisas }}</td>
            <td>{{ $inv->ganancia }}</td>
            <td>{{ $inv->costoPetros }}</td>
           
            <td>{{ $inv->created_at->format('d/m/Y h:s a') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>