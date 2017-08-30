@extends('templates.base_admin')

@section('contenido')


    <div class="contenido posicion_contenedor">
        <div class="titulo">
            @if ($opc == 1)

                <h1>@lang('search.Summary_Title') </h1>

            @elseif ($opc == 2)

                <h1>@lang('search.Summary_Ubica') </h1>

            @elseif ($opc == 3)

                <h1>@lang('search.Summary_File') </h1>

            @elseif ($opc == 4)

                <h1>@lang('search.Summary_cUbica') "{{ $name->name }}"</h1>
            @endif
        </div>
        <div class="galeria">


            <div class="container gallery-container">

                <!--   Galería    -->

                <div class="tz-gallery">

                    <div class="row">
                        @foreach ($obras as $obra)

                            <div class="col-sm-6 col-md-2">
                                <div class="thumbnail">
                                    @if($obra->file1)
                                        <a class="lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}" title="
Título: {{ $obra->titulo }}
                                                Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
                                                Técnica: {{ $obra->tecnica }}">
                                            <img src="{{asset('storage/Arts_Square/'.$obra->file1)}}" alt="Park"  >
                                        </a>
                                    @else
                                        <a class="lightbox" href="{{asset('storage/No_Image.png')}}" title="
Título: {{ $obra->titulo }}
                                                Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
                                                Técnica: {{ $obra->tecnica }}">
                                            <img src="{{asset('storage/No_Image.png')}}" style="width: 100%" class="img-rounded">
                                        </a>
                                    @endif


                                    <div class="caption">
                                        <button class="BotonFoto" data-title="Edit" name="ChangePass" data-toggle="modal" data-target="#detalle{{ $obra->id }}">
                                            <h3>{{ $obra->titulo }}</h3>
                                            <p>{{ $obra->artist->nombre }} {{ $obra->artist->apellido }}</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @include ('admin.detalle' , ['obra' => $obra, 'opc' => '5', 'opc2' => $opc, 'texto' => 'xx', 'xid' => $xid])
                        @endforeach



                    </div>

                </div>


                <div style="margin-bottom: 70px">{!!  $obras->links()  !!}</div>

                <div style="margin-bottom: 70px">
                    <button type="button" onclick="window.location='{{ url("admin/log/summary/") }}'" class="btn btn-primary right btn-volver">
                        <span class="glyphicon glyphicon-arrow-left"> Back</span>
                    </button>
                </div>

            </div>

        </div>

    </div>

@endsection

