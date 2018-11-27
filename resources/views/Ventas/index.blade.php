@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Ventas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('ventas_new') }}" class="btn btn-info" >Vender</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Monto</th>
               <th>Comprador</th>
               <th>Vendedor</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($ventas->count())  
              @foreach($ventas as $venta)  
              <tr>
                <td>{{$venta->monto}}</td>
                <td>{{$venta->comprador}}</td>
                <td>{{$venta->vendedor}}</td>

                <td><a class="btn btn-primary btn-xs" href="" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
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
</section> 
@endsection