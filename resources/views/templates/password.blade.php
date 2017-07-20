<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('index.EditPassMsg')</h4>
            </div>
            <div class="modal-body">

                {{ Form::open(['method' => 'post', 'action' => 'admin\user\UserController@UserCheckPass', 'class'=>'form-horizontal', 'role'=>'form']) }}
                {{ csrf_field() }}
                <input type="hidden" name="id_user" value="" />
                <input type="hidden" name="modalpass" value="" />


                <div class="form-group{{ Session::has('dbUpdatedPass') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">@lang('index.Leyend1')</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password1" required>

                        @if(Session::has('dbUpdatedPass'))
                            <span class="help-block">
                                <strong>@lang('index.PassError')</strong>
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

                <button type="submit" name="Next" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> @lang('index.Next')</button>

                </form>
            </div>

            <div class="modal-footer ">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>