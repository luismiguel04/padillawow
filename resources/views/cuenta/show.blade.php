@extends('layouts.app')

@section('template_title')
    {{ $cuenta->name ?? 'Show Cuenta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cuenta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuentas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $cuenta->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Provedor Id:</strong>
                            {{ $cuenta->provedor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Banco:</strong>
                            {{ $cuenta->banco }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursal:</strong>
                            {{ $cuenta->sucursal }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $cuenta->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Cuenta:</strong>
                            {{ $cuenta->cuenta }}
                        </div>
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $cuenta->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Swifts:</strong>
                            {{ $cuenta->swifts }}
                        </div>
                        <div class="form-group">
                            <strong>Aba:</strong>
                            {{ $cuenta->aba }}
                        </div>
                        <div class="form-group">
                            <strong>Moneda:</strong>
                            {{ $cuenta->moneda }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $cuenta->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $cuenta->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
