@extends('layouts.default_report')
@section('report_name')
Product
@stop
@section('report_description')
Product Funding
@stop

{{-- @section('excel')
{!!Form::open(['method'=>'get','route' =>array('orders.excel')])!!}
{!!Form::hidden('user_excel',null,['id'=>'user_excel'])!!}
{!!Form::hidden('date_excel',null,['id'=>'date_excel'])!!}
{!!Form::hidden('status_excel',null,['id'=>'status_excel'])!!}
{!!Form::submit('Export Excel',['class'=>'btn btn-success pull-right',
'onclick'=>'return order_excel(event);',
'data-url'=>asset('index.php/admin/orders.excel')
])!!}
{!!Form::close()!!}
@stop --}}
@section('form')
{!!Form::open(array('id'=>'search_form', 'method'=>'post','route' =>array('product_funding.search'),'class'=>'form-horizontal'))
!!}
@include('admin.reports.products_fundings.partial.searchfilters')
{!!Form::close()!!}
@stop
@section('table')
<table class="table table-bordered">
<thead>
	<tr>
		<th scope="col" style="white-space: nowrap">Date</th>
		<th scope="col" style="white-space: nowrap">User Name</th>

		<th scope="col" style="white-space: nowrap">Product</th>

    	<th scope="col" style="white-space: nowrap">Story</th>
    	<th scope="col" style="white-space: nowrap">Description</th>
    	<th scope="col" style="white-space: nowrap">Status</th>


	</tr>
</thead>
<tbody>
<?php

// dd($orders);
?>

@foreach ($orders as $item)




	<tr>
		<td  style="white-space: nowrap">{!! explode(' ',$item->created_at)[0] !!}</td>
		<td>{!! $item->user->name !!}</td>

		<td>{{ $item->product->name }}</td>
		{{-- <td>{!!$item->user->name!!}</td>
		<td>{!!$item->user->name !!}</td>
		<td>{!! $item->user->name!!} </td>
		<td>{!! $item->user->name !!} </td> --}}

		<td>
			<a href="" data-toggle="modal" name="activate_delete" data-target=".detail_{!! $item->id !!}">
				<span class=" badge bg-info btn-success">
					Detail</span></a>
			@include('admin.reports.products_fundings.partial.story_modal',['order'=>$item])
		</td>

        <td>
			<a href="" data-toggle="modal" name="activate_delete" data-target=".description_{!! $item->id !!}">
				<span class=" badge bg-info btn-success">
					Detail</span></a>
			@include('admin.reports.products_fundings.partial.des_modal',['order'=>$item])
		</td>
        <td style="white-space: nowrap">
			<?php
				$pending_display = $completed_display = $final_status_display ='display:none';
				if($item->status == 'pending'){
					$pending_display = 'display:block';
				}
				elseif($item->status == 'inprogress'){
					$completed_display = 'display:block';
				}
				else{
					$final_status_display = 'display:block';
				}
			?>

			<div id="pending_btn_{!!$item->id!!}" style="{!!$pending_display!!}">
				<a href="" data-toggle="modal" name="" data-target=".inprogress_request_{!! $item->id !!}">
					<span class=" badge bg-info btn-success ">
					Pending
					</span>

				</a>

				@include('admin.reports.products_fundings.partial.confirmation_modal',
				[
				'order_id'=>$item->id,
				'cell_id'=>'td_'.$item->id,
				'req_status'=>'inprogress_request_'.$item->id,
				'url'=>asset('admin/reports/product_funding/status_update/'.$item->id),
				'status'=>'accepted',
				'msg_status'=>'accepted',
				'btn_class'=>'btn-primary'
				])
			 <a href="" data-toggle="modal" name="" data-target=".reject_request_{!! $item->id !!}">
					<span class=" badge bg-info btn-danger">
						Reject
					</span>
				</a>
				@include('admin.reports.products_fundings.partial.confirmation_modal',
				[
				'order_id'=>$item->id,
				'cell_id'=>'td_'.$item->id,
				'req_status'=>'reject_request_'.$item->id,
				'url'=>asset('admin/reports/product_funding/status_update/'.$item->id),
				'status'=>'rejected',
				'msg_status'=>'reject',
				'btn_class'=>'btn-danger' ])
			</div>
			{{-- <div id="inprogress_btn_{!!$item->id!!}" style="{!!$completed_display!!}">
				<a href="" data-toggle="modal" name="" data-target=".completed_request_{!! $item->id !!}">
					<span class=" badge bg-info btn-success">
						Complete</span></a>
				@include('admin.reports.orders.partial.confirmation_modal',
				[
				'order_id'=>$item->id,
				'cell_id'=>'td_'.$item->id,
				'req_status'=>'completed_request_'.$item->id,
				'url'=>asset('admin/reports/orders/status_update/'.$item->id),
				'status'=>'completed',
				'msg_status'=>'complete',
				'btn_class'=>'btn-success'
				])
			</div> --}}
			<div id="finalstatus_btn_{!!$item->id!!}" style="{!!$final_status_display!!}">
				{!! ucwords($item->status) !!}
			</div>
		</td>



	</tr>
    @endforeach

</tbody>
</table>
@section('pagination')
{{-- <span class="pagination pagination-md pull-right">{!! $orders->render() !!}</span> --}}

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

@include('admin.reports.products_fundings.partial.msg_modal')
@section('extra_css')
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
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
