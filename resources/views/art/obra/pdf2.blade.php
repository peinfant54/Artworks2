@extends('templates.base_admin')

@section('titulo')
    {{ 'Proyecto Galería' }}
@endsection



@section('contenido')

    <div class="container gallery-container" style="width: 90%">
        <div class="row">

            <div class="col-md-12">
                <h1>@lang('obra.home') {{$obra->n_inv}}</h1>

                @if($xmod->pivot->wwrite>0)
                    <div class="right">
                        <button class="btn btn-primary right" name="new" data-title="New" data-toggle="modal" data-target="#new" title="@lang('obra.BtnNewFileMsg') {{ $obra->n_inv }}">
                            <span class="glyphicon glyphicon-plus"></span>
                            @lang('obra.BtnNewFile')
                        </button>
                    </div>
                @endif


                @if (count($obra->files) > 0)
                    <table id="mytable" class="table table-striped">

                        <thead>

                        <th style="width:10px" class="text-center">Id</th>
                        <th class="text-center">@lang('obra.title1')</th>

                        @if($xmod->pivot->ddelete > 0)
                            <th style="width:15px" class="text-center">@lang('obra.title6')</th> <!-- Delete -->
                        @endif
                        </thead>
                        <tbody>
                        @foreach ($obra->files as $files)
                            <tr>
                                <td class="text-center">{{ $files->id }}</td>
                                <td class="text-center">
                                    <a href="{{asset('storage/pdfs/'.$files->name)}}" target="_blank">{{ $files->name }}</a>
                                </td>

                                @if($xmod->pivot->ddelete > 0)
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button id="Delete{{ $files->id }}" class="btn btn-danger btn-xs center-block" data-title="Delete" data-toggle="modal" data-target="#delete{{ $obra->id }}" title="@lang('obra.DeleteMsgFile'){{$obra->name}}">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </p>
                                    </td>
                                @endif
                            </tr>
                            @include ('art.obra.pdfdelete' , ['obras' => $obra, 'file' => $files,  'opc'  => $opc, 'opc2'  => $opc2, 'search' => $search, 'xid' => $xid])
                        @endforeach
                        </tbody>
                    </table>

                @else
                    <br/>
                    <div class='rechazado' style="margin-top: 50px; margin-bottom: 70px">
                        <label style='color:#FA206A'>@lang('obra.NoDataFile')</label>
                    </div>
                @endif


                <div style="margin-top: 50px; margin-bottom: 70px">
                    @if($opc == 0) <!--LLamada desde ObraIndex -->
                        <button type="button" onclick="location.href = ' {{ URL::to('art/obra/index') }} '" class="btn btn-primary right btn-volver">
                    @elseif($opc == 1) <!--LLamada desde AdminIndex -->
                        <button type="button" onclick="location.href = ' {{ URL::to('admin/index') }} '" class="btn btn-primary right btn-volver">
                    @elseif($opc == 2) <!--LLamada desde Search Level 1 -->
                        <button type="button" onclick="location.href = ' {{ URL::to('art/search/'.$search) }} '" class="btn btn-primary right btn-volver">
                    @elseif($opc == 3) <!--LLamada desde Search Level 2.1 -->
                        <button type="button" onclick="location.href = ' {{ URL::to("art/search/details/".$opc2."/".$search."/".$opc ) }} '" class="btn btn-primary right btn-volver">
                    @elseif($opc == 4) <!--LLamada desde Search Level 2.2 -->
                        <button type="button" onclick="location.href = ' {{ URL::to("art/search/details2/".$opc2."/".$xid."/".$search."/".$opc2) }} '" class="btn btn-primary right btn-volver">
                    @elseif($opc == 5) <!--LLamada desde Summary By Location -->
                        <button type="button" onclick="location.href = ' {{ URL::to("admin/log/summary/search/".$opc2."/".$xid ."/0" ) }} '" class="btn btn-primary right btn-volver">
                    @elseif($opc == 6) <!--LLamada desde Summary -->
                        <button type="button" onclick="location.href = ' {{ URL::to("art/obra/list/".$xid ) }} '" class="btn btn-primary right btn-volver">
                    @elseif($opc == 7) <!--LLamada desde Summary By Artist -->
                        <button type="button" onclick="location.href = ' {{ URL::to("admin/log/summary/search2/".$opc2."/".$xid ."/0"  ) }} '" class="btn btn-primary right btn-volver">

                    @endif

                        <span class="glyphicon glyphicon-arrow-left"> Back</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <?php /* dd($errors); */?>

    @include ('art.obra.pdfnew2', ['obra' => $obra, 'opc'  => $opc, 'texto' => $search])
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
        $('#new').modal({showw: true});
        @endif

        @endif


    </script>


@endsection