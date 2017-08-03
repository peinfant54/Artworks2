@extends('templates.base_admin')

@section('contenido')

    <div class="container">
        <h1>Acesso Otorgado</h1>
        <p>Useted ha sido accesado con exito</p>
        <p>Para salir haga clic <a href="{{URL::to('admin/logout')}}">acá</a></p>

    </div>
@endsection