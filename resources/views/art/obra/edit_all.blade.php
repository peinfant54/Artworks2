<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="history.back()" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title custom_align" id="Heading">@lang('location.EditMsg') {{$obra->titulo}}</h4>
            </div>
            <?php /*dd($obra);*/?>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('art/obra/edit') }}">

                    {{ csrf_field() }}
                    <input type="hidden" name="id_obra" value="{{$obra->id}}" />
                    <input type="hidden" name="opc" value="{{ $opc }}" />
                    <input type="hidden" name="opc2" value="{{ $opc2 }}" />
                    <input type="hidden" name="modaledit" value="{{$obra->id}}" /> <!-- Controla la ventana modal cuando ocurrern errores -->
                    <input type="hidden" name="search" value="{{ $texto }}" /> <!-- Controla la ventana modal cuando ocurrern errores -->
                    <input type="hidden" name="xid" value="{{ $xid }}" /> <!-- Controla la ventana modal cuando ocurrern errores -->


                    <div class="EditModal form-group{{ $errors->has('n_inv_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field1')</label>
                        <div class="col-md-6">
                            <input id="n_inv{{ $obra->id }}" type="text" class="form-control" name="n_inv_edit" value="{{ $obra->n_inv }}" required>

                            @if ($errors->has('n_inv_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('n_inv_edit') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="EditModal form-group"><label for="artista" class="col-md-4 control-label">@lang('obra.Field2')</label>

                        <div class="col-md-6">
                            {{Form::select('id_artista', $artist, old('id_artista'),['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class=" EditModal form-group{{ $errors->has('titulo_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field3')</label>
                        <div class="col-md-6">
                            <input id="titulo{{ $obra->id }}" type="text" class="form-control" name="titulo_edit" value="{{ $obra->titulo }}" required autofocus>

                            @if ($errors->has('titulo_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('titulo_edit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('tecnica_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field4')</label>
                        <div class="col-md-6">
                            <input id="tecnica{{ $obra->id }}" type="text" class="form-control" name="tecnica_edit" value="{{ $obra->tecnica }}" autofocus>

                            @if ($errors->has('tecnica_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tecnica_edit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="EditModal form-group{{ $errors->has('dimension_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field5')</label>
                        <div class="col-md-6">
                            <input id="dimension{{ $obra->id }}" type="text" class="form-control" name="dimension_edit" value="{{ $obra->dimension }}" autofocus>

                            @if ($errors->has('dimension_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('dimension_edit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="EditModal form-group{{ $errors->has('ano_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field6')</label>
                        <div class="col-md-6">
                            <input id="ano{{ $obra->id }}" type="text" class="form-control" name="ano_edit" value="{{ $obra->ano }}" autofocus>

                            @if ($errors->has('ano_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('ano_edit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('edicion_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field7')</label>
                        <div class="col-md-6">
                            <input id="edicion{{ $obra->id }}" type="text" class="form-control" name="edicion_edit" value="{{ $obra->edicion }}" autofocus>

                            @if ($errors->has('edicion_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('edicion_edit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('procedencia_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field8')</label>
                        <div class="col-md-6">
                            <input id="edicion{{ $obra->id }}" type="text" class="form-control" name="procedencia_edit" value="{{ $obra->procedencia }}" autofocus>

                            @if ($errors->has('procedencia_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('procedencia_edit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('catalogo_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field9')</label>
                        <div class="col-md-6">
                            <input id="edicion{{ $obra->id }}" type="text" class="form-control" name="catalogo_edit" value="{{ $obra->catalogo }}" autofocus>

                            @if ($errors->has('catalogo_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('catalogo_edit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('certificacion_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field10')</label>
                        <div class="col-md-6">
                            <input id="edicion{{ $obra->id }}" type="text" class="form-control" name="certificacion_edit" value="{{ $obra->certificacion }}" autofocus>

                            @if ($errors->has('certificacion_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('certificacion_edit') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="EditModal form-group{{ $errors->has('valoracion_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field11')</label>
                        <div class="col-md-6">
                            <input id="valoracion{{ $obra->id }}" type="text" class="form-control" name="valoracion_edit" value="{{ $obra->valoracion }}" autofocus>

                            @if ($errors->has('valoracion_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('valoracion_edit') }}</strong>
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

                    <div class="form-group{{ $errors->has('foto1_edit') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field13')</label>
                        <div class="col-md-6">
                            <input id="file1" type="file" class="form-control" name="foto1_edit" accept="image/*" value="{{ $obra->file1 }}"  >

                            @if ($errors->has('foto1_edit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('foto1_edit') }}</strong>
                                </span>
                            @endif
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