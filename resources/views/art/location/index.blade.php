@extends('templates.base_admin')





@section('contenido')

    <div class="container gallery-container" style="width: 90%">
        <div class="row">

            <div class="col-md-12">
                <h1>@lang('location.home') </h1>

                @if($xmod->pivot->wwrite>0)
                    <div class="right"><button class="btn btn-primary right" name="new" data-title="New" data-toggle="modal" data-target="#new"><span class="glyphicon glyphicon-plus"></span>@lang('location.BtnNew')</button></div>
                @endif





                @if (count($Locations) > 0)
                    <table id="mytable" class="table table-striped">

                        <thead>

                        <th style="width:10px" class="text-center">Id</th>
                        <th class="text-center">@lang('location.title1')</th>
                        @if($xmod->pivot->eedit > 0)

                            <th style="width:15px" class="text-center">@lang('location.title3')</th> <!-- Editar -->
                        @endif
                        @if($xmod->pivot->ddelete > 0)
                            <th style="width:15px" class="text-center">@lang('location.title4')</th> <!-- Delete -->
                        @endif
                        </thead>
                        <tbody>
                        @foreach ($Locations as $location)

                            <tr>
                                <td class="text-center">{{ $location->id }}</td>
                                <td class="text-center">{{ $location->name }}</td>
                                @if($xmod->pivot->eedit > 0)

                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="Edit{{ $location->id }}" class="btn btn-primary btn-xs center-block" data-title="Edit" data-toggle="modal" data-target="#edit{{ $location->id }}" title="@lang('location.EditMsg'){{$location->name}}"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                @endif
                                @if($xmod->pivot->ddelete > 0)
                                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="Delete{{ $location->id }}"  class="btn btn-danger btn-xs center-block" data-title="Delete" data-toggle="modal" data-target="#delete{{ $location->id }}" title="@lang('location.DeleteMsg'){{$location->name}}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                @endif


                            </tr>
                            @include ('art.location.edit' , ['loc' => $location])
                            @include ('art.location.delete' , ['loc' => $location])
                        @endforeach
                        </tbody>
                    </table>
                    {!!  $Locations->links()  !!}
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>@lang('location.NoData')</label>  </div>
                @endif




            </div>
        </div>
    </div>

    @include ('art.location.new')


@endsection