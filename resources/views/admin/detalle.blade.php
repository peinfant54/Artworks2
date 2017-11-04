<div class="modal fade" id="detalle{{ $obra->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('obra.DetailsMsg'): <strong>{{$obra->titulo}}</strong></h4>
            </div>
            <div class="modal-body">

                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW70">Foto</label>
                    <div class="col-md-6">
                        @if($obra->file1)
                            <img class="InfoImg" src="{{asset('storage/Arts_Small/'.$obra->file1)}}" alt="Park">
                        @else
                            <img class="InfoImg" src="{{asset('storage/No_Image.png')}}" alt="Park">
                        @endif

                    </div>
                </div>


                    <div class="EditModal form-group ">
                        <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field1')</label>
                        <div class="col-md-6">



                        @if($editar_obra == 1)
                            <a href="{{ URL::to('art/obra/edit/'. $obra->id .'/' . $opc .'/' . $texto.'/'.$opc2.'/'.$xid ) }}"  title="@lang('obra.EditMsg')">{{ $obra->n_inv }}</a>
                        @else
                            {{ $obra->n_inv }}
                        @endif



                        </div>
                    </div>

                    <div class="EditModal form-group">
                        <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field2')</label>
                        <div class="col-md-6">
                            {{ $obra->artist->nombre }} {{ $obra->artist->apellido }}
                        </div>
                    </div>

                    <div class="EditModal form-group">
                        <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field4')</label>
                        <div class="col-md-6">
                            {{ $obra->tecnica }}
                        </div>
                    </div>
                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field5')</label>
                    <div class="col-md-6">
                        {{ $obra->dimension }}
                    </div>
                </div>

                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field6')</label>
                    <div class="col-md-6">
                        {{ $obra->ano }}
                    </div>
                </div>

                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field7')</label>
                    <div class="col-md-6">
                        {{ $obra->edicion }}
                    </div>
                </div>

                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field8')</label>
                    <div class="col-md-6">
                        {{ $obra->procedencia }}
                    </div>
                </div>

                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field9')</label>
                    <div class="col-md-6">
                        {{ $obra->catalogo }}
                    </div>
                </div>

                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field10')</label>
                    <div class="col-md-6">
                        {{ $obra->certificacion }}
                    </div>
                </div>
                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field11')</label>
                    <div class="col-md-6">
                        {{ $obra->valoracion }}
                    </div>
                </div>
                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field12')</label>
                    <div class="col-md-6">
                        {{ $obra->location->name }}
                    </div>
                </div>
                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field15')</label>
                    <div class="col-md-6">
                        {{ $obra->obs}}
                    </div>
                </div>
                <div class="EditModal form-group">
                    <label for="name" class="col-md-4 control-label MinW170">@lang('obra.Field14')</label>
                    <div class="col-md-6">
                        @foreach ($obra->files as $files)
                            <p><a href="{{asset('storage/pdfs/'.$files->name)}}" target="_blank">{{ $files->name }}</a></p>
                        @endforeach

                    </div>
                </div>


            </div>


            <div class="modal-footer ">
                <a href="{{ URL::to('art/obra/exportArt/'.$obra->id) }}" title="@lang('obra.ExportMsg')"><i class="material-icons" style="float:left;">picture_as_pdf</i></a>
                @if($borrar_obra == 1)
                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button name="delete{{ $obra->id }}" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" cconclick="BorrarObra({{ $obra->id }})" data-target="#delete{{ $obra->id }}" title="@lang('obra.DeleteMsg'){{$obra->n_inv}}"><span class="glyphicon glyphicon-trash"></span></button></p>
                @endif
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>