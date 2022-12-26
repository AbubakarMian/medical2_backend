<style>
    .amt_txt {
        width: 100%;
        border-radius: 8px;

    }

    .rfnd_txt {
        width: 100%;
        margin-top: 2%;
        height: 10%;
        border-radius: 8px;


    }

    .modal-title {
        align-items: center;
    }

    .mdl_hed {
        text-align: center;
    }

    .modal_table {
        width: 100%;
    }

    .modal_table,
    th,
    td {
        border: 1px solid black;
        padding: 3px;
        width: 100%
    }

    .rfnd_btn {
        float: right;
        margin-top: 20px;

    }

    .modal-header {
        min-height: 16.43px;
        padding: 15px;
        border-bottom: 45px solid #e5e5e5;
    }

    .scas {
        font-size: 18px;
        font-weight: 700;
        color: #444343;
    }

    .gfs input {
        border-radius: 0px;
        height: 40px;
        border: 1px solid gray;
        font-size: 12px;
        padding: 9px;
        margin-top: 20px;
    }

    .gfs textarea {
        border-radius: 0px;
        /* height: 40px; */
        border: 1px solid gray;
        font-size: 12px;
        padding: 9px;
        margin-top: 20px;
    }

    .refund_details h3 {
        font-size: 16px;
        font-weight: 500;
    }

    .refund_details td {
        font-size: 13px;
    }

    .gfs th {
        font-size: 12px;
        font-weight: 900;
        color: #767676;
    }
</style>



<div id="myModal" class="modal payment_refund_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content gfs">
            <section>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="mdl_hed">
                        <h3 class="modal-title scas">Are you sure. You want to refund ?</h3>
                    </div>
                    <div>
                        <input type="hidden" class="payment_id">
                        <input type="number" name="payment_text" class="payment_refund_amount amt_txt"
                            placeholder="Refund Amount" required>
                        <br>

                        <textarea name="payment_text" class="payment_refund_reason rfnd_txt" rows="5" placeholder="Reason"></textarea>

                    </div>
                    <button name="status" class="btn btn-primary rfnd_btn" data-dismiss="modal"
                        onclick="payment_refund()">
                        Payment Refund
                    </button>
                </div>
            </section>
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="refund_details">
                    <h3>Refund Details</h3>
                    <table class="modal_table">
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
