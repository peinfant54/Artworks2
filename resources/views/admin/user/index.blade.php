@extends('templates.base_admin')

@section('titulo')
    {{ 'Proyecto Galería' }}
@endsection



@section('contenido')

    <div class="container gallery-container"  style="width: 90%">
        <div class="row">
            <ul class="alert-box warning radius">

                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
            <div class="col-md-12">
                <h1>@lang('user.home') </h1>

                @if($xmod->pivot->wwrite>0)
                    <div class="right"><button class="btn btn-primary right" data-title="New" data-toggle="modal" data-target="#new" name="new"><span class="glyphicon glyphicon-plus"></span>@lang('user.BtnNew')</button></div>
                @endif


                        @if (count($users) > 0)
                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th style="width:10px">Id</th>
                            <th class="text-center">@lang('user.title1')</th>
                            <th class="text-center">@lang('user.title2')</th>
                            <th class="text-center">@lang('user.title5')</th>
                            @if($xmod->pivot->eedit > 0)
                            <th class="text-center" style="width:15px">@lang('user.title6')</th>
                            <th class="text-center" style="width:15px">@lang('user.title3')</th>
                            @endif
                            @if($xmod->pivot->ddelete > 0)
                            <th class="text-center" style="width:15px">@lang('user.title4')</th>
                            @endif
                            </thead>
                            <tbody>
                            @foreach ($users as $user)

                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td class="text-center">{{ $user->username }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->profile->name }}</td>
                                    @if($xmod->pivot->eedit > 0)
                                        <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Pass"><button name="pass{{ $user->id }}" class="btn btn-danger btn-xs" data-title="Pass" data-toggle="modal" data-target="#pass{{ $user->id }}" title="@lang('user.EditPassMsg'){{$user->username}}"><span class="glyphicon glyphicon-lock"></span></button></p></td>
                                        <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Edit"><button name="edit{{ $user->id }}" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{ $user->id }}" title="@lang('user.EditMsg'){{$user->username}}"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    @endif

                                    @if($xmod->pivot->ddelete > 0)
                                        <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Delete"><button name="delete{{ $user->id }}" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete{{ $user->id }}" title="@lang('user.DeleteMsg'){{$user->username}}"><span class="glyphicon glyphicon-trash"></span></button></p></td>

                                    @endif

                                </tr>
                                @include ('admin.user.password' , ['users' => $user])
                                @include ('admin.user.edit' , ['users' => $user])
                                @include ('admin.user.delete' , ['users' => $user])
                            @endforeach
                            </tbody>
                        </table>
                        {!!  $users->links()  !!}
                        @else
                            <br/><div class='rechazado'><label style='color:#FA206A'>@lang('user.NoData')</label>  </div>
                        @endif

            </div>
        </div>
    </div>

    @include ('admin.user.new')
    <script type="text/javascript">

        @if(old('modalpass'))
            @if (count($errors) > 0)
                $('#pass{{old('modalpass')}}').modal({show: true});
            @endif

        @elseif(old('modaledit'))
            @if (count($errors) > 0)
                $('#edit{{old('modaledit')}}').modal({show: true});
            @endif
        @else
            @if (count($errors) > 0)
                $('#new').modal({show: true});
            @endif

        @endif


    </script>

@endsection