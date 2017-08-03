<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('user.NewMsg')</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" id="register" role="form" method="POST" action="{{ url('admin/user/create') }}">
                    {{ csrf_field() }}
                    <ul class="alert-box warning radius">
                        @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                    <input type="hidden" name="modalnew" value="0" />
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('user.Field1')</label>
                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">@lang('user.Field2')</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">@lang('user.Field5')</label>

                        <div class="col-md-6">
                           {{Form::select('id_profile_new', $profile, old('id_profile_new'),['class' => 'form-control'])}}
                        </div>
                    </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('user.Field3')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!--div-- class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div-->

                    <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;" name="save"><span class="glyphicon glyphicon-ok-sign"></span> @lang('user.Save')</button>
                </form>
            </div>
            <div class="modal-footer ">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>