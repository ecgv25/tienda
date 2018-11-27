@extends('layouts.app')

@section('htmlheader_title', 'Inicio')

@section('content_title', '')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tablero
        </h3>
    </div>
        <div class="card-body">
            <div class="row"> 
                <div class="col col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card bg-rim  bg-lg" style="box-shadow: unset;">
                        <div class="card-body">
                            <div class="row mt-5">
                                <div class="col col-7">
                                    <div class="card-monto">
                                        <h5 class="card-title text-white">
                                    
                                        </h5>
                                    </div>
                                </div>
                                <div class="col col-5">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card bg-casa-int  bg-lg" style="box-shadow: unset;">
                        <div class="card-body">
                            <div class="row mt-5">
                                <div class="col col-7">
                                    <div class="card-monto">
                                        <h5 class="card-title text-white">
                                    
                                        </h5>
                                    </div>
                                </div>
                                <div class="col col-5">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card bg-pro-des  bg-lg" style="box-shadow: unset;">
                        <div class="card-body">
                            <div class="row mt-5">
                                <div class="col col-7">
                                    <div class="card-monto">
                                        <h5 class="card-title text-white">
                                    
                                        </h5>
                                    </div>
                                </div>
                                <div class="col col-5">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
        </div>
</div>
    
@endsection