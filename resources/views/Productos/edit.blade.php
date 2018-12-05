@extends('layouts.app')
@section('content_title', 'Modificar  Producto')
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
					<form method="POST" class="floating-labels m-t-20" action="{{ route('producto_update',$producto->id) }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$producto->nombre}}">
										<span class="bar"></span>
										<label for="nombres">Nombre</label>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="codigo" id="codigo" class="form-control input-sm" value="{{$producto->codigo}}">
										<label for="nombres">Codigo</label>
										<span class="bar"></span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="descripcion" id="descripcion" class="form-control input-sm" value="{{$producto->descripcion}}">
									    <label for="nombres">Descripcion</label>
										<span class="bar"></span>
									</div>
								</div>
							</div>
 						<div class="row">
							<div class="form-group m-t-20">
								<div class="col-12">
									
									<input type="submit"  value="Guardar" class="btn btn-outline-info">
									<a href="{{ route('productos_index') }}" class="btn btn-outline-info" >Atrás</a>

								</div>
                   			</div>
 						 </div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection