<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $pago->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('provedor_id') }}
            {{ Form::text('provedor_id', $pago->provedor_id, ['class' => 'form-control' . ($errors->has('provedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Provedor Id']) }}
            {!! $errors->first('provedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuenta_id') }}
            {{ Form::text('cuenta_id', $pago->cuenta_id, ['class' => 'form-control' . ($errors->has('cuenta_id') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta Id']) }}
            {!! $errors->first('cuenta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $pago->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('referencia') }}
            {{ Form::text('referencia', $pago->referencia, ['class' => 'form-control' . ($errors->has('referencia') ? ' is-invalid' : ''), 'placeholder' => 'Referencia']) }}
            {!! $errors->first('referencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cliente') }}
            {{ Form::text('cliente', $pago->cliente, ['class' => 'form-control' . ($errors->has('cliente') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
            {!! $errors->first('cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('concepto') }}
            {{ Form::text('concepto', $pago->concepto, ['class' => 'form-control' . ($errors->has('concepto') ? ' is-invalid' : ''), 'placeholder' => 'Concepto']) }}
            {!! $errors->first('concepto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bl') }}
            {{ Form::text('bl', $pago->bl, ['class' => 'form-control' . ($errors->has('bl') ? ' is-invalid' : ''), 'placeholder' => 'Bl']) }}
            {!! $errors->first('bl', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contenedor') }}
            {{ Form::text('contenedor', $pago->contenedor, ['class' => 'form-control' . ($errors->has('contenedor') ? ' is-invalid' : ''), 'placeholder' => 'Contenedor']) }}
            {!! $errors->first('contenedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('factura') }}
            {{ Form::text('factura', $pago->factura, ['class' => 'form-control' . ($errors->has('factura') ? ' is-invalid' : ''), 'placeholder' => 'Factura']) }}
            {!! $errors->first('factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $pago->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('moneda') }}
            {{ Form::text('moneda', $pago->moneda, ['class' => 'form-control' . ($errors->has('moneda') ? ' is-invalid' : ''), 'placeholder' => 'Moneda']) }}
            {!! $errors->first('moneda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('obeservacion') }}
            {{ Form::text('obeservacion', $pago->obeservacion, ['class' => 'form-control' . ($errors->has('obeservacion') ? ' is-invalid' : ''), 'placeholder' => 'Obeservacion']) }}
            {!! $errors->first('obeservacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $pago->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>