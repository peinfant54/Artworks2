<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>@lang('index.ProyectTitle')</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap_gallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/thumbnail-gallery.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pisco.tooltip.css') }}" rel="stylesheet">

    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ImageSelect.css') }}" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">:root .module--ad,
        :root .adsbygoogle,
        :root #header + #content > #left > #rlblock_left,
        :root #content > #right > .dose > .dosesingle,
        :root #content > #center > .dose > .dosesingle
        {display:none !important;}</style>

</head>


<script src="{{ asset('js/app.js') }}"></script>


<body data-feedly-mini="yes">



<div class="container" style="padding-top: 0em;">
    <nav class="navbar navbar-default" role="navigation">
        <!-- El logotipo y el icono que despliega el menú se agrupan
             para mostrarlos mejor en los dispositivos móviles -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex2-collapse">
                <span class="sr-only">Desplegar navegación</span>
                <span class="glyphicon glyphicon-menu-hamburger"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Desplegar navegación</span>
                <span class="icon-bar" style="height: 20px; background: #f8f8f8;"><img src="{{ asset('img/buscar.svg') }}"></span>
            </button>

            <a class="navbar-brand" style="height: auto; line-height: 33px" href="{{URL::to('admin/index')}}">@lang('index.ProyectTitle')</a>
        </div>


        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
             otro elemento que se pueda ocultar al minimizar la barra -->
        <div class="navbar-collapse navbar-ex1-collapse collapse" style="height: 1px;">

            <form class="navbar-form navbar-right" role="search" style="margin-right: -30px;" action="{{ url('art/search/') }}" method="GET">
                <div class="form-group">
                    <input type="text" name="textsearch" class="form-control" placeholder="@lang('index.SearchPlaceHolder')" title="@lang('index.SearchLeyend')" required>
                </div>
                <button type="submit" class="btn btn-default">@lang('index.Search')</button>
            </form>

        </div>
        <div class="navbar-collapse navbar-ex2-collapse collapse" style="height: 1px;">


            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="@lang('index.MenuGroupLeyend')">

                        <span class="glyphicon glyphicon-user"></span>
                        <!--img  style="height: 20px; background: #f8f8f8;" src="{{ asset('img/usuario.svg') }}" --><b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::to('admin/index')}}" title="@lang('index.MenuHomeLeyend')">@lang('index.MenuHome')</a></li>
                        @foreach ($modulos as $mod)

                            @if($mod->pivot->rread > 0 or $mod->pivot->eedit > 0 or $mod->pivot->wwrite > 0 or $mod->pivot->ddelete > 0)
                                @if($mod->id > 3)
                                    <li><a href="{{ URL::to($mod->links) }}"> @lang('index.Menu'.$mod->id) </a></li>
                                @endif
                            @endif
                        @endforeach
                    </ul>

                </li>
                @php
                    $control = 0;
                @endphp
                @foreach ($modulos as $mod)
                    @if($mod->pivot->rread > 0 or $mod->pivot->eedit > 0 or $mod->pivot->wwrite > 0 or $mod->pivot->ddelete > 0)
                        @if($mod->id < 4)
                            @php
                                $control = 1;
                            @endphp
                        @endif
                    @endif
                @endforeach

                @if ($control == 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="@lang('index.MenuGroupLeyend')">
                            <span class="glyphicon glyphicon-cog"></span>
                        <!--img  style="height: 20px; background: #f8f8f8;" src="{{ asset('img/confi.svg') }}"--><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($modulos as $mod)

                                @if($mod->pivot->rread > 0 or $mod->pivot->eedit > 0 or $mod->pivot->wwrite > 0 or $mod->pivot->ddelete > 0)
                                    @if($mod->id < 4)
                                        <li><a href="{{ URL::to($mod->links) }}"> @lang('index.Menu'.$mod->id) </a></li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif



                @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                        <li>
                            <a href="{{ route('lang.switch', $lang) }}" title="@lang('index.LanguageLeyend')">
                                <span class="glyphicon glyphicon-flag"></span>
                            </a>
                        </li>
                    @endif
                @endforeach
                <li>
                    <a data-title="ChangePass" name="ChangePass" data-toggle="modal" data-target="#change2" title="@lang('index.ChangePasswordMsg')">
                        <span class="glyphicon glyphicon-lock"></span>
                    </a>
                </li>
                <!--li style="padding-top: 12px">

                    <p data-placement="top">

                        <button class="btn btn-xs" style="background: transparent" data-title="Edit" name="ChangePass" data-toggle="modal" data-target="#change" title="@lang('index.ChangePasswordMsg')">
                            <span class="glyphicon glyphicon-lock"></span>
                            <!--img  style="height: 20px; background: #f8f8f8;" src="{{ asset('img/candado.svg') }}"-->
                        <!-- /button>
                    </p>
                </li -->
                <li>
                    <a href="{{ route('logout') }}" id="logout"
                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="@lang('index.exit')">
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            </ul>
        </div>
    </nav>
</div>





<div class="container">

    @if(Session::has('msg_access'))
        <!--div class="alert alert-success">@lang('index.AccessMsg')</div>
        <div class="alert alert-info">@lang('index.AccessMsg')</div>
        <div class="alert alert-warning">@lang('index.AccessMsg')</div -->
        <div class="alert alert-danger">{{Session::get('msg_access')}} :: @lang('index.AccessMsg')</div>
    @endif
    @if(Session::has('dbUpdated'))
        <div class="alert alert-success">
            @lang('index.Update')
        </div>
    @endif
    @if(Session::has('dbUpdatedPassword'))
        <div class="alert alert-success">
            @lang('index.UpdatePassword')
        </div>
    @endif
    @if(Session::has('dbCreate'))
        <div class="alert alert-success"> @lang('index.Create')</div>
    @endif
    @if(Session::has('dbDelete'))
        <div class="alert alert-success">@lang('index.Delete')</div>
    @endif

        @if(Session::has('dbDeleteError') == 'Profile')
            @if(Session::get('dbDeleteError') == 'Profile')
                <div class="alert alert-danger">@lang('index.DeleteErrorProfile')</div>
            @elseif(Session::get('dbDeleteError') == 'Artist')
                <div class="alert alert-danger">@lang('index.DeleteErrorArtist')</div>
            @elseif(Session::get('dbDeleteError') == 'ArtWorkFile')
                <div class="alert alert-danger">@lang('index.DeleteErrorFile')</div>
            @endif
        @endif
    @if(Session::has('msg_access2'))
        <div class="alert alert-danger">{{Session::get('msg_access2')}} </div>
    @endif

        @yield('contenido')
</div>

<script type="text/javascript">

    @if(Session::has('dbUpdatedPass'))

    $('#change').modal({show: true});

    @endif


</script>

@include ('templates.password' )


<footer>

    <div id="footer-login" >
        @lang('index.footerCreate')<a href="http://www.intep.cl" target="_blank"> Intep</a> &
        @lang('index.footerDesign')<a href="http://www.88medios.cl" target="_blank"> 88Medios</a>
    </div>

</footer>

<script type="text/javascript">

    /*$('.piscoTooltip').piscoToolTip();

    $('.piscoTooltip-top').piscoToolTip({
        position: 'top'
    });*/

</script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script>window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><\/script>')</script>
<!-- Latest compiled and minified JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>