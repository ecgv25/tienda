@extends('layouts.app')

@section('htmlheader_title', 'Lista de Ventas')

@section('content_title', 'Lista de Ventas')

@section('content')
<br>
<div class="row justify-content-md-center">
      
        <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
     
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('ventas_new') }}" class="btn btn-outline-info btn-lg" >Vender</a>
            
            </div>
            <div class="btn-group">
            
        <a href="{{ route('ventas_export') }}" class="btn btn-outline-info btn-lg">Descargar ventas en Excel </a>
            </div>

          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>N</th>
               <th>Cantidad de Productos</th>
               <th>Monto (PTR)</th>
               <th>Moneda</th>
               <th>Cedula Comprador</th>
               <th>Nombre/Apellido Comprador</th>
               <th>Fecha de la Venta</th>
               <!--th>Editar</th-->
               <!--th>Eliminar</th-->
             </thead>
             <tbody>
             <?php $i= 1; ?> 
              @if($ventas->count())  
              @foreach($ventas as $venta)  
              <tr>
                <td>{{$i}}</td>
                <td>{{$venta->cantidad}}</td>
                <td>{{$venta->montoTotal}}</td>
                <td>{{$venta->moneda}}</td>
                <td>{{$venta->cedula}}</td>
                <td>{{$venta->comprador}}</td>
                <td>{{$venta->created_at->format('d/m/Y')}}</td>

                <!--td><a class="btn btn-primary btn-xs" href="#" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td-->
                  <form action="" method="post">
                   {{csrf_field()}}
                   <!--input name="_method" type="hidden" value="DELETE"-->
 
                   <!--button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button-->
                 </td>
               </tr>
               <?php $i= $i+1; ?>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      {{ $ventas->links() }}
    </div>
  </div>
</div> 
@endsection