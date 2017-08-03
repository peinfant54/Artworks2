@extends('templates.base_admin')

@section('titulo')
    {{ 'Proyecto Galería' }}
@endsection

@section('contenido')


    <div class="container gallery-container" style="width: 90%">
        <div class="row">

            <div class="col-md-12">
                <h1>@lang('log.home') </h1>


                        <table id="mytable" class="table table-bordered table-striped">

                            <thead>

                            <th style="width:200px; text-align: center">@lang('log.title1')</th>
                            <th style="width:10px; text-align: center">@lang('log.title2')</th>
                            <th style="width:15px; text-align: center">@lang('log.title3')</th>
                            <th style="text-align: center">@lang('log.title4')</th>
                            </thead>
                            <tbody>
                            @foreach ($logs as $log)

                                <tr>
                                    <td style="text-align: center">{{ date('d-m-Y H:i:s', strtotime($log->fecha))  }}</td>
                                    <td style="text-align: center">{{ $log->user->username }}</td>
                                    <td style="text-align: center">{{ $log->module }}</td>
                                    <td>{{ $log->dato }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    {{  $logs->links()  }}


            </div>
        </div>
    </div>
@endsection