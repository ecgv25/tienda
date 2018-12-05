@extends('layouts.app')

@section('htmlheader_title', 'Productos')

@section('content_title', 'Productos')

@section('content')

			@if(Session::has('success'))

      <div class="alert alert-info alert-dismissable col-10">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
				{{Session::get('success')}}
			</div>
			@endif
 
  <div class="card">
      <div class="card-body">
            <h4 class="card-title">
                Listado de Productos
            </h4>
            <div class="pull-right">  
            <div class="btn-group">
            
            <a href="{{ route('productos_create') }}" class="btn btn-outline-info btn-lg">
                                Registrar Producto
                            </a>
                </div>
          </div>
          </div>
           <div class="table-responsive">
              <table class="table table-hover">
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
              @if($productos->count() > 1)  
              
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
              
                <td colspan="8"> <div class="alert alert-danger">No hay productos registrados !! </div></td>
               
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
                
        </div>
          
        </div>
       
      <div class="col col-lg-1"> {{ $productos->links() }}</div>
	</div>
@endsection