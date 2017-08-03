@extends('templates.base_admin')

@section('titulo')
    {{ $title }}
@endsection

<!--establecemos nuestra navegación y añadimos otro elemento-->
@section('navegacion')
    <!--heredamos con parent lo que hay en la plantilla base
	pero añadimos otro elemento al menú-->
    @parent
    <li><a href="#">Otro enlace</a></li>

    @foreach ($modulos as $user)
        <li><a href="{{ URL::to($user->links) }}">{{ $user->name }}</a></li>
    @endforeach

@endsection

@section('contenido')

    <div class="container">
        <h1>Acesso Otorgado------XXXXXX</h1>
        <p>Useted ha sido accesado con exito</p>
        <p>Para salir haga clic <a href="{{URL::to('admin/logout')}}">acá</a></p>

    </div>
@endsection