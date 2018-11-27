@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Inventario de producto </h3></div>
          
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('inventario_new') }}" class="btn btn-info" >Añadir Producto al Inventario</a>
            </div>
            <div class="btn-group">
              <a href="{{ route('inventario_ajuste') }}" class="btn btn-danger" >Ajuste de Producto del Inventario</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Producto</th>
               <th>Cantidad</th>
               <th>Costo Divisas</th>
               <th>Precio de Venta (Petro)</th>

               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($inventario->count())  
              @foreach($inventario as $inv)  
              <tr>
                <td>{{$inv->nombre}}</td>
                <td>{{$inv->cantidad}}</td>
                <td>{{$inv->costoPetros}}</td>
                <td>{{$inv->codigo}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('InventarioController@edit', $inv->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('InventarioController@destroy', $inv->id)}}" method="post">
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

    </div>
  </div>
</section>
 
@endsection