@extends('templates.base_admin')

@section('titulo')
    {{ 'Proyecto Galería' }}
@endsection


<!--establecemos nuestra navegación y añadimos otro elemento-->
@section('navegacion')
    <!--heredamos con parent lo que hay en la plantilla base
	pero añadimos otro elemento al menú-->
    @parent
    <li><a href="#">Otro enlace</a></li>
@endsection


@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in! {{ Auth::user()->username }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection