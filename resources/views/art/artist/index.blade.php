@extends('templates.base_admin')

@section('titulo')
    {{ 'Proyecto Galería' }}
@endsection



@section('contenido')

    <div class="container gallery-container" style="width: 90%">
        <div class="row">

            <div class="col-md-12">
                <h1>@lang('artist.home') </h1>

                @if($xmod->pivot->wwrite>0)
                    <div class="right"><button class="btn btn-primary right" name="new" data-title="New" data-toggle="modal" data-target="#new"><span class="glyphicon glyphicon-plus"></span>@lang('artist.BtnNew')</button></div>
                @endif





                @if (count($Artists) > 0)
                    <table id="mytable" class="table table-striped">

                        <thead>

                        <th style="width:10px" class="text-center">Id</th>
                        <th class="text-center">@lang('artist.title1')</th>
                        <th class="text-center">@lang('artist.title2')</th>
                        <th class="text-center">Exp</th>
                        @if($xmod->pivot->eedit > 0)

                            <th style="width:15px" class="text-center">@lang('artist.title3')</th> <!-- Editar -->
                        @endif
                        @if($xmod->pivot->ddelete > 0)
                            <th style="width:15px" class="text-center">@lang('artist.title4')</th> <!-- Delete -->
                        @endif
                        </thead>
                        <tbody>
                        @foreach ($Artists as $artist)

                            <tr>
                                <td class="text-center">{{ $artist->id }}</td>
                                <td class="text-center"><a href="{{ URL::to('art/obra/list/'.$artist->id) }}">{{ $artist->nombre }}</a></td>
                                <td class="text-center"><a href="{{ URL::to('art/obra/list/'.$artist->id) }}">{{ $artist->apellido }}</a></td>
                                <td class="text-center">
                                    <a href="{{ URL::to('art/artist/export/'.$artist->id) }}"><i class="material-icons">picture_as_pdf</i></a></td>
                                @if($xmod->pivot->eedit > 0)

                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="Edit{{ $artist->id }}" class="btn btn-primary btn-xs center-block" data-title="Edit" data-toggle="modal" data-target="#edit{{ $artist->id }}" title="@lang('artist.EditMsg'){{$artist->name}}"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                @endif
                                @if($xmod->pivot->ddelete > 0)
                                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="Delete{{ $artist->id }}"  class="btn btn-danger btn-xs center-block" data-title="Delete" data-toggle="modal" data-target="#delete{{ $artist->id }}" title="@lang('artist.DeleteMsg'){{$artist->name}}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                @endif


                            </tr>
                            @include ('art.artist.edit' , ['loc' => $artist])
                            @include ('art.artist.delete' , ['loc' => $artist])
                        @endforeach
                        </tbody>
                    </table>
                    {!!  $Artists->links()  !!}
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>@lang('artist.NoData')</label>  </div>
                @endif




            </div>
        </div>
    </div>

    @include ('art.artist.new')


@endsection