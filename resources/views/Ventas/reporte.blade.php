<table>
    <thead>
    <tr>
        <th>Codigo de Venta</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Monto Unitario</th>
        <th>Monto Total</th>
        <th>Moneda</th>
        <th>Comprador</th>
        <th>Cedula</th>
        <th>Fecha de la Venta</th>
       
 </tr>
    </thead>
    <tbody>
    @foreach($productosVentas as $prod)
        <tr>
           <td>{{ $prod->ventas->id }}</td>
            <td>{{ $prod->productos->nombre }}</td>
            <td>{{ $prod->cantidad }}</td>
            <td>{{ $prod->montoUnitario }}</td>
            <td>{{ $prod->montoUnitario * $prod->cantidad}}</td>
            <td>{{ $prod->ventas->moneda }}</td>
            <td>{{ $prod->ventas->cedula }}</td>
            <td>{{ $prod->ventas->comprador }}</td>
            <td>{{ $prod->ventas->created_at->format('d/m/Y h:s a') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>