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
					<h3 class="panel-title">Nueva Venta</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('ventas_create') }}"  role="form">
							{{ csrf_field() }}

							<div class="row field_wrapper">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<label for="tipoMoneda">Tipo de Moneda</label>
									<select name="tipoMoneda" id="tipoMoneda" class="form-control input-sm">
										<option value="" selected>Seleccione una opci&oacute;n</option>
										<option value="petro">Petro</option>
										<option value="btc">BitCoin (BTC)</option>
										<option value="eth">Ether (ETH)</option>
										<option value="ltc">Litecoin (LTC)</option>
										<option value="dash">Dash (DASH)</option>
									</select>
									<input type="hidden" name="referencia_crypto" id="referencia_crypto">
								</div>
								

								<div id="inputsParaClonar_1">
									<div class="col-xs-5 col-sm-5 col-md-5">
										<div class="form-group">
											<label for="producto">Producto</label>
											<select name="producto" id="producto" class="form-control input-sm">
												<option value="" selected>Seleccione una opci&oacute;n</option>
												@foreach ($productos as $producto)
													<option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
												@endforeach
											</select>
											<input type="hidden" name="costo_producto" id="costo_producto">
										</div>
									</div>
									<div class="col-xs-5 col-sm-5 col-md-5">
										<div class="form-group">
											<label for="cantidad">Cantidad</label>
											<input type="text" name="cantidad" id="cantidad" class="form-control input-sm" placeholder="Cantidad">
										</div>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2">
										<br>
										<a href="javascript:void(0);" id="add_button" title="Agregar">
											<i class="far fa-plus-square fa-2x"></i>
										</a>
									</div>
								</div>
							</div>
                          

							<div class="row">
								<table class="table table-bordered table-striped ">
									<thead>
										<tr>
											<th>Producto</th>
											<th>Cant</th>
											<th>Costo Unitario</th>
											<th>Total</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody class="productos_comprados">

									</tbody>
								</table>
								<div id="hiddens"></div>
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
		var _globales = {
				  x: 1
		};

		$(document).ready(function(){
			$('#producto').change(function(){
				$.ajax({
    				type: "GET",
    				url: "{{ route('ajax_ventas_costo_producto') }}",
    				data: {'id': $(this).val(),
           			},
    				success: function(data) {
						if(data.producto == null) {
							alert(data.message);
							$('#producto').val('');
							$('#cantidad').val('');
							$('#costo_producto').val('');
						} else {
							$('#costo_producto').val(data.producto.costoPetros);
						}
					}
  				});
			});

		

			var wrapper		= $('.field_wrapper'); //Input field wrapper
			var add_button	= $("#add_button"); //Add button ID
			
			$(add_button).click(function(){
				var productoId = $('#producto option:selected').val();
				var nombreProducto = $('#producto option:selected').text();
				var cantidad = $('#cantidad').val();
				var costoProducto = $('#costo_producto').val();
				var referenciaCrypto = $('#referencia_crypto').val();
				var costoRealProducto = (costoProducto * referenciaCrypto);
				var costoTotal = cantidad * costoRealProducto;

				var html  = '<tr id="producto_'+_globales.x+'">';
					html += '<td>';
						html += nombreProducto;
					html += '</td>';
					html += '<td>';
						html += cantidad;
					html += '</td>';
					html += '<td>';
						html += costoRealProducto;
					html += '</td>';
					html += '<td>';
						html += costoTotal;
					html += '</td>';
					html += '<td>';
						html += '<a href="javascript:void(0);" onClick="remove(\''+_globales.x+'\')"><i class="far fa-minus-square fa-2x"></i></a>';
					html += '</td>';
					html += '</tr>';

				$('.productos_comprados').append(html);
				
				$('#hiddens').append('<input type="hidden" name="productos_hidden[]" value="'+productoId+'">');
				$('#hiddens').append('<input type="hidden" name="cantidades_hidden[]" value="'+cantidad+'">');
				$('#hiddens').append('<input type="hidden" name="costos_unitarios_hidden[]" value="'+costoRealProducto+'">');
				$('#hiddens').append('<input type="hidden" name="costos_totales_hidden[]" value="'+costoTotal+'">');
				
				
				

				_globales.x = _globales.x +1;
				$('#producto').val('');
				$('#cantidad').val('');
				$('#costo_producto').val('');
			});
			
 
		});
	
		function remove(i) {
			$('#producto_'+i).remove(); 
			_globales.x--;
			return false;
		}
	</script>

	<script>

		$('#tipoMoneda').change(function(){
			var tipoMoneda = $(this).val();
		
			if(tipoMoneda != 'petro') {
				if(tipoMoneda == 'btc') {
					var urlApi = "https://min-api.cryptocompare.com/data/pricehistorical?fsym=BTC&tsyms=USD";
				} else if (tipoMoneda == 'eth') {
					var urlApi = "https://min-api.cryptocompare.com/data/pricehistorical?fsym=ETH&tsyms=USD";
				} else if (tipoMoneda == 'ltc') {
					var urlApi = "https://min-api.cryptocompare.com/data/pricehistorical?fsym=LTC&tsyms=USD";
				} else if (tipoMoneda == 'dash') { 
					var urlApi = "https://min-api.cryptocompare.com/data/pricehistorical?fsym=DASH&tsyms=USD";
				}

				$.ajax({
					type: "GET",
					url: urlApi  
				}).then(function(data) {
					$.each(data, function( index, value ) {            
						$.each(value, function( index1, value1 ) {        
							var referencia = parseFloat(60/value1).toFixed(6);             
							$('#referencia_crypto').val(referencia);
						});
					});           
				});
			} else {
				$('#referencia_crypto').val(1);
			}
		}); 
	</script>
@endsection