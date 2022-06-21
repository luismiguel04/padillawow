@extends('layouts.app')

@section('template_title')
Provedor
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Provedor') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('provedors.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear Nuevo') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No Provedor</th>

                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($provedors as $provedor)


                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $provedor->user->name }}</td>
                                    <td>{{ $provedor->nombre }}</td>
                                    <td>{{ $provedor->direccion }}</td>
                                    <td>{{ $provedor->status }}</td>

                                    <td>
                                        <form action="{{ route('provedors.destroy',$provedor->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('provedors.show',$provedor->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('provedors.edit',$provedor->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $provedors->links() !!}
        </div>
    </div>
</div>
@endsection