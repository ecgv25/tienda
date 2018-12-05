@extends('layouts.app')

@section('htmlheader_title', 'Lista de Obsequios')

@section('content_title', 'Lista de Obsequios')

@section('content')
<div class="row justify-content-md-center">
      
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('obsequios_new') }}" class="btn btn-outline-info btn-lg" >Obsequiar</a>
            </div>
            <div class="btn-group">
            
            <a href="{{ route('obsequios_export') }}" class="btn btn-outline-info btn-lg">Descargar Obsequios en Excel </a>
                </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>N</th>
               <th>Cantidad de Productos</th>
               <th>Nombre Autoriza</th>
               <th>Cedula Autoriza</th>
               <th>Nombre Recibe</th>  
               <th>Fecha</th> 
               <th>Editar</th>
               <!--th>Eliminar</th-->
             </thead>
             <tbody>
             <?php $i= 1; ?> 
              @if($obsequios->count())  
              @foreach($obsequios as $obsequio)  
              <tr>
                <td>{{$i}}</td>
                <td>{{$obsequio->cantidad}}</td>
                <td>{{$obsequio->nameAutoriza}}</td>
                <td>{{$obsequio->cedulaAutoriza}}</td>
                <td>{{$obsequio->nameRecibe}}</td>

                <td>{{$obsequio->created_at->format('d/m/Y')}}</td>

                <td><a class="btn btn-primary btn-xs" href="#" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
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

    </div>
  </div>
</div> 
@endsection