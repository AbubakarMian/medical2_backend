@extends('layouts.default_report')
@section('report_name')
Orders
@stop
@section('report_description')
Product Sales
@stop

@section('excel')
{!!Form::open(['method'=>'get','route' =>array('orders.excel')])!!}
{!!Form::hidden('user_excel',null,['id'=>'user_excel'])!!}
{!!Form::hidden('date_excel',null,['id'=>'date_excel'])!!}
{!!Form::hidden('status_excel',null,['id'=>'status_excel'])!!}
{!!Form::submit('Export Excel',['class'=>'btn btn-success pull-right',
'onclick'=>'return order_excel(event);',
'data-url'=>asset('index.php/admin/orders.excel')
])!!}
{!!Form::close()!!}
@stop
@section('form')
{!!Form::open(array('id'=>'search_form', 'method'=>'post','route' =>array('orders.index'),'class'=>'form-horizontal'))
!!}
@include('admin.reports.orders.partial.searchfilters')
{!!Form::close()!!}
@stop
@section('table')
<table class="table table-bordered">
<thead>
	<tr>
		<th scope="col" style="white-space: nowrap">Date</th>
		<th scope="col" style="white-space: nowrap">Name</th>

		<th scope="col" style="white-space: nowrap">Email</th>
		<th scope="col" style="white-space: nowrap">Phone</th>
		<th scope="col" style="white-space: nowrap">Address</th>
		<th scope="col" style="white-space: nowrap">Total Amount </th>
		<th scope="col" style="white-space: nowrap">Product Price</th>
        {{-- <th scope="col" style="white-space: nowrap">Promotion</th> --}}
		<th scope="col" style="white-space: nowrap">Coupon</th>

		<th scope="col" style="white-space: nowrap">Order</th>
		<th scope="col" style="white-space: nowrap">Status</th>

	</tr>
</thead>
<tbody>
<?php


?>

	@foreach($orders as $order)


	<tr>
		<td  style="white-space: nowrap">{!! explode(' ',$order->created_at)[0] !!}</td>
		<td>{!! $order->user->name !!}</td>

		<td>{!! $order->user->email !!}</td>
		<td>{!! $order->user->phone_no !!}</td>
		<td>{!!$order->user->address !!}</td>
		<td>{!! $order->total_price!!} </td>
		<td>{!! $order->request_item_price !!} </td>
        {{-- <td>{!! $order->request_items[0]->promotion->name ?? 'No Promotion' !!} </td> --}}
        <td>{!! $order->promo_code->name ?? 'No Coupon' !!} </td>

		<td>
			<a href="" data-toggle="modal" name="activate_delete" data-target=".detail_{!! $order->id !!}">
				<span class=" badge bg-info btn-success">
					Detail</span></a>
			@include('admin.reports.orders.partial.order_modal',['order'=>$order])
		</td>
		<td style="white-space: nowrap">
			<?php
				$pending_display = $completed_display = $final_status_display ='display:none';
				if($order->status == 'pending'){
					$pending_display = 'display:block';
				}
				elseif($order->status == 'inprogress'){
					$completed_display = 'display:block';
				}
				else{
					$final_status_display = 'display:block';
				}
			?>

			<div id="pending_btn_{!!$order->id!!}" style="{!!$pending_display!!}">
				<a href="" data-toggle="modal" name="" data-target=".inprogress_request_{!! $order->id !!}">
					<span class=" badge bg-info btn-success ">
						Completed
					</span>

				</a>

				@include('admin.reports.orders.partial.confirmation_modal',
				[
				'order_id'=>$order->id,
				'cell_id'=>'td_'.$order->id,
				'req_status'=>'inprogress_request_'.$order->id,
				'url'=>asset('admin/reports/orders/status_update/'.$order->id),
				'status'=>'completed',
				'msg_status'=>'complete',
				'btn_class'=>'btn-primary'
				])
			 <a href="" data-toggle="modal" name="" data-target=".reject_request_{!! $order->id !!}">
					<span class=" badge bg-info btn-danger">
						Reject
					</span>
				</a>
				@include('admin.reports.orders.partial.confirmation_modal',
				[
				'order_id'=>$order->id,
				'cell_id'=>'td_'.$order->id,
				'req_status'=>'reject_request_'.$order->id,
				'url'=>asset('admin/reports/orders/status_update/'.$order->id),
				'status'=>'rejected',
				'msg_status'=>'reject',
				'btn_class'=>'btn-danger' ])
			</div>
			<div id="inprogress_btn_{!!$order->id!!}" style="{!!$completed_display!!}">
				<a href="" data-toggle="modal" name="" data-target=".completed_request_{!! $order->id !!}">
					<span class=" badge bg-info btn-success">
						Complete</span></a>
				@include('admin.reports.orders.partial.confirmation_modal',
				[
				'order_id'=>$order->id,
				'cell_id'=>'td_'.$order->id,
				'req_status'=>'completed_request_'.$order->id,
				'url'=>asset('admin/reports/orders/status_update/'.$order->id),
				'status'=>'completed',
				'msg_status'=>'complete',
				'btn_class'=>'btn-success'
				])
			</div>
			<div id="finalstatus_btn_{!!$order->id!!}" style="{!!$final_status_display!!}">
				{!! ucwords($order->status) !!}
			</div>
		</td>



	</tr>
	@endforeach
</tbody>
</table>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $orders->render() !!}</span>

<div class="col-md-3 pull-left">
	<div class="form-group text-center">
		<div>
			{!! Form::open(['method' => 'get', 'route' => ['dashboard']]) !!}
			{!! Form::submit('Cancel', ['class' => 'btn btn-default btn-block btn-lg btn-parsley']) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
@stop

@include('admin.reports.orders.partial.msg_modal')
@section('extra_css')
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/MonthPicker.min.css') !!}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{!! asset('css/examples.css') !!}" />
@stop
@section('app_jquery')
<script>
	function change_modal_warning(status_url,status,cell_id,order_id) {
            console.log('url',status_url);
            console.log('status',status);
            $.ajax({
                url:status_url,
                method:'POST',
                data: {'_token' :'{!! csrf_token() !!}',
                       'status' : status
                      },
                success: function(data){
					if(data.new_value=='Inprogress'){
						$('#pending_btn_'+order_id).css('display','none');
						$('#inprogress_btn_'+order_id).css('display','block');
					}
					else{ // completed , rejected
						$('#pending_btn_'+order_id).css('display','none');
						$('#inprogress_btn_'+order_id).css('display','none');
						$('#finalstatus_btn_'+order_id).html(data.new_value);
						$('#finalstatus_btn_'+order_id).css('display','block');
					}
                    $('#'+cell_id).html(data.new_value);
                    console.log("response",data);
                },
                error: function(errordata){
                    console.log(errordata)
                }
            }
            )}

        function order_excel(event){
            $('#user_excel').val( $('#user').val());
            $('#req_num_excel').val( $('#req_num').val());
            $('#date_excel').val( $('#reservationtime').val());
            $('#status_excel').val( $('#status').val());
        }

        // function set_lat_long(lat , long , location){
		// 	alert('st');
        //     $('#lat').val('24.8607');
        //     $('#long').val('67.0011');
        //     $('#map-title').html('<b>Address: 	&nbsp;	&nbsp;</b>'+location);
        // }

        function show_note(msg){
            $('#msg_div').html(msg);
		}

</script>
@endsection
