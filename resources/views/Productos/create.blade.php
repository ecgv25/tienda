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
						<form method="POST" class="floating-labels m-t-20" action="{{ route('productos_store') }}"  role="form">
							{{ csrf_field() }}

 							<div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input id="nombre" type="text" class="text-capitalize form-control" name="nombre" value="" required>
                                            <span class="bar"></span>
                                            <label for="nombres">Nombre</label>

                                            <div class="form-control-feedback">
                                            </div>
                                        </div>
                                    </div>

 							</div>

							<div class="row">
                			
								<div class="col-6">
									<div class="form-group">
											<input id="codigo" type="text" class="text-capitalize form-control" name="codigo" value="">
											<span class="bar"></span>
											<label for="codigo">Codigo</label>	
											<div class="form-control-feedback">
											</div>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
									<input id="descripcion" type="text" class="text-capitalize form-control" name="descripcion" value="" required>

									<span class="bar"></span>
									<label for="descripcion">Descripción</label>	
									<div class="form-control-feedback">
											</div>

									</div>
								</div>
							</div>
 
						
							
						<div class="row">
							<div class="form-group m-t-20">
								<div class="col-12">
									<a href="{{ route('productos_index') }}" class="btn btn-outline-info" >Atrás</a>
									<input type="submit"  value="Registrar" class="btn btn-outline-info">

								</div>
                   			</div>
 						 </div>
						</form>
					</div>
				
 
			</div>

	@endsection