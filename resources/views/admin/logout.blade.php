@extends('templates.base')

@section('contenido')

    <div class="container">
        <h1>LogOut Existoso </h1>
        <p>Para volver ingresar porfavor hacer clic <a href="{{URL::to('login')}}">acá</a></p>

    </div>
@endsection