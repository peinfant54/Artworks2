@extends('templates.base_admin')

@section('contenido')


    <div class="contenido posicion_contenedor">

        <div class="galeria">


            <div class="container gallery-container">

                <!--   Galería    -->
                <div class="row">

                    <div class="col-md-12">
                        @foreach ($artists_name as $a)
                            <h1>@lang('artist.ExportMsg') {{$a}} </h1>
                            <input name="NameArtist" type="hidden" value="{{  $a }}">
                        @endforeach
                    </div>

                </div>
                <div class="tz-gallery">

                    <div class="row">
                        @foreach ($obras as $obra)

                            <div class="col-sm-6 col-md-2">
                                <div class="thumbnail">
                                    @if($obra->file1)
                                        <a class="lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}" title="
Título: {{ $obra->titulo }}
                                                Artísta: {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
                                                Técnica: {{ $obra->tecnica }}" >
                                            <img class="lightbox" src="{{asset('storage/Arts_Square/'.$obra->file1)}}" alt="Park" >
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
                            <!--- ('admin.detalle' , ['obra' => $obra, 'opc' => ORIGEN, 'texto' => TEXTO a BUSCA, 'opc2' => VARIABEL PARA LA PAGINA DE BUSQUEDAS, 'xid' ID secundario para busquedas ])                   -->
                            @include ('admin.detalle' , ['obra' => $obra, 'opc' => 1, 'texto' => 'index', 'opc2' => '0', 'xid' => 0 ])
                        @endforeach
                   </div>
                    <div class="left">
                        <button type="button" onclick="history.back()" class="btn btn-primary right btn-volver">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Back</span>
                        </button>
                    </div>
                    <br><br><br><br>
                </div>

            </div>

        </div>

    </div>

@endsection
