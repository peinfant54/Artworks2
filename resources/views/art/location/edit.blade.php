<div class="modal fade" id="edit{{ $loc->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('location.EditMsg') {{$loc->name}}</h4>
            </div>
            <div class="modal-body ">
                <form class="form-horizontal " role="form" method="POST" action="{{ url('art/location/edit') }}">

                    {{ csrf_field() }}
                    <input type="hidden" name="id_location" value="{{$loc->id}}" />
                    <div class=" EditModal form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
                        <label for="name" class="col-md-4 control-label">@lang('location.Field1')</label>
                        <div class="col-md-6">
                            <input id="name_edit{{ $loc->id }}" type="text" class="form-control" name="name" value="{{ $loc->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg" name="update_edit{{ $loc->id }}" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> @lang('location.Update')</button>
                </form>
            </div>

            <div class="modal-footer ">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>