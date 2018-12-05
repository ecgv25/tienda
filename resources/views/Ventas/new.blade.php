@extends('layouts.app')
@section('content_title', 'Ventas')
@section('javascripts')
<script>
$(document).ready(function () {
    $('#ventas-form').validate({
		focusInvalid: true,
		errorElement: "p",
		errorClass: "invalid",
		errorPlacement: function(error, element) {
    		error.insertAfter(element);
  		}, 
        rules: {
            comprador: {
                required: true
            },
			cedula: {
				required: true,
				digits: true,
				minlength: 5
			},
			tipoMoneda: {
				required: true
			}
        },
		messages: {
			comprador: "Debe indicar un comprador.",
			cedula: {
				required: "Debe indicar un numero de CI.",
				digits: "Solo puede ingresar numeros.",
				minlength: "La CI debe tener una cantidad mínima de 5 dígitos."
			},
			tipoMoneda: "Debe seleccionar un tipo de moneda."
		}
    });
});


function referenciaMoneda(selectObject) {
	var tipoMoneda = selectObject.value;  

	if(tipoMoneda != 'petro' && tipoMoneda != '') {

				$.ajax({
    				type: "GET",
					url: "{{ route('ajax_verificar_referencias_cryptos') }}",
					data: {
						tipoMoneda: tipoMoneda
					},
    				success: function(data) {
						var result = jQuery.parseJSON(data);
						
						$.each(result, function( index, value ) {            
							$.each(value, function( index1, value1 ) {        
								var referencia = parseFloat(60/value1).toFixed(6);          
								$('#referencia_crypto').val(referencia);
							});
						});
					}
  				});



	} else {
		$('#referencia_crypto').val(1);
	}
} 
</script>
@endsection

@section('content')
<div id="errorBox">

</div>

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
						<form id="ventas-form" method="POST"class="floating-labels m-t-20" action="{{ route('ventas_create') }}"  role="form">
							{{ csrf_field() }}

							<div class="row field_wrapper">
								<div class="col-xs-12 col-sm-12 col-md-12">

							    <div class="form-group"><h2>Datos del Comprador</h2></div>
									<div class="form-group">
											<label for="cedula">Cedula</label>
											<input type="text" name="cedula" id="cedula" class="form-control input-sm">
											<span class="bar"></span>
									</div>
									
							
									<div class="form-group">
											<label for="comprador">Nombre/Apellido</label>
											<input type="text" name="comprador" id="comprador" class="form-control input-sm">
											<span class="bar"></span>
									</div>
			   

							
                             <br> <br> <br>
							 <div class="form-group"> <h2>Tipo de Moneda</h2></div>
									<select name="tipoMoneda" id="tipoMoneda" onChange="referenciaMoneda(this);" class="form-control input-sm">
										<option value="" selected>Seleccione una opci&oacute;n</option>
										<option value="petro">Petro</option>
										<option value="btc">BitCoin (BTC)</option>
										<option value="eth">Ether (ETH)</option>
										<option value="ltc">Litecoin (LTC)</option>
										<option value="dash">Dash (DASH)</option>
									</select>	<span class="bar"></span> <br> <br>
									<input type="hidden" name="referencia_crypto" id="referencia_crypto">
								</div>
								</div>
								<div class="form-group"><h2>Productos</h2></div>
									
								<div id="inputsParaClonar_1">
									<div class="col-xs-5 col-sm-5 col-md-5">
										<div class="form-group">
											<select name="producto" id="producto" class="form-control input-sm">
												<option value="" selected>Seleccione una opci&oacute;n</option>
												@foreach ($productos as $producto)
													<option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
												@endforeach
											</select>	
											<span class="bar"></span>
											<input type="hidden" name="costo_producto" id="costo_producto">
										</div>
									</div>
									<div class="col-xs-5 col-sm-5 col-md-5">
										<div class="form-group">
											<label for="cantidad">Cantidad</label>
											<input type="text" name="cantidad" id="cantidad" class="form-control input-sm">
											<span class="bar"></span>
										</div>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2">
										<br>
										<a href="javascript:void(0);" id="add_button" title="Agregar">
											<i class="far fa-plus-square fa-2x"></i>
										</a>
										</div>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10">	
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
								<table class="table table-bordered table-striped ">
									<thead>
										<tr>
											<th>Total</th>
											
										</tr>
									</thead>
									<tbody class="costos_totales">

									</tbody>
								</table>
								<div id="hiddens"></div>
								</div>	
							</div>

						
						<div class="form-group m-t-20">
							<div class="col-12">
								<input type="submit"  value="Guardar" class="btn btn-outline-info">
								<a href="{{ route('ventas_index') }}" class="btn btn-outline-info" >Atrás</a>
							</div>
						</div>
						 
						</form>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		var _globales = {
				  x: 1,
				  totalVentas: 0
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
				_globales.totalVentas = costoTotal + _globales.totalVentas;
				
			

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
						html += costoTotal.toFixed(6);
					html += '</td>';
					html += '<td>';
						html += '<a href="javascript:void(0);" onClick="remove(\''+_globales.x+'\')"><i class="far fa-minus-square fa-2x"></i></a>';
					html += '</td>';
					html += '</tr>';
					
				$('.productos_comprados').append(html);
				

				var htmltotal  = '<tr id="costoTotales_'+_globales.x+'">';
				htmltotal += '<tr>';
				htmltotal += '<td>';
				htmltotal += _globales.totalVentas.toFixed(6);
				htmltotal += '</td>';
				htmltotal += '</tr>';
					$('.costos_totales').html(htmltotal);  
				
				var htmlHiddens  = '<div id="producto_hidden_'+_globales.x+'">';
					htmlHiddens += '<input type="hidden" name="productos_hidden[]" value="'+productoId+'">';
					htmlHiddens += '<input type="hidden" name="cantidades_hidden[]" value="'+cantidad+'">';
					htmlHiddens += '<input type="hidden" name="costos_unitarios_hidden[]" value="'+costoRealProducto+'">';
					htmlHiddens += '<input type="hidden" name="costos_totales_hidden[]" value="'+costoTotal+'">';
					htmlHiddens += '</div>';
				
				$('#hiddens').append(htmlHiddens);
				

				_globales.x = _globales.x +1;
				$('#producto').val('');
				$('#cantidad').val('');
				$('#costo_producto').val('');
			});
			
 
		});
	
		function remove(i) {
			var valorEliminar = $('#producto_'+i+' td:nth-child(4)').text();
			_globales.totalVentas = _globales.totalVentas - parseFloat(valorEliminar);

			var htmltotal  = '<tr id="costoTotales_'+_globales.x+'">';
				htmltotal += '<tr>';
				htmltotal += '<td>';
				htmltotal += _globales.totalVentas.toFixed(6);
				htmltotal += '</td>';
				htmltotal += '</tr>';
			$('.costos_totales').html(htmltotal); 


			$('#producto_'+i).remove(); 
			$('#producto_hidden_'+i).remove();
			//_globales.x--;
			return false;
		}
	</script>
@endsection