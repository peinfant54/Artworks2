@extends('templates.base_admin')

@section('contenido')


    <div class="contenido posicion_contenedor">

        <div class="titulo">
            <h1>@lang('search.title') "{{ $texto }}"</h1>
        </div>

        <div class="galeria">
            <div><hr></div>
            <div class="titulos_busquedas">@lang('search.title_artist')</div>
            <div class="container gallery-container">
                <div class="tz-gallery">
                    <div class="resultados_busquedas">
                        @if (count($artist) > 0)
                            @foreach ($artist as $obra)
                                <a href="{{ URL::to('/art/search/details2/1/'. $obra->id .'/'.$texto) }}">{{ $obra->nombre }} {{ $obra->apellido }}</a><br>
                            @endforeach
                        @else
                            @lang('search.NoResult')
                        @endif
                    </div>
                </div>
            </div>
            <div><hr></div>
            <div class="titulos_busquedas">@lang('search.title_location')</div>
            <div class="container gallery-container">
                <div class="tz-gallery">
                    <div class="resultados_busquedas">
                        @if (count($location2) > 0)
                            @foreach ($location2 as $obra)
                                <a href="{{ URL::to('/art/search/details2/2/'. $obra->id .'/'.$texto) }}">{{ $obra->name  }}</a> <br>
                            @endforeach
                        @else
                            @lang('search.NoResult')
                        @endif
                    </div>
                </div>
            </div>
            <div><hr></div>
            <div class="titulos_busquedas">@lang('search.title_ninv')</div>
            <div class="container gallery-container">

                <!--   Galería    -->

                <div class="tz-gallery">

                    <div class="resultados_busquedas">
                        @if (count($ninv) > 0)
                            @foreach ($ninv as $obra)

                                <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        @if($obra->file1)
                                            <a class="lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
                                                <img src="{{asset('storage/Arts_Square/'.$obra->file1)}}" alt="Park">
                                            </a>
                                        @else
                                            <a class="lightbox" href="{{asset('storage/No_Image.png')}}">
                                                <img src="{{asset('storage/No_Image.png')}}" style="width: 100%" class="img-rounded" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
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
                    @if (count($ninv) > 0)
                    <div style="margin-bottom: 15px"><a href="{{ URL::to('/art/search/details/1/'.$texto) }}">@lang('search.Mas')</a></div>
                    @endif
            </div>
            <div><hr></div>
            <div class="titulos_busquedas">@lang('search.title_titulo')</div>
            <div class="container gallery-container">

                <!--   Galería    -->

                <div class="tz-gallery">

                    <div class="resultados_busquedas">
                        @if (count($titulo) > 0)
                            @foreach ($titulo as $obra)

                                <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        @if($obra->file1)
                                            <a class="lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
                                                <img src="{{asset('storage/Arts_Square/'.$obra->file1)}}" alt="Park">
                                            </a>
                                        @else
                                            <a class="lightbox" href="{{asset('storage/No_Image.png')}}">
                                                <img src="{{asset('storage/No_Image.png')}}" style="width: 100%" class="img-rounded" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
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
                @if (count($titulo) > 0)
                    <div style="margin-bottom: 15px"><a href="{{ URL::to('/art/search/details/2/'.$texto) }}">@lang('search.Mas')</a></div>
                @endif
            </div>
            <div><hr></div>
            <div class="titulos_busquedas">@lang('search.title_tecnica')</div>
            <div class="container gallery-container">

                <!--   Galería    -->

                <div class="tz-gallery">

                    <div class="resultados_busquedas">
                        @if (count($tecnica) > 0)
                            @foreach ($tecnica as $obra)

                                <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        @if($obra->file1)
                                            <a class="lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
                                                <img src="{{asset('storage/Arts_Square/'.$obra->file1)}}" alt="Park">
                                            </a>
                                        @else
                                            <a class="lightbox" href="{{asset('storage/No_Image.png')}}">
                                                <img src="{{asset('storage/No_Image.png')}}" style="width: 100%" class="img-rounded" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
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
                    @if (count($tecnica) > 0)
                    <div style="margin-bottom: 15px"><a href="{{ URL::to('/art/search/details/3/'.$texto) }}">@lang('search.Mas')</a></div>
                    @endif
            </div>
            <div><hr></div>
            <div class="titulos_busquedas">@lang('search.title_procedencia')</div>
            <div class="container gallery-container">

                <!--   Galería    -->

                <div class="tz-gallery">
                    <div class="resultados_busquedas">

                        @if (count($procedencia) > 0)
                            @foreach ($procedencia as $obra)

                                <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        @if($obra->file1)
                                            <a class="lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
                                                <img src="{{asset('storage/Arts_Square/'.$obra->file1)}}" alt="Park" >
                                            </a>
                                        @else
                                            <a class="lightbox" href="{{asset('storage/No_Image.png')}}">
                                                <img src="{{asset('storage/No_Image.png')}}" style="width: 100%" class="img-rounded" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
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
                @if (count($procedencia) > 0)
                    <div style="margin-bottom: 15px"><a href="{{ URL::to('/art/search/details/4/'.$texto) }}">@lang('search.Mas')</a></div>
                @endif
            </div>
            <div><hr></div>
            <div class="titulos_busquedas">@lang('search.title_catalogo')</div>
            <div class="container gallery-container">

                <!--   Galería    -->

                <div class="tz-gallery">

                    <div class="resultados_busquedas">
                        @if (count($catalogo) > 0)
                            @foreach ($catalogo as $obra)

                                <div class="col-sm-6 col-md-2">
                                    <div class="thumbnail">
                                        @if($obra->file1)
                                            <a class="lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
                                                <img src="{{asset('storage/Arts_Square/'.$obra->file1)}}" alt="Park">
                                            </a>
                                        @else
                                            <a class="lightbox" href="{{asset('storage/No_Image.png')}}">
                                                <img src="{{asset('storage/No_Image.png')}}" style="width: 100%" class="img-rounded" title="
Título: {{ $obra->titulo }}
Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
Técnica: {{ $obra->tecnica }}">
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
                @if (count($catalogo) > 0)
                    <div style="margin-bottom: 15px"><a href="{{ URL::to('/art/search/details/5/'.$texto) }}">@lang('search.Mas')</a></div>
                @endif


            </div>
        </div>

    </div>

@endsection

