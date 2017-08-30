@extends('templates.base_admin')


@section('contenido')


    <div class="container gallery-container" style="width: 90%">
        <div class="row">

            <div class="col-md-12">
                <h1>@lang('log.summary') </h1>
                <hr>
                <h3>&bull; @lang('log.Ex') <a href="{{URL::to('admin/index')}}" title="@lang('log.s_sistema_ley')">{{ $total }}</a> @lang('log.s_sistema')</h3>
                <h3>&bull; @lang('log.Ex') <a href="{{URL::to('admin/log/summary/search/1/0')}}" title="@lang('log.s_titulo_ley')">{{ $sin_titulo }}</a> @lang('log.s_titulo')</h3>
                <h3>&bull; @lang('log.Ex') <a href="{{URL::to('admin/log/summary/search/2/0')}}" title="@lang('log.s_ubica_ley')">{{ $sin_obra }}</a> @lang('log.s_ubica')</h3>
                <h3>&bull; @lang('log.Ex') <a href="{{URL::to('admin/log/summary/search/3/0')}}" title="@lang('log.s_file_ley')">{{ $sin_file }}</a> @lang('log.s_file')</h3>


                <table id="mytable" class="table table-bordered table-striped">

                    <thead>

                    <th style="width:200px; text-align: center; font-size: x-large; font-weight: bolder;">@lang('log.s_title1')</th>
                    <th style="width:10px; text-align: center; font-size: x-large; font-weight: bolder;">@lang('log.s_title2')</th>
                       </thead>
                    <tbody>
                    @foreach ($query as $s)

                        <tr>
                            <td style="text-align: center"><a href="{{URL::to('admin/log/summary/search/4/'.$s->id)}}" title="@lang('log.ubica_ley') '{{ $s->name }}'">{{ $s->name }}</a></td>
                            <td style="text-align: center">{{ $s->porc }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>
@endsection