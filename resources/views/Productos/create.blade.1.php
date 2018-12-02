@extends('layouts.app')
@section('content_title', 'Registro de Producto')
@section('content')

			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="card">

    			<div class="card-body">
						<form method="POST" action="{{ route('productos_store') }}"  role="form">
							{{ csrf_field() }}
						
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="idProducto">Nombre</label>	
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del Producto">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="codigo">Codigo</label>	

										<input type="text" name="codigo" id="codigo" class="form-control input-sm" placeholder="Codigo">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="descripcion">Descripcion</label>	

										<input type="text" name="descripcion" id="descripcion" class="form-control input-sm" placeholder="Descripcion">
									</div>
								</div>
						<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('productos_index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection