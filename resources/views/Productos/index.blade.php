@extends('layouts.layout')

@section('htmlheader_title', 'Lista productos')

@section('content_title', 'Lista productos')

@section('content')
<div class="row justify-content-md-center">
      
        <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
     
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('productos_create') }}" class="btn btn-info" >Añadir Producto</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
             <th>N</th>
               <th>Nombre</th>
               <th>Descripcion</th>
               <th>Codigo</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
             <?php $i= 1; ?>
              @if($productos->count())  
              @foreach($productos as $producto)  
              <tr>
              <td>{{$i}}</td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->codigo}}</td>

                <td><a class="btn btn-primary btn-xs" href="{{action('ProductosController@edit', $producto->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ProductosController@destroy', $producto->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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
      {{ $productos->links() }}
    </div>
  </div>
</section>
 
@endsection