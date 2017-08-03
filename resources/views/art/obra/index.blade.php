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
                <h1>@lang('obra.home') </h1>

                @if($xmod->pivot->wwrite>0)
                    <div class="right"><button class="btn btn-primary right" data-title="New" data-toggle="modal" data-target="#new" name="new"><span class="glyphicon glyphicon-plus"></span>@lang('obra.BtnNew')</button></div>
                @endif


                @if (count($obras) > 0)
                    <div class="container gallery-container">

                        <!--   Galería    -->

                        <div class="tz-gallery">
                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                        <th style="width:100px" class="text-center">@lang('obra.title4')</th>

                        <th class="text-center">@lang('obra.title1')</th>
                        <th class="text-center">@lang('obra.title2')</th>
                        <th class="text-center">@lang('obra.title3')</th>
                        @if($xmod->pivot->eedit > 0)
                            <th class="text-center" style="width:15px">@lang('obra.title7')</th>
                            <th class="text-center" style="width:15px">@lang('obra.title5')</th>
                        @endif
                        @if($xmod->pivot->ddelete > 0)
                            <th class="text-center" style="width:15px">@lang('obra.title6')</th>
                        @endif
                        </thead>
                        <tbody>
                        @foreach ($obras as $obra)

                            <tr>
                                <!--td class="text-center">{{ $obra->id }}</td-->
                                <td style="min-width: 100px;">
                                    <div class="thumbnail">
                                        @if($obra->file1)
                                        <a class="lightbox" href="{{asset('storage/Arts_Small/'.$obra->file1)}}">
                                            <img src="{{asset('storage/Arts_Square/'.$obra->file1)}}" style="width: 100%" class="img-rounded">
                                        </a>
                                        @else
                                        <a class="lightbox" href="{{asset('storage/No_Image.png')}}">
                                            <img src="{{asset('storage/No_Image.png')}}" style="width: 100%" class="img-rounded">
                                        </a>
                                        @endif
                                    </div>
                                </td>

                                <td class="text-center">{{ $obra->n_inv }}</td>
                                <td class="text-center">{{ $obra->artist->nombre }} {{ $obra->artist->apellido }}</td>
                                <td class="text-center">{{ $obra->titulo }}</td>

                                @if($xmod->pivot->eedit > 0)
                                    <td class="text-center"><button name="file{{ $obra->id }}" class="btn btn-primary btn-xs" title="@lang('obra.EditFiles') {{$obra->n_inv}}" onClick="window.location.href='{{URL::to('art/obra/pdf/'.$obra->id)}}'"><span class="glyphicon glyphicon-file"></span></button></td>
                                    <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Edit"><button name="edit{{ $obra->id }}" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{ $obra->id }}" title="@lang('obra.EditMsg') {{$obra->n_inv}}"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                @endif

                                @if($xmod->pivot->ddelete > 0)
                                    <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Delete"><button name="delete{{ $obra->id }}" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete{{ $obra->id }}" title="@lang('obra.DeleteMsg'){{$obra->n_inv}}"><span class="glyphicon glyphicon-trash"></span></button></p></td>

                                @endif

                            </tr>
                            @if($xmod->pivot->eedit > 0)
                                @include ('art.obra.edit' , ['obra' => $obra])
                            @endif
                            @if($xmod->pivot->ddelete > 0)
                                @include ('art.obra.delete' , ['obra' => $obra])
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    {!!  $obras->links()  !!}
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>@lang('obra.NoData')</label>  </div>
                @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>

    @include ('art.obra.new')
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