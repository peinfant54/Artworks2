@extends('templates.base_admin')

@section('titulo')
    {{ 'Proyecto Galería' }}
@endsection



@section('contenido')

    <div class="container gallery-container" style="width: 90%">
        <div class="row">

            <div class="col-md-12">
                <h1>@lang('profile.home') </h1>

                @if($xmod->pivot->wwrite>0)
                    <div class="right"><button class="btn btn-primary right" name="new" data-title="New" data-toggle="modal" data-target="#new"><span class="glyphicon glyphicon-plus"></span>@lang('profile.BtnNew')</button></div>
                @endif





                    @if (count($profiles) > 0)
                        <table id="mytable" class="table table-striped">

                            <thead>

                            <th style="width:10px" class="text-center">Id</th>
                            <th class="text-center">@lang('profile.title1')</th>
                            <th class="text-center">@lang('profile.title2')</th>
                            @if($xmod->pivot->eedit > 0)
                            <th style="width:15px" class="text-center">@lang('profile.title5')</th> <!-- Permisos -->

                            <th style="width:15px" class="text-center">@lang('profile.title3')</th> <!-- Editar -->
                            @endif
                            @if($xmod->pivot->ddelete > 0)
                            <th style="width:15px" class="text-center">@lang('profile.title4')</th> <!-- Delete -->
                            @endif
                            </thead>
                            <tbody>
                            @foreach ($profiles as $profile)

                                <tr>
                                    <td class="text-center">{{ $profile->id }}</td>
                                    <td class="text-center">{{ $profile->name }}</td>
                                    <td class="text-center">{{ $profile->descripcion }}</td>
                                    @if($xmod->pivot->eedit > 0)
                                        <td><p data-placement="top" data-toggle="tooltip" title="Permissions"><button id="Pass{{ $profile->id }}" class="btn btn-danger btn-xs center-block" data-title="Permissions" data-toggle="modal" data-target="#permissions{{ $profile->id }}" title="@lang('profile.PermissionsMsg'){{$profile->name}}"><span class="glyphicon glyphicon-lock"></span></button></p></td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="Edit{{ $profile->id }}" class="btn btn-primary btn-xs center-block" data-title="Edit" data-toggle="modal" data-target="#edit{{ $profile->id }}" title="@lang('profile.EditMsg'){{$profile->name}}"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                   @endif
                                    @if($xmod->pivot->ddelete > 0)
                                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="Delete{{ $profile->id }}"  class="btn btn-danger btn-xs center-block" data-title="Delete" data-toggle="modal" data-target="#delete{{ $profile->id }}" title="@lang('profile.DeleteMsg'){{$profile->name}}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                    @endif


                                </tr>
                                @include ('admin.profile.permissions' , ['profiles' => $profile])
                                @include ('admin.profile.edit' , ['profiles' => $profile])
                                @include ('admin.profile.delete' , ['profiles' => $profile])
                            @endforeach
                            </tbody>
                        </table>
                        {!!  $profiles->links()  !!}
                    @else
                        <br/><div class='rechazado'><label style='color:#FA206A'>@lang('profile.NoData')</label>  </div>
                    @endif




            </div>
        </div>
    </div>

    @include ('admin.profile.new')

@endsection