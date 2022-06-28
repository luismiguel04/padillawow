@extends('layouts.app')

@section('template_title')
Pagos pendientes
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Pago pendientes') }}
                        </span>

                        <div class="float-right">
                            <a href="creates" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                {{-- <div class="row">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Usuario </th>
                                    <th>Provedor</th>
                                    <th>Cuenta</th>
                                    <th>Fecha</th>
                                    <th>Referencia</th>
                                    <th>Cliente</th>
                                    <th>Concepto</th>
                                    <th>Bl</th>
                                    <th>Contenedor</th>
                                    <th>Factura</th>
                                    <th>Factura PDF</th>
                                    <th>Cantidad</th>
                                    <th>Moneda</th>
                                    <th>Obeservacion</th>
                                    <th>Status</th>
                                    <th>Obeservacion de revisión</th>



                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $pago->user->name }}</td>
                                    <td>{{ $pago->provedor->nombre }}</td>
                                    <td>{{ $pago->cuenta->cuenta." ".$pago->cuenta->observaciones }}</td>
                                    <td>{{ $pago->fecha }}</td>
                                    <td>{{ $pago->referencia }}</td>
                                    <td>{{ $pago->cliente }}</td>
                                    <td>{{ $pago->concepto }}</td>
                                    <td>{{ $pago->bl }}</td>
                                    <td>{{ $pago->contenedor }}</td>
                                    <td>{{ $pago->factura }}</td>
                                    <td><a target="_blank" href="{{('vpagos/'). $pago->pago_path}}">PDF</a></td>
                                    <td><strong>$</strong>{{ $pago->cantidad }}</td>
                                    <td>{{ $pago->moneda }}</td>
                                    <td>{{ $pago->obeservacion }}</td>
                                    <td>{{ $pago->status }}</td>
                                    <td>{{ $pago->obeservacionderev }}</td>


                                    <td>
                                        <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST"
                                            class="formEliminar">
                                            <a class=" btn btn-sm btn-primary "
                                                href=" {{ route('pagos.show',$pago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success" href="edits/{{$pago->id}}"><i
                                                    class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
            {!! $pagos->links() !!}
        </div>
    </div>
</div>

<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Pago pagados') }}
                        </span>


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
                                    <th>No</th>

                                    <th>Usuario </th>
                                    <th>Provedor</th>
                                    <th>Cuenta</th>
                                    <th>Fecha</th>
                                    <th>Referencia</th>
                                    <th>Cliente</th>
                                    <th>Concepto</th>
                                    <th>Bl</th>
                                    <th>Contenedor</th>
                                    <th>Factura</th>
                                    <th>Cantidad</th>
                                    <th>Moneda</th>

                                    <th>Status</th>


                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagosp as $pago)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $pago->user->name }}</td>
                                    <td>{{ $pago->provedor->nombre }}</td>
                                    <td>{{ $pago->cuenta->cuenta." ".$pago->cuenta->observaciones }}</td>
                                    <td>{{ $pago->fecha }}</td>
                                    <td>{{ $pago->referencia }}</td>
                                    <td>{{ $pago->cliente }}</td>
                                    <td>{{ $pago->concepto }}</td>
                                    <td>{{ $pago->bl }}</td>
                                    <td>{{ $pago->contenedor }}</td>
                                    <td>{{ $pago->factura }}</td>
                                    <td><strong>$</strong>{{ $pago->cantidad }}</td>
                                    <td>{{ $pago->moneda }}</td>

                                    <td>{{ $pago->status }}</td>

                                    <td>
                                        <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('pagos.show',$pago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success" href="edits/{{$pago->id}}"><i
                                                    class="fa fa-fw fa-edit"></i> Editar</a>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $pagos->links() !!}
        </div>
    </div>
</div>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Pagos Cancelados') }}
                        </span>


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
                                    <th>No</th>

                                    <th>Usuario </th>
                                    <th>Provedor</th>
                                    <th>Cuenta</th>
                                    <th>Fecha</th>
                                    <th>Referencia</th>
                                    <th>Cliente</th>
                                    <th>Concepto</th>
                                    <th>Bl</th>
                                    <th>Contenedor</th>
                                    <th>Factura</th>
                                    <th>Cantidad</th>
                                    <th>Moneda</th>
                                    <th>Obeservacion</th>
                                    <th>Status</th>


                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagosc as $pago)
                                $pagos = [];
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $pago->user->name }}</td>
                                    <td>{{ $pago->provedor->nombre }}</td>
                                    <td>{{ $pago->cuenta->cuenta."".$pago->cuenta->observaciones }}</td>
                                    <td>{{ $pago->fecha }}</td>
                                    <td>{{ $pago->referencia }}</td>
                                    <td>{{ $pago->cliente }}</td>
                                    <td>{{ $pago->concepto }}</td>
                                    <td>{{ $pago->bl }}</td>
                                    <td>{{ $pago->contenedor }}</td>
                                    <td>{{ $pago->factura }}</td>
                                    <td><strong>$</strong>{{ $pago->cantidad }}</td>
                                    <td>{{ $pago->moneda }}</td>
                                    <td>{{ $pago->obeservacion }}</td>
                                    <td>{{ $pago->status }}</td>

                                    <td>
                                        <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('pagos.show',$pago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>


                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $pagos->links() !!}
        </div>
    </div>
</div>
<script>
(function() {
    'use strict'
    var forms = document.querySelectorAll('.formEliminar')

    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {

                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: 'Eliminar pago',
                    text: "Esta seguro de eliminar el pago!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar registro!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire(
                            'Borrado!',
                            'TÚ pago ha sido borrado.',
                            'exitosamente'
                        )
                    }
                })
            }, false)
        })
})()
</script>

@endsection


<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script type="text/javascript">
var data = @json($pagos);

$(document).ready(function() {
    $('#example').DataTable({
        "data": data,
        "pageLength": 100,
        "order": [
            [0, "desc"]
        ],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar MENU registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del START al END de un total de TOTAL registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de MAX registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        responsive: true,
        // dom: 'Bfrtip',
        dom: '<"col-xs-3"l><"col-xs-5"B><"col-xs-4"f>rtip',
        buttons: [
            'copy', 'excel',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LETTER',
            }

        ]
    })

});


jQuery.extend(jQuery.fn.dataTableExt.oSort, {
    "portugues-pre": function(data) {
        var a = 'a';
        var e = 'e';
        var i = 'i';
        var o = 'o';
        var u = 'u';
        var c = 'c';
        var special_letters = {
            "Á": a,
            "á": a,
            "Ã": a,
            "ã": a,
            "À": a,
            "à": a,
            "É": e,
            "é": e,
            "Ê": e,
            "ê": e,
            "Í": i,
            "í": i,
            "Î": i,
            "î": i,
            "Ó": o,
            "ó": o,
            "Õ": o,
            "õ": o,
            "Ô": o,
            "ô": o,
            "Ú": u,
            "ú": u,
            "Ü": u,
            "ü": u,
            "ç": c,
            "Ç": c
        };
        for (var val in special_letters)
            data = data.split(val).join(special_letters[val]).toLowerCase();
        return data;
    },
    "portugues-asc": function(a, b) {
        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    },
    "portugues-desc": function(a, b) {
        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    }
});
//"columnDefs": [{ type: 'portugues', targets: "_all" }],
</script>