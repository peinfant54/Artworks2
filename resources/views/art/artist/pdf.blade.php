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
    <h2 style="text-align: right">@lang('index.ProyectTitlePrint')</h2>
</div>
<hr style="page-break-after: always;border: 0;margin: 0; padding: 0;">
@foreach ($obras as $a)
    <div style="text-align: center">
        @if ($a->file1 )
            <img src="{{ public_path() }}/storage/Arts_Small/{{ $a->file1 }}"><br>
        @else
            <img src="{{ public_path() }}/storage/No_Image.png" /><br>
        @endif

        <br><br>
        <!-- img src="http://artworks.dev/storage/Arts_Square/MV 1.jpg" class="img-rounded img_seleccion" /><br -->
    <h4>    {{$a->titulo}}<br>
            {{$a->ano}}<br>
            {{$a->tecnica}} -- {{ $a->dimension }}
        @if($opc == 1)
            @if ($a->edicion != "")
                {{ $a->edicion }}<br>
            @endif
            @if ($a->procedencia != "")
                {{ $a->procedencia }}<br>
            @endif
            @if ($a->catalogo != "")
                {{ $a->catalogo }}<br>
            @endif
            @if ($a->certificacion != "")
                {{ $a->certificacion }}<br>
            @endif
            @if ($a->valoracion != "")
                {{ $a->valoracion }}<br>
            @endif
            {{$a->location->name }}<br>
        @endif

    </h4>
    </div>


    <hr style="page-break-after: always;border: 0;margin: 0; padding: 0;">
@endforeach
</html>
