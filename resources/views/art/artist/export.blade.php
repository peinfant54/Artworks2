@extends('templates.base_admin')

@section('titulo')
    {{ 'Proyecto Galería' }}
@endsection



@section('contenido')

    <form class="form-horizontal" role="form" method="get" action="{{ url('art/artist/pdfexport') }}">
    <div class="container gallery-container" style="width: 90%">
        <div class="row">

            <div class="col-md-12">
                @foreach ($artist as $a)
                    <h1>@lang('artist.ExportMsg') {{$a}} </h1>
                    <input name="NameArtist" type="hidden" value="{{  $a }}">
                @endforeach
            </div>

        </div>

        <div class="tz-gallery">
            <table id="mytable" class="table table-bordred table-striped">

                @if (count($obras) > 0)
                    @foreach ($obras as $obra)
                    <div class=" col-xs-4 col-sm-2 col-md-1 col-lg-1">
                        <div class="thumbnail">

                        @if($obra->file1)
                            <a class="lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}" title="
                                                    {{ $obra->titulo }}<br>{{ $obra->artist->nombre }} {{ $obra->artist->apellido }}<br>{{ $obra->tecnica }}">
                                <img src="{{asset('storage/Arts_Square/'.$obra->file1)}}" class="img-rounded img_seleccion">
                            </a>
                        @else
                            <a class="lightbox" href="{{asset('storage/No_Image.png')}}">
                                <img src="{{asset('storage/No_Image.png')}}" style="width: 100%" class="img-rounded img_seleccion">
                            </a>
                        @endif
                            <input type="checkbox" id="c{{$obra->id}}" name="listartworks[]" value="{{$obra->id}}">
                            <label for="c{{$obra->id}}" class="p_selecion"><span></span><br>{{ $obra->n_inv }}</label>
                        </div>
                     </div>
                    @endforeach
                @else
                    <div class=" col-xs-4 col-sm-2 col-md-1 col-lg-1">
                        No data
                    </div>
                @endif
            </table>
        </div>
        <div class="left">
            <button type="submit" class="btn btn-primary right" name="export" >
                <span class="glyphicon glyphicon-plus"></span>@lang('artist.BtnExport')</button>
        </div>
    </div>

    </form>

@endsection


<!--script src="{{ asset('js/chosen.jquery.js') }}"></script>
<script src="{{ asset('js/imageselect.jquery.js') }}"></script>
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script -->
<!--!-div>
    <select name="users" multiple="multiple" class="my-select">
        <!--option data-img-src="http://websemantics.github.io/Image-Select/img/adnan.png">Adnan Sagar</option>
        <option selected="selected" data-img-src="http://websemantics.github.io/Image-Select/img/rena.png" >Rena Cugelman</option>
        <option data-img-src="http://websemantics.github.io/Image-Select/img/tavis.png">Tavis Lochhead</option>
        <option data-img-src="http://websemantics.github.io/Image-Select/img/brian.png">Brain Cugelman</option -->

      {{-- @foreach ($obras as $obra)
            @if($obra->file1)

                <option data-img-src="{{asset('storage/Arts_Square/'.$obra->file1)}}">{{$obra->n_inv}}</option>
            @else
                <option data-img-src="{{asset('storage/No_Image.png')}}">{{$obra->n_inv}}</option>

            @endif
        @endforeach--}}
    <!--/select>

    <script type="text/javascript">
        $(".my-select").chosen({width:"100%"});
    </script>
</div !-->