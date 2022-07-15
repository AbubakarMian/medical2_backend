@extends('layouts.default_report')
@section('report_name')
Payment
@stop
@section('report_description')

@stop

{{--  @section('excel')
{!!Form::open(['method'=>'get','route' =>array('payment.excel')])!!}
{!!Form::hidden('user_excel',null,['id'=>'user_excel'])!!}
{!!Form::hidden('date_excel',null,['id'=>'date_excel'])!!}
{!!Form::hidden('status_excel',null,['id'=>'status_excel'])!!}
{!!Form::submit('Export Excel',['class'=>'btn btn-success pull-right',
'onclick'=>'return payment_excel(event);',
'data-url'=>asset('index.php/admin/payment.excel')
])!!}
{!!Form::close()!!}
@stop  --}}

@section('form')
{!!Form::open(array('id'=>'search_form', 'method'=>'post','route' =>array('order_payment.index'),'class'=>'form-horizontal'))
!!}
@include('admin.reports.payment.partial.searchfilters')
{!!Form::close()!!}
@stop
@section('table')
<table class="table table-bordered">
<thead>
	<tr>
		<th scope="col" style="white-space: nowrap">Date</th>
		{{--  <th scope="col" style="white-space: nowrap">Payment Id</th>  --}}
		<th scope="col" style="white-space: nowrap">User Name</th>
		<th scope="col" style="white-space: nowrap">Course Name</th>

		{{-- <th scope="col" style="white-space: nowrap">Phone</th>
		<th scope="col" style="white-space: nowrap">Email</th> --}}
		<th scope="col" style="white-space: nowrap">Amount</th>
		{{-- <th scope="col" style="white-space: nowrap">Currency</th> --}}
		{{-- <th scope="col" style="white-space: nowrap">Receipt</th> --}}
		<th scope="col" style="white-space: nowrap">Payment Status</th>

		{{-- <th scope="col" style="white-space: nowrap">Detail</th> --}}


	</tr>
</thead>
<tbody>
    {{-- {{dd($payments)}} --}}
	@foreach($payments as $payment)
  {{-- {{dd($payment)}} --}}

	<tr>
		<td  style="white-space: nowrap">{!! explode(' ',$payment->created_at)[0] !!}</td>
		{{--  <td>{!! $payment->payment_id !!}</td>  --}}
		<td>{!!ucwords( $payment->user->name) ??''!!}</td>
		<td>{!!ucwords($payment->course_register->course->full_name) ??'' !!}</td>
		{{-- <td>{!! $payment->user->phone_no??'' !!}</td>
		<td>{!! $payment->user->email??'' !!}</td> --}}
		<td>{!! $payment->amount!!} </td>
		{{-- <td>{!! $payment->currency !!} </td> --}}
	
        <td style="white-space: nowrap">
			<?php
				$pending_display = $completed_display = $final_status_display ='display:none';
				if($payment->status == 'pending'){
					$pending_display = 'display:block';
				}
				elseif($payment->status == 'inprogress'){
					$completed_display = 'display:block';
				}
				else{
					$final_status_display = 'display:block';
				}
			?>

			<div id="pending_btn_{!!$payment->id!!}" style="{!!$pending_display!!}">
				<a href="" data-toggle="modal" name="" data-target=".inprogress_request_{!! $payment->id !!}">
					<span class=" badge bg-info btn-success ">
						In Progress
					</span>
				</a>
				@include('admin.reports.payment.partial.confirmation_modal',
				[
				'order_id'=>$payment->id,
				'cell_id'=>'td_'.$payment->id,
				'req_status'=>'inprogress_request_'.$payment->id,
				'url'=>asset('admin/reports/payment/status_update/'.$payment->id),
				'status'=>'completed',
				'msg_status'=>'complete',
				'btn_class'=>'btn-primary'
				])
				<a href="" data-toggle="modal" name="" data-target=".reject_request_{!! $payment->id !!}">
					<span class=" badge bg-info btn-danger">
						Reject
					</span>
				</a>
				@include('admin.reports.payment.partial.confirmation_modal',
				[
				'order_id'=>$payment->id,
				'cell_id'=>'td_'.$payment->id,
				'req_status'=>'reject_request_'.$payment->id,
				'url'=>asset('admin/reports/payment/status_update/'.$payment->id),
				'status'=>'rejected',
				'msg_status'=>'reject',
				'btn_class'=>'btn-danger' ])
			</div>
			<div id="inprogress_btn_{!!$payment->id!!}" style="{!!$completed_display!!}">
				<a href="" data-toggle="modal" name="" data-target=".completed_request_{!! $payment->id !!}">
					<span class=" badge bg-info btn-success">
						Complete</span></a>
				@include('admin.reports.payment.partial.confirmation_modal',
				[
				'order_id'=>$payment->id,
				'cell_id'=>'td_'.$payment->id,
				'req_status'=>'completed_request_'.$payment->id,
				'url'=>asset('admin/reports/payment/status_update/'.$payment->id),
				'status'=>'completed',
				'msg_status'=>'complete',
				'btn_class'=>'btn-success'
				])
			</div>
			<div id="finalstatus_btn_{!!$payment->id!!}" style="{!!$final_status_display!!}">
				{!! ucwords($payment->status) !!}
			</div>
		</td>



	
	</tr>
	@endforeach
</tbody>
</table>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $payments->render() !!}</span>

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

@include('admin.reports.payment.partial.msg_modal')
@section('extra_css')
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/MonthPicker.min.css') !!}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{!! asset('css/examples.css') !!}" />
@stop
@section('app_jquery')
<script>
	function change_modal_warning(status_url,status,cell_id,payment_id) {
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
						$('#pending_btn_'+payment_id).css('display','none');
						$('#inprogress_btn_'+payment_id).css('display','block');
					}
					else{ // completed , rejected
						$('#pending_btn_'+payment_id).css('display','none');
						$('#inprogress_btn_'+payment_id).css('display','none');
						$('#finalstatus_btn_'+payment_id).html(data.new_value);
						$('#finalstatus_btn_'+payment_id).css('display','block');
					}
                    $('#'+cell_id).html(data.new_value);
                    console.log("response",data);
                },
                error: function(errordata){
                    console.log(errordata)
                }
            }
            )}

        function payment_excel(event){
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
