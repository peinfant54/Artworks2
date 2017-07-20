<div class="modal fade" id="edit{{ $obra->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('location.EditMsg') {{$obra->titulo}}</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('art/obra/edit') }}">

                    {{ csrf_field() }}
                    <input type="hidden" name="id_obra" value="{{$obra->id}}" />


                    <div class="EditModal form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field1')</label>
                        <div class="col-md-6">
                            <input id="n_inv{{ $obra->id }}" type="text" class="form-control" name="n_inv" value="{{ $obra->n_inv }}" required>

                            @if ($errors->has('n_inv'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('n_inv') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="EditModal form-group"><label for="artista" class="col-md-4 control-label">@lang('obra.Field2')</label>

                        <div class="col-md-6">
                            {{Form::select('id_artista', $artist, old('id_artista'),['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class=" EditModal form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field3')</label>
                        <div class="col-md-6">
                            <input id="titulo{{ $obra->id }}" type="text" class="form-control" name="titulo" value="{{ $obra->titulo }}" required autofocus>

                            @if ($errors->has('titulo'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('tecnica') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field4')</label>
                        <div class="col-md-6">
                            <input id="tecnica{{ $obra->id }}" type="text" class="form-control" name="tecnica" value="{{ $obra->tecnica }}" required autofocus>

                            @if ($errors->has('tecnica'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tecnica') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="EditModal form-group{{ $errors->has('dimension') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field5')</label>
                        <div class="col-md-6">
                            <input id="dimension{{ $obra->id }}" type="text" class="form-control" name="dimension" value="{{ $obra->dimension }}" required autofocus>

                            @if ($errors->has('dimension'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('dimension') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="EditModal form-group{{ $errors->has('ano') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field6')</label>
                        <div class="col-md-6">
                            <input id="ano{{ $obra->id }}" type="text" class="form-control" name="ano" value="{{ $obra->ano }}" required autofocus>

                            @if ($errors->has('ano'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('ano') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('edicion') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field7')</label>
                        <div class="col-md-6">
                            <input id="edicion{{ $obra->id }}" type="text" class="form-control" name="edicion" value="{{ $obra->edicion }}" required autofocus>

                            @if ($errors->has('edicion'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('edicion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('procedencia') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field8')</label>
                        <div class="col-md-6">
                            <input id="edicion{{ $obra->id }}" type="text" class="form-control" name="procedencia" value="{{ $obra->procedencia }}" required autofocus>

                            @if ($errors->has('edicion'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('edicion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('catalogo') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field9')</label>
                        <div class="col-md-6">
                            <input id="edicion{{ $obra->id }}" type="text" class="form-control" name="catalogo" value="{{ $obra->catalogo }}" required autofocus>

                            @if ($errors->has('catalogo'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('catalogo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('certificacion') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field10')</label>
                        <div class="col-md-6">
                            <input id="edicion{{ $obra->id }}" type="text" class="form-control" name="certificacion" value="{{ $obra->certificacion }}" required autofocus>

                            @if ($errors->has('certificacion'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('certificacion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('valoracion') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field11')</label>
                        <div class="col-md-6">
                            <input id="valoracion{{ $obra->id }}" type="text" class="form-control" name="valoracion" value="{{ $obra->valoracion }}" required autofocus>

                            @if ($errors->has('valoracion'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('valoracion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Falta el select de ubicacion-->
                    <div class="EditModal form-group">
                        <label for="email" class="col-md-4 control-label">@lang('obra.Field12')</label>

                        <div class="col-md-6">
                            {{Form::select('id_ubica'. $obra->id, $location, $obra->id_ubica,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg" name="update_edit{{ $obra->id }}" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> @lang('obra.Update')</button>

                </form>
            </div>

            <div class="modal-footer ">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>