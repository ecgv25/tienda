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
					<h3 class="panel-title">Editar Inventario de {{$inv->productos->nombre}}</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('inventario_update',$inv->id) }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="costoPetros">Cantidad</label>
										<input type="text" name="cantidad" id="cantidad" class="form-control input-sm" value="{{$inv->cantidad}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="costoPetros">Costo Divisa</label>
										<input type="text" name="costoDivisas" id="costoDivisas" class="form-control input-sm" value="{{$inv->costoDivisas}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="costoPetros">Ganancia (%)</label>	
										<input type="text" name="ganancia" id="ganancia" class="form-control input-sm" value="{{$inv->ganancia}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="costoPetros">Costo en Petros</label>	
										<input type="text" name="costoPetros" id="costoPetros" class="form-control input-sm" value="{{$inv->costoPetros}}">
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