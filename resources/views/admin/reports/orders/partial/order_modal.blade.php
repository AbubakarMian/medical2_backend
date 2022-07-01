<div id="" class="modal fade detail_{!! $order->id!!} in" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-mg">

        <!-- Modal content-->
        <div class="modal-content confirm" id="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped mg-t editable-datatable">

                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Promotion</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody id="my-modal-table">
                       {{-- $item->promotion->name ?? 'No Promotion' --}}
                        @foreach($order->request_items as $item)
                        <?php
// dd($item);

?>
                        <tr>
                            <td>{!!$item->product->name !!}</td>
                            @if($item->promotion)
                            <td>{!!$item->promotion->name !!}</td>
                            @else
                            <td>None</td>
                            @endif
                            @if($item->promotion)
                            <td>{!!$item->promotion->value !!}</td>
                         @else
                            <td>{!!$item->unit_price !!}</td>
                            @endif
                            <td>{!!$item->quantity !!}</td>

                            <td>{!!$item->final_price !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
