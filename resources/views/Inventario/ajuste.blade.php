@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
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
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Ajuste de Inventario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('inventario_retirar') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="idProducto">Producto</label>
											<select name="idProducto" id="idProducto" class="form-control input-sm">
												<option value="" selected>Seleccione una opci&oacute;n</option>
												@foreach ($productos as $producto)
													<option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
												@endforeach
											</select>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="producto">Cantidad</label>
										<input type="text" name="cantidad" id="cantidad" class="form-control input-sm" placeholder="cantidad">
									</div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="producto">Observacion</label>
										<input type="text" name="observacion" id="observacion" class="form-control input-sm" placeholder="observacion">
									</div>
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