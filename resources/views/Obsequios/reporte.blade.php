<table>
    <thead>
    <tr>
        <th>Codigo de Obsequio</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Recibe</th>
        <th>Autoriza</th>
        <th>Fecha del Obsequio</th>
       
 </tr>
    </thead>
    <tbody>
    @foreach($productosObsequios as $prod)
        <tr>
           <td>{{  $prod->obsequios->id }}</td>
            <td>{{ $prod->productos->nombre }}</td>
            <td>{{ $prod->cantidad }}</td>
            <td>{{ $prod->obsequios->nameRecibe }}</td>
            <td>{{ $prod->obsequios->nameAutoriza }}</td>
           
            <td>{{ $prod->obsequios->created_at->format('d/m/Y h:s a') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>