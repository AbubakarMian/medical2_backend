<div id="myModal" class="modal payment_refund_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="mdl_hed">
                    <h3 class="modal-title">Are you sure. You want to refund ?</h3>
                </div>
                <div>
                    <input type="hidden" class="payment_id">
                    <input type="number" name="payment_text" class="payment_refund_amount amt_txt"
                        placeholder="Refund Amount" required>
                    <br>

                    <textarea name="payment_text" class="payment_refund_reason rfnd_txt" placeholder="Reason"></textarea>

                </div>
                <br>
                <button name="status" class="btn btn-primary" data-dismiss="modal" onclick="payment_refund()">
                    Payment Refund
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="refund_details">
                    Refund Details
                    <table>
                        <thead>
                            <th>Payment Id</th>
                            <th>Refund Amount</th>
                            <th>Status</th>
                            <th>Created at</th>
                        </thead>
                        <tbody class="refund_details_body"></tbody>
                    </table>
                </div>


            </div>
            {{-- <div class="modal-footer"> --}}
            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
            {{-- </div> --}}
        </div>

    </div>
</div>
<style>
    .amt_txt {
        width: 50%;
    }

    .rfnd_txt {
        width: 50%;
        margin-top: 2%;
    }

    .txt_boxes {
        align-items: center;
        margin-top: 30px;


    }

    .mdl_hed {
        text-align: center;
    }
</style>
