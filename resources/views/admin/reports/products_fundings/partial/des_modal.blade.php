<div id="" class="modal fade description_{!! $order->id!!} in" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-mg">

        <!-- Modal content-->
        <div class="modal-content confirm" id="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped mg-t editable-datatable">

                    <thead>
                    <tr>
                        <th>Description</th>

                    </tr>
                    </thead>
                    <tbody id="my-modal-table">

                        <?php
// dd($item);

?>
                        <tr>
                            <td>{!!$order->description!!}</td>

                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
