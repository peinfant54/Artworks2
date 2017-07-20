<div class="modal fade"  id="permissions{{ $profiles->id }}" tabindex="-1" role="dialog" aria-labelledby="permissions" aria-hidden="true">
    <div class="modal-dialog " xxstyle="width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">@lang('profile.EditMsg') {{$profiles->name}}</h4>
            </div>

            <div class="modal-body">
                <form role="form" method="POST" action="{{ url('admin/profile/permissions') }}">

                    {{ csrf_field() }}
                    <input type="hidden" name="id_profile" value="{{$profiles->id}}" />



                    <div class="container">

                        <div class="row">
                            <div class="Mayuscula col-md-2 col-sm-2 col-xs-2"><h4>@lang('profile.Col1')</h4></div>

                            <div class=" col-md-2 col-xs-2 col-sm-2 text-center"><h4>@lang('profile.Col3')</h4></div>
                            <div class=" col-md-2 col-xs-2 col-sm-2 text-center"><h4>@lang('profile.Col4')</h4></div>
                            <div class=" col-md-2 col-xs-2 col-sm-2 text-center"><h4>@lang('profile.Col5')</h4></div>
                            <div class=" col-md-2 col-xs-2 col-sm-2 text-center"><h4>@lang('profile.Col6')</h4></div>
                        </div>
                        @php
                            $group = 0;
                        @endphp

                        <div class="row"><div class="col-md-12"><hr></div> </div>
                        @foreach ($allmod as $m)

                            @if($group != $m->id_group)
                                <div class="row"><div class="col-md-12 col-xs-12 col-sm-12 text-center"><h4>{{$m->group->desc}}</h4></div> </div>
                                <div class="row"><div class="col-md-12 col-xs-12 col-sm-12"><hr></div> </div>

                                @php
                                    $group = $m->id_group;
                                @endphp

                            @endif


                            <div class="row">
                                <div class="col-md-2 col-xs-2 col-sm-2">{{$m->name}}</div>

                                <div class="col-md-2 col-xs-2 col-sm-2 center-block text-center">
                                    @php
                                     $mar = \App\Models\CoreModel\CorePermission::where([['id_profile', '=', $profiles->id], ['id_module', '=',$m->id]])->get();
                                    @endphp
                                    @if(count($mar))

                                        @foreach($mar as $d)

                                            @if($d->rread == 1 and $d->id_module == $m->id)
                                                {{Form::checkbox('read'.$m->id, '1', true , ['id' => $profiles->id.'read'.$m->id]) }}

                                            @elseif($d->rread == 0 and $d->id_module == $m->id)
                                                {{Form::checkbox('read'.$m->id, '0', false, ['id' => $profiles->id.'read'.$m->id])}}
                                            @endif
                                        @endforeach
                                    @else
                                        {{Form::checkbox('read'.$m->id, '0', false, ['id' => $profiles->id.'read'.$m->id])}}
                                    @endif
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2 center-block text-center">
                                    @if(count($mar))
                                        @foreach($mar as $d)

                                            @if($d->wwrite == 1 and $d->id_module == $m->id)
                                                {{Form::checkbox('write'.$m->id, '1', true, ['id' => $profiles->id.'write'.$m->id])}}

                                            @elseif($d->wwrite == 0 and $d->id_module == $m->id)
                                                {{Form::checkbox('write'.$m->id, '0', false, ['id' => $profiles->id.'write'.$m->id])}}
                                            @endif
                                        @endforeach
                                    @else
                                        {{Form::checkbox('write'.$m->id, '0', false, ['id' => $profiles->id.'write'.$m->id])}}
                                    @endif
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2 center-block text-center">
                                    @if(count($mar))
                                        @foreach($mar as $d)

                                            @if($d->eedit == 1 and $d-> id_module == $m->id)
                                                {{Form::checkbox('edit'.$m->id, '1', true, ['id' => $profiles->id.'edit'.$m->id])}}

                                            @elseif($d->eedit == 0 and $d->id_module == $m->id)
                                                {{Form::checkbox('edit'.$m->id, '0', false, ['id' => $profiles->id.'edit'.$m->id])}}
                                            @endif
                                        @endforeach
                                    @else
                                        {{Form::checkbox('edit'.$m->id, '0', false, ['id' => $profiles->id.'edit'.$m->id])}}
                                    @endif

                                   </div>
                                <div class="col-md-2 col-xs-2 col-sm-2 center-block text-center">
                                    @if(count($mar))
                                        @foreach($mar as $d)

                                            @if($d->ddelete == 1 and $d->id_module == $m->id)
                                                {{Form::checkbox('delete'.$m->id, '1', true, ['id' => $profiles->id.'delete'.$m->id])}}

                                            @elseif($d->ddelete == 0 and $d->id_module == $m->id)
                                                {{Form::checkbox('delete'.$m->id, '0', false, ['id' => $profiles->id.'delete'.$m->id])}}
                                            @endif
                                        @endforeach
                                    @else
                                        {{Form::checkbox('delete'.$m->id, '0', false, ['id' => $profiles->id.'delete'.$m->id])}}
                                    @endif
                                   </div>


                            </div>
                            <div class="row"><div class="col-md-12 col-xs-12 col-sm-12"><hr></div> </div>

                        @endforeach
                    </div>





                    <button type="submit" name="UpdatePer{{$profiles->id}}" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> @lang('profile.Update')</button>

                </form>
            </div>

            <div class="modal-footer ">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>