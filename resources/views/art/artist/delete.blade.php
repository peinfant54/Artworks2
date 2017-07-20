<div class="modal fade" id="delete{{ $loc->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('artist.DelMsg1') "{{ $loc->nombre }} {{ $loc->apellido }}"?</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> @lang('artist.DelMsg2') "{{ $loc->nombre }} {{ $loc->apellido }}"?</div>

            </div>
            <div class="modal-footer ">
                <form method="post" action="{{url('art/artist/delete/')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="id_artist" value="{{$loc->id}}" />

                    <button type="submit" id="Yes{{$loc->id}}" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> @lang('artist.Yes')</button>
                </form>
                <button type="button"  class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> @lang('artist.No')</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>