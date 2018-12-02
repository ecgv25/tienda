@extends('layouts.layout')

@section('htmlheader_title', 'Productos')

@section('content_title', 'Productos')

@section('content')
  <div class="card">
      <div class="card-body">
            <h4 class="card-title">
                Listado de Productos
            </h4>
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
          <div class="alert alert-danger">
                    	Aún no ha registrado ningun producto.
                    </div>
                    <div class="form-group m-t-40">
                        <div class="col-12">
                            <a href="{{ route('productos_create') }}" class="btn btn-outline-info">
                                Registrar Producto
                            </a>
                        </div>
                    </div>
                </div>
          	</div>
        </div>
      <div class="col col-lg-1"></div>
	</div>
@endsection