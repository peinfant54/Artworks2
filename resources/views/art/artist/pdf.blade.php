<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
.contenedor-div{
    height:100%;
    position:relative;
}
.mi-imagen-abajo-derecha{
    position:absolute;
    bottom:50px;
    right:10px;
}

</style>
<div class="mi-imagen-abajo-derecha">
    <h1 style="text-align: right">{{ $title }}</h1>
    <h2 style="text-align: right">Colección Privada Carlos Cruz Puga</h2>
</div>
<hr style="page-break-after: always;border: 0;margin: 0; padding: 0;">
@foreach ($obras as $a)
    <div style="text-align: center">
    <img src="http://artworks.dev/storage/Arts_Small/RO%2020.jpg"><br>{{asset('storage/Arts_Small/'.$a->file1)}}<br>
    <h4> {{$a->titulo}}<br>{{$a->ano}}<br>{{$a->tecnica}} -- {{ $a->dimension }}</h4>
    </div>
    <hr style="page-break-after: always;border: 0;margin: 0; padding: 0;">
@endforeach

</html>
