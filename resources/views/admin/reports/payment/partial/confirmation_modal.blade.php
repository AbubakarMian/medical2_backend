<div id="myModal" class="modal {!! $req_status !!}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure. You want to {!! $msg_status !!} ?</h4>
            </div>
            <div class="modal-body">
                    {!! csrf_field() !!}

                    <input type="hidden" value="{!! $status !!}">
                    {{-- {!!echo $status ;!!} --}}
                    <button  name="status" class="btn {!! $btn_class!!}"
                             data-dismiss="modal"
                            onclick="change_modal_warning('{!! $url !!}',
                                    '{!! $status !!}',
                                    '{!! $cell_id !!}',
                                    '{!! $order_id !!}')">
                        {!! ucwords($msg_status) !!}
                    </button>
                    {{-- {!!dd($status);!!} --}}

            </div>
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            {{--</div>--}}
        </div>

    </div>
</div>
