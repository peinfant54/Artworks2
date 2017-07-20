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
        <h1>Aceeso Otorgado</h1>
        <p>Useted ha sido registrado</p>

    </div>

@endsection