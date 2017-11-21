<div class="modal fade" id="delete{{ $obra->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('obra.DelMsg1File') "{{ $file->name }}"?</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> @lang('obra.DelMsg2File') "{{ $file->name }}"?</div>

            </div>
            <div class="modal-footer ">
                @if($opc==5000)
                    <form method="post" action="{{url('art/obra/deletepdf/')}}">
                @else
                    <form method="post" action="{{url('art/obra/deletepdf2/')}}">
                @endif

                    {{csrf_field()}}
                    <input type="hidden" name="id_obra" value="{{$obra->id}}" />
                    <input type="hidden" name="id_file" value="{{$file->id}}" />

                    <input type="hidden" name="opc" value="{{ $opc }}" />
                    <input type="hidden" name="opc2" value="{{ $opc2 }}" />

                    <input type="hidden" name="search" value="{{ $search }}" /> <!-- Controla la ventana modal cuando ocurrern errores -->
                    <input type="hidden" name="xid" value="{{ $xid }}" /> <!-- Controla la ventana modal cuando ocurrern errores -->


                    <button type="submit" name = "yes{{$file->id}}" class="btn btn-success" >
                        <span class="glyphicon glyphicon-ok-sign"></span> @lang('obra.Yes')
                    </button>
                </for m>
                <button type="button" name = "no" class="btn btn-default" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> @lang('obra.No')
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>