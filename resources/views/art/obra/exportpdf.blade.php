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

    <div style="text-align: center">
        @if ($obras->file1 )
            <img src="{{ public_path() }}/storage/Arts_Small/{{ $obras->file1 }}"><br>
        @else
            <img src="{{ public_path() }}/storage/No_Image.png" /><br>
        @endif

        <br>
        <!-- img src="http://artworks.dev/storage/Arts_Square/MV 1.jpg" class="img-rounded img_seleccion" /><br -->
        <h4>
            {{$obras->titulo}}<br>
            {{$obras->ano}}<br>
            {{$obras->tecnica}} -- {{ $obras->dimension }}<br>
            @if ($obras->edicion != "")
                {{ $obras->edicion }}<br>
            @endif
            @if ($obras->procedencia != "")
                {{ $obras->procedencia }}<br>
            @endif
            @if ($obras->catalogo != "")
                {{ $obras->catalogo }}<br>
            @endif
            @if ($obras->certificacion != "")
                {{ $obras->certificacion }}<br>
            @endif
            @if ($obras->valoracion != "")
                {{ $obras->valoracion }}<br>
            @endif
            {{$obras->location->name }}<br>

        </h4>
    </div>


    <hr style="page-break-after: always;border: 0;margin: 0; padding: 0;">

</html>
