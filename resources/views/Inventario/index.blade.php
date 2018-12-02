@extends('layouts.app')

@section('htmlheader_title', 'Inventario de producto')

@section('content_title', 'Inventario de producto')

@section('content')
<div class="row justify-content-md-center">
      
        <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
     
  
          
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('inventario_new') }}" class="btn  btn-sm btn-info" >Añadir Producto al Inventario</a>
            </div>
            <div class="btn-group">
              <a href="{{ route('inventario_ajuste') }}" class="btn  btn-sm btn-danger" >Ajuste de Producto del Inventario</a>
            </div>
            <div class="btn-group">
            
            <a href="{{ route('inventario_export') }}" class="btn btn-sm btn-primary">Descargar Inventario en Excel </a>
                </div>
          </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>N</th> 
               <th>Producto</th>
               <th>Cantidad</th>
               <th>Costo Divisas</th>
               <th>Ganancia %</th>
               <th>Precio de Venta PTR [CD+(CD*%G))/60]</th>
               <th>Editar</th>
               <!--th>Eliminar</th-->
             </thead>
             <tbody>
             <?php $i= 1; ?>
              @if($inventario->count())  
              @foreach($inventario as $inv)  
              <tr>
                <td>{{$i}}</td>
                <td>{{$inv->productos->nombre}}</td>
                <td>{{$inv->cantidad}}</td>
                <td>{{$inv->costoDivisas}}</td> 
                <td>{{$inv->ganancia}} </td> 
                <td>{{$inv->costoPetros}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('InventarioController@edit', $inv->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <!--td>
                  <form action="{{action('InventarioController@destroy', $inv->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td-->
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

    </div>
  </div>
</section>
 
@endsection