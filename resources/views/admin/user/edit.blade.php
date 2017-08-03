<div class="modal fade" id="edit{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('user.EditMsg') {{$users->username}}</h4>
            </div>
            <div class="modal-body">

                    {{ Form::open(['method' => 'put', 'action' => 'admin\user\UserController@UserEdit', 'class'=>'form-horizontal', 'role'=>'form']) }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id_user" value="{{$users->id}}" />
                    <input type="hidden" name="modaledit" value="{{$users->id}}" />
                    <div class="EditModal form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="name" class="form-horizontal col-md-4 control-label">@lang('user.Field1')</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="username_edit" value="{{$users->username}}" readonly required autofocus>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="EditModal form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">@lang('user.Field2')</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email_edit" value="{{$users->email}}" readonly required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group">
                        <label for="email" class="col-md-4 control-label">@lang('user.Field2') Perfil</label>

                        <div class="col-md-6">
                            {{Form::select('id_profile_edit'.$users->id, $profile, $users->id_profile,['class' => 'form-control'])}}
                        </div>
                    </div>

                    <!--div-- class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div-->

                    <button type="submit" name="UpdateEditUser{{$users->id}}" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> @lang('user.Update')</button>

                </form>
            </div>

            <div class="modal-footer ">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>