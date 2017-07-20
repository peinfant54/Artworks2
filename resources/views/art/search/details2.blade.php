@extends('templates.base_admin')

@section('contenido')


    <div class="contenido posicion_contenedor">
        <div class="titulo">
            @if ($opc == 1)

                <h1>@lang('search.Details_artist') "{{ $name  }}"</h1>

            @elseif ($opc == 2)

                <h1>@lang('search.Details_location') "{{ $name }}"</h1>

            @endif
        </div>
        <div class="galeria">


            <div class="container gallery-container">

                <!--   Galería    -->

                <div class="tz-gallery">

                    <div class="row">

                        @if(count($obras) > 0)

                            @foreach ($obras as $obra)

                                <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        @if($obra->file1)
                                            <a class="ttooltip lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}" title="
    Título: {{ $obra->titulo }}
                                                    Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
                                                    Técnica: {{ $obra->tecnica }}">
                                                <img src="{{asset('storage/Arts_Square/'.$obra->file1)}}" alt="Park"  title="
                                                    Título: {{ $obra->titulo }}
                                                        Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
                                                        Técnica: {{ $obra->tecnica }}">
                                            </a>
                                        @else
                                            <a class="lightbox" href="{{asset('storage/No_Image.png')}}">
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
                                @include ('admin.detalle' , ['obra' => $obra])
                            @endforeach
                        @else
                            <p>@lang('search.NoResult')</p>
                        @endif



                    </div>

                </div>


                <div style="margin-bottom: 70px">{!!  $obras->links()  !!}</div>
                <div style="margin-bottom: 70px">

                    <button type="button" onclick="history.back()" class="btn btn-primary right">
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Back</span>
                    </button>
                </div>


            </div>

        </div>

    </div>

@endsection

