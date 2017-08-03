<div class="modal fade" id="delete{{ $obra->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('obra.DelMsg1') "{{ $obra->n_inv }}"?</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> @lang('obra.DelMsg2') "{{ $obra->n_inv }}"?</div>

            </div>
            <div class="modal-footer ">
                <form method="post" action="{{url('art/obra/delete/')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="id_obra" value="{{$obra->id}}" />

                    <button type="submit" name = "yes{{$obra->id}}" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> @lang('obra.Yes')</button>
                </form>
                <button type="button" name = "no" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> @lang('obra.No')</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>