<div id="legal" style="display: none">
    <div class="form-group{{ $errors->has('rif') ? ' has-danger has-error' : '' }}">
        <input id="rif" type="text" class="form-control rif-mask{{ $errors->has('rif') ? ' form-control-danger' : '' }}" name="rif" value="{{ old('rif') }}" required>
        <span class="bar"></span>
        <label for="rif">{{ __('Rif') }}</label>

        @if ($errors->has('rif'))
        <div class="form-control-feedback">
            <small>{{ $errors->first('rif') }}</small>
        </div>
        @endif
    </div>

    <div class="form-group{{ $errors->has('razon_social') ? ' has-danger has-error' : '' }}">
        <input id="razon_social" type="text" class="form-control{{ $errors->has('razon_social') ? ' form-control-danger' : '' }}" name="razon_social" value="{{ old('razon_social') }}" required>
        <span class="bar"></span>
        <label for="razon_social">{{ __('Business Name') }}</label>

        @if ($errors->has('razon_social'))
        <div class="form-control-feedback">
            <small>{{ $errors->first('razon_social') }}</small>
        </div>
        @endif
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <h5>{{ __('Address') }}</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group{{ $errors->has('id_estado') ? ' has-danger has-error' : '' }}">
                {{ Form::select('id_estado', $estados, old('id_estado'), ['class' => 'form-control estado-get' . ($errors->has('id_estado')?' form-control-danger':'')]) }}
                <span class="bar"></span>
                <label for="id_estado">{{ __('State') }}</label>

                @if ($errors->has('id_estado'))
                <div class="form-control-feedback">
                    <small>{{ $errors->first('id_estado') }}</small>
                </div>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="form-group{{ $errors->has('id_municipio') ? ' has-danger has-error' : '' }}">
                {{ Form::select('id_municipio', [0 => 'Seleccione...'], old('id_municipio'), ['class' => 'form-control municipio-get' . ($errors->has('id_municipio')?' form-control-danger':'')]) }}
                <span class="bar"></span>
                <label for="id_municipio">{{ __('Municipality') }}</label>

                @if ($errors->has('id_municipio'))
                <div class="form-control-feedback">
                    <small>{{ $errors->first('id_municipio') }}</small>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group{{ $errors->has('id_parroquia') ? ' has-danger has-error' : '' }}">
                {{ Form::select('id_parroquia', [0 => 'Seleccione...'], old('id_parroquia'), ['class' => 'form-control parroquia-get' . ($errors->has('id_parroquia')?' form-control-danger':'')]) }}
                <span class="bar"></span>
                <label for="id_parroquia">{{ __('Parish') }}</label>

                @if ($errors->has('id_parroquia'))
                <div class="form-control-feedback">
                    <small>{{ $errors->first('id_parroquia') }}</small>
                </div>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="form-group{{ $errors->has('calle_avenida') ? ' has-danger has-error' : '' }}">
                <input id="calle_avenida" type="text" class="form-control{{ $errors->has('calle_avenida') ? ' form-control-danger' : '' }}" name="calle_avenida" value="{{ old('calle_avenida') }}" required>
                <span class="bar"></span>
                <label for="calle_avenida">{{ __('Street / Avenue') }}</label>

                @if ($errors->has('calle_avenida'))
                <div class="form-control-feedback">
                    <small>{{ $errors->first('calle_avenida') }}</small>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group{{ $errors->has('sector_urbanizacion') ? ' has-danger has-error' : '' }}">
                <input id="sector_urbanizacion" type="text" class="form-control{{ $errors->has('sector_urbanizacion') ? ' form-control-danger' : '' }}" name="sector_urbanizacion" value="{{ old('sector_urbanizacion') }}" required>
                <span class="bar"></span>
                <label for="sector_urbanizacion">{{ __('Sector / Urbanization') }}</label>

                @if ($errors->has('sector_urbanizacion'))
                <div class="form-control-feedback">
                    <small>{{ $errors->first('sector_urbanizacion') }}</small>
                </div>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="form-group{{ $errors->has('casa_apto') ? ' has-danger has-error' : '' }}">
                <input id="casa_apto" type="text" class="form-control{{ $errors->has('casa_apto') ? ' form-control-danger' : '' }}" name="casa_apto" value="{{ old('casa_apto') }}" required>
                <span class="bar"></span>
                <label for="casa_apto">{{ __('House / Apartment') }}</label>

                @if ($errors->has('casa_apto'))
                <div class="form-control-feedback">
                    <small>{{ $errors->first('casa_apto') }}</small>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group{{ $errors->has('telefono_fijo_empresa') ? ' has-danger has-error' : '' }}">
                <input id="telefono_fijo_empresa" type="telefono_fijo_empresa" class="fijo-mask form-control{{ $errors->has('telefono_fijo_empresa') ? ' form-control-danger' : '' }}" name="telefono_fijo_empresa" value="{{ old('telefono_fijo_empresa') }}" required>
                <span class="bar"></span>
                <label for="telefono_fijo_empresa">{{ __('Landline') }}</label>

                @if ($errors->has('telefono_fijo_empresa'))
                <div class="form-control-feedback">
                    <small>{{ $errors->first('telefono_fijo_empresa') }}</small>
                </div>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="form-group{{ $errors->has('correo_empresa') ? ' has-danger has-error' : '' }}">
                <input id="correo_empresa" type="email" class="form-control{{ $errors->has('correo_empresa') ? ' form-control-danger' : '' }}" name="correo_empresa" value="{{ old('correo_empresa') }}" required>
                <span class="bar"></span>
                <label for="correo_empresa">{{ __('E-Mail Address') }}</label>

                @if ($errors->has('correo_empresa'))
                <div class="form-control-feedback">
                    <small>{{ $errors->first('correo_empresa') }}</small>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-xs-12">
            <h5>{{ __('Legal Representative') }}</h5>
        </div>
    </div>
</div>