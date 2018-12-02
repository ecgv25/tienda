@extends('layouts.app')
@section('content_title', 'Ingresar Producto al Inventario')
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
 		<div class="card">
			<div class="card-body">		
						<form method="POST" class="floating-labels m-t-20" action="{{ route('inventario_store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="idProducto">Producto</label>
											<select name="idProducto" id="idProducto" class="form-control input-sm" required>
												<option value="" selected>Seleccione una opci&oacute;n</option>
												@foreach ($productos as $producto)
													<option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
												@endforeach
											</select>
											<span class="bar"></span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="cantidad">Cantidad</label>
										<input type="text" name="cantidad" id="cantidad" class="form-control input-sm" required >
									   	<span class="bar"></span>
									</div>
								</div>
								
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="costoDivisas">Divisas</label>
										<input type="text" name="costoDivisas" id="costoDivisas" class="form-control input-sm" required>
										<span class="bar"></span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="ganancia">Ganancia (%)</label>
										<input type="text" name="ganancia" id="ganancia" class="form-control input-sm" required>
										<span class="bar"></span>

									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="costoPetros">Costo en Petros</label>	
										<input type="text" name="costoPetros" id="costoPetros" class="form-control input-sm" required>
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
		</div>
	</section>

	<script type="text/javascript">
	$(function(){
		$('#costoDivisas, #ganancia').keyup(function(){
			var costoDivisa = parseFloat($('#costoDivisas').val());
			var porcentajeGanancia = parseFloat($('#ganancia').val());
			var valorPetroDolar = 60;

			if(isNaN(parseFloat(costoDivisa)) == false && isNaN(parseFloat(porcentajeGanancia)) == false) {
				var ganancia = (costoDivisa*(porcentajeGanancia/100));
				var totalCosto = costoDivisa + ganancia;
				var costoPetro = totalCosto / valorPetroDolar;

				$('#costoPetros').val(costoPetro.toFixed(8));
			}
		});
	});
	</script>
	@endsection

			