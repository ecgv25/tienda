@extends('layouts.app')
@section('content_title', 'Ajuste de Inventario')
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
						<form method="POST" class="floating-labels m-t-20" action="{{ route('inventario_retirar') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="idProducto">Producto</label>
											<select name="idProducto" id="idProducto" class="form-control input-sm">
												<option value="" selected></option>
												@foreach ($productos as $producto)
													<option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
												@endforeach
											</select>
											<span class="bar"></span>

									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="producto">Cantidad</label>
										<input type="text" name="cantidad" id="cantidad" class="form-control input-sm">
										<span class="bar"></span>
									</div>	
									</div>
							
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="producto">Observacion</label>

										<textarea class="form-control" rows="5" id="comment" name="observacion" id="observacion" class="form-control input-sm"></textarea>
										<span class="bar"></span>
									</div>
								</div>
				
							</div>
 
						
							
						

						<div class="row">
							<div class="form-group m-t-20">
								<div class="col-12">
									<a href="{{ route('inventario_index') }}" class="btn btn-outline-info" >Atrás</a>
									<input type="submit"  value="Registrar" class="btn btn-outline-info">
									

								</div>
                   			</div>
 						 </div>
						</form>
					</div>
				</div>
 
	
		</div>
	</section>
	@endsection