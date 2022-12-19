<div id="myModal" class="modal payment_refund_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure. You want to refund ?</h4>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <input type="hidden" >
                {{-- {!!echo $status ;!!} --}}
                <div>
                    {{-- <label>
                        Payment Refund Amount
                    </label> --}}
                    <input type="hidden" class="payment_id" >
                    <input type="number" name="payment_text" class="payment_refund_amount" placeholder="Refund Amount" required>
                    {{-- <input type="textarea" name="payment_refund_reason" placeholder="Reason" class="payment_refund_reason" > --}}
                </br>

                    <textarea name="payment_text" class="payment_refund_reason" placeholder="Reason"></textarea>

                </div>
                </br>
                <button name="status" class="btn btn-primary" data-dismiss="modal" onclick="payment_refund(

                                    )">
                    Payment Refund
                </button>
                {{-- {!!dd($status);!!} --}}

            </div>
            {{--<div class="modal-footer">--}}
            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            {{--</div>--}}
        </div>

    </div>
</div>
