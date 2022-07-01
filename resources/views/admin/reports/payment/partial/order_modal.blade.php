<?php
    $request = $payment->request;

?>
<div id="myModal" class="modal fade detail_{!! $payment->id!!} " role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped mg-t editable-datatable">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                       <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody id="my-modal-table">
                        @foreach($request->request_items as $item)
                        <tr>
                            <td>{!!$item->product->name ?? '' !!}</td>
                            <td>{!!$item->quantity  ?? ''!!}</td>
                            <td>{!!$item->unit_price?? '' !!}</td>
                            <td>{!!$item->final_price ?? ''!!}</td>



                            {{-- <td>{!!$item->product->name !!}</td>
                            <td>{!!$item->quantity !!}</td>
                            <td>{!!$item->unit_price !!}</td>
                            <td>{!!$item->final_price !!}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
