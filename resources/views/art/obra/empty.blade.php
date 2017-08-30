@extends('templates.base2')

@section('titulo')

@endsection

<!--establecemos nuestra navegación y añadimos otro elemento-->
@section('navegacion2')
    <!--heredamos con parent lo que hay en la plantilla base
	pero añadimos otro elemento al menú-->
    @parent

    @foreach ($modulos as $mod)
        @if($mod->pivot->rread > 0 or $mod->pivot->eedit > 0 or $mod->pivot->wwrite > 0 or $mod->pivot->ddelete > 0)
            <li><a href="{{ URL::to($mod->links) }}">{{ $mod->name }}</a></li>
        @endif
    @endforeach

@endsection

@section('contenido')


    @include ('art.obra.edit_all', ['obra' => $obra, 'opc'  => $opc, 'texto' => $search])
    <script type="text/javascript">

        $('#edit').modal({show: true, backdrop: 'static', keyboard: false});

    </script>
@endsection