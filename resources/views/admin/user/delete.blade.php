<div class="modal fade" id="delete{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('user.DelMsg1') "{{ $users->username }}"?</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> @lang('user.DelMsg2') "{{ $users->username }}"?</div>

            </div>
            <div class="modal-footer ">
                <form method="post" action="{{url('admin/user/delete/')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="id_user" value="{{$users->id}}" />

                <button type="submit" name = "yes{{$users->id}}" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> @lang('user.Yes')</button>
                </form>
                <button type="button" name = "no" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> @lang('user.No')</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>