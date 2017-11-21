<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
            //dd($obra);
            ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title custom_align" id="Heading">
                    @lang('obra.NewMsg')
                </h4>
            </div>

            <div class="modal-body">

                <form class="form-horizontal formularios" id="register" role="form" method="POST" action="{{ url('art/obra/createpdf2') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="obraid" value="{{$obra->id}}" />
                    <input type="hidden" name="opc" value="{{ $opc }}" />
                    <input type="hidden" name="opc2" value="{{ $opc2 }}" />
                    <input type="hidden" name="modaledit" value="{{$obra->id}}" /> <!-- Controla la ventana modal cuando ocurrern errores -->
                    <input type="hidden" name="search" value="{{ $texto }}" /> <!-- Controla la ventana modal cuando ocurrern errores -->
                    <input type="hidden" name="xid" value="{{ $xid }}" /> <!-- Controla la ventana modal cuando ocurrern errores -->
                    <input type="hidden" name="n_inv_edit" value="{{ $obra->n_inv }}" />


                    <div class="form-group{{ $errors->has('pdf.0') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('obra.Field14')</label>
                        <div class="col-md-6">
                            <input id="pdf" type="file" class="form-control" name="pdf[]" accept=".pdf" value="{{ old('pdf.0') }}" multiple required />
                            @if ($errors->has('pdf.0'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('pdf.0') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!--div-- class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div-->

                    <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;" name="save">
                        <span class="glyphicon glyphicon-ok-sign"></span> @lang('obra.Save')
                    </button>
                </form>
            </div>
            <!--div class="modal-footer ">

            </div -->

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>