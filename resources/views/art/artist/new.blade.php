<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('artist.NewMsg')</h4>
            </div>
            <div class="modal-body formulario">

                <form class="form-horizontal" role="form" method="POST" action="{{ url('art/artist/create') }}">
                    {{ csrf_field() }}

                    <div class=" form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('artist.Field1')</label>
                        <div class="col-md-6">
                            <input id="nombre_new" type="text" class="form-control" name="name" value="" required autofocus>

                            @if ($errors->has('nombre'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class=" form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('artist.Field2')</label>
                        <div class="col-md-6">
                            <input id="apellido_new" type="text" class="form-control" name="lastname" value="" required >

                            @if ($errors->has('apellido'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <!--div-- class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div-->

                    <button type="submit" name = "save"  class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> @lang('artist.Save')</button>
                </form>
            </div>
            <div class="modal-footer ">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>