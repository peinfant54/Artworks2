<div class="modal fade" id="pass{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('user.EditPassMsg') {{$users->username}}</h4>
            </div>
            <div class="modal-body">

                {{ Form::open(['method' => 'put', 'action' => 'admin\user\UserController@UserEditPassUser', 'class'=>'form-horizontal', 'role'=>'form']) }}
                {{ csrf_field() }}
                <input type="hidden" name="id_user" value="{{$users->id}}" />
                <input type="hidden" name="modalpass" value="{{$users->id}}" />


                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">@lang('user.Field3')</label>

                    <div class="col-md-6">
                        <input id="password_change{{$users->id}}" type="password" class="form-control" name="password_change" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">@lang('user.Field4')</label>

                    <div class="col-md-6">
                        <input id="password_change-confirm{{$users->id}}" type="password" class="form-control" name="password_change_confirmation" required>
                    </div>
                </div>

                <!--div-- class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div-->

                <button type="submit" name="UpdatePass{{$users->id}}" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> @lang('user.Update')</button>

                </form>
            </div>

            <div class="modal-footer ">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>