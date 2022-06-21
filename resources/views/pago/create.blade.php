@extends('layouts.app')

@section('template_title')
    Create Pago
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Pago</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pagos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pago.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('_categoria').addEventListener('change',(e)=>{
        fetch('cuentas',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Elegir</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].cuenta+data.lista[i].observaciones+'</option>';
            }
            document.getElementById("_subcategoria").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })  



</script>
@endsection

