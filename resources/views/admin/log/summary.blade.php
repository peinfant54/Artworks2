@extends('templates.base_admin')


@section('contenido')


    <div class="container gallery-container" style="width: 90%">
        <div class="row">

            <div class="col-md-12">
                <h1>@lang('log.summary') </h1>
                <hr>
                <h3>&bull; @lang('log.Ex') <a href="{{URL::to('admin/index')}}" title="@lang('log.s_sistema_ley')">{{ $total }}</a> @lang('log.s_sistema')</h3>
                <h3>&bull; @lang('log.Ex') <a href="{{URL::to('admin/log/summary/search/1/0/0')}}" title="@lang('log.s_titulo_ley')">{{ $sin_titulo }}</a> @lang('log.s_titulo')</h3>
                <h3>&bull; @lang('log.Ex') <a href="{{URL::to('admin/log/summary/search/2/0/0')}}" title="@lang('log.s_ubica_ley')">{{ $sin_obra }}</a> @lang('log.s_ubica')</h3>
                <h3>&bull; @lang('log.Ex') <a href="{{URL::to('admin/log/summary/search/3/0/0')}}" title="@lang('log.s_file_ley')">{{ $sin_file }}</a> @lang('log.s_file')</h3>

<div style="float:left; padding-bottom:20px; padding-right:20px;padding-top:30px;">
                <table id="mytable" style="width:400px; " class="table-bordered table-striped">

                    <thead>

                    <th style="width:300px; text-align: center; font-size: x-large; font-weight: bolder;">@lang('log.s_title1')</th>
                    <th style="width:100px; text-align: center; font-size: x-large; font-weight: bolder;">@lang('log.s_title2')</th>
                       </thead>
                    <tbody>
                    @foreach ($query as $s)

                        <tr>
                            <td style="text-align: center"><a href="{{URL::to('admin/log/summary/search/4/'.$s->id .'/0')}}" title="@lang('log.ubica_ley') '{{ $s->name }}'">{{ $s->name }}</a></td>
                            <td style="text-align: center">{{ $s->porc }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
</div>
            <div style="padding-top:30px;">
                <table id="mytable" style="width:400px" class="table-bordered table-striped">

                    <thead>

                    <th style="width:300px; text-align: center; font-size: x-large; font-weight: bolder;">@lang('log.s_title3')</th>
                    <th style="width:100px; text-align: center; font-size: x-large; font-weight: bolder;">@lang('log.s_title2')</th>
                    </thead>
                    <tbody>
                    @foreach ($query1 as $s)

                        <tr>
                            <td style="text-align: center"><a href="{{URL::to('admin/log/summary/search2/1/'.$s->id .'/0')}}" title="@lang('log.artista_ley') '{{ $s->nombre }}'">{{ $s->nombre }}</a></td>
                            <td style="text-align: center">{{ $s->porc }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>


            </div>
        </div>
    </div>
@endsection