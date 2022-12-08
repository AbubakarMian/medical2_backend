<div id="myModal" class="modal {!! $req_status !!}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure. You want to {!! $msg_status !!}  {{$amount}}?</h4>
            </div>
            <div class="modal-body">
                    {!! csrf_field() !!}
                    
                    <input type="hidden" value="{!! $status !!}">
                    {{-- {!!echo $status ;!!} --}}
                    <div>
<label>
    Payment Refund Amount
</label>
                     <input type="number" name="payment_text" class="payment_refund_amount_{{$payment_id}}" required>
                    
</div>
</br>
                    <button  name="status" class="btn {!! $btn_class!!}"
                             data-dismiss="modal"
                            onclick="change_modal_warning('{!! $url !!}',
                                    '{!! $msg_status !!}',
                                    '{!! $payment_id !!}'
                                    )",
                                    >
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