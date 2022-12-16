@extends('layouts.default_report')
@section('report_name')
    Payment
@stop
@section('report_description')

@stop


{{-- @section('form')
    {!! Form::open([
        'id' => 'search_form',
        'method' => 'post',
        'route' => ['order_payment.index'],
        'class' => 'form-horizontal',
    ]) !!}
    @include('admin.reports.payment.partial.searchfilters')
    {!! Form::close() !!}
@stop --}}
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
		<th scope="col" style="white-space: nowrap">Payment Refund</th>

                {{-- <th scope="col" style="white-space: nowrap">Detail</th> --}}


            </tr>
        </thead>
        <tbody></tbody>
    </table>
@section('app_jquery')

<script>

$(document).ready(function(){

    fetchRecords();

    function fetchRecords(){

       $.ajax({

         url: '{!!asset("admin/reports/payments/0")!!}',
         type: 'get',
         dataType: 'json',
         success: function(response){
            $("#userTable").css("opacity",1);

           var len = response['data'].length;


              for(var i=0; i<len; i++){

                var date =  response['data'][i].id;
                var user_name = response['data'][i].user.name;
                var course_name = response['data'][i].course.full_name;
                var amount = response['data'][i].amount;
                var payment_status = response['data'][i].color;
                var payment_refund = response['data'][i].color;


                var tr_str = "<tr>" +
                    "<td>" + date + "</td>" +
                    "<td>" + user_name + "</td>" +
                    "<td>" + course_name + "</td>" +
                    "<td>" + payment_status + "</td>" +
                    "<td>" + payment_refund + "</td>" +
                    "<td>" + amount + "</td>" +
                    "<td>" + amount + "</td>" +
                "</tr>";

                 $("#userTable tbody").append(tr_str);
                }
                $('#userTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                });
        }
       });
    }

});

function set_msg_modal(msg){
        $('.set_msg_modal').html(msg);
    }

</script>
@endsection

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
		<th scope="col" style="white-space: nowrap">Payment Refund</th>

                {{-- <th scope="col" style="white-space: nowrap">Detail</th> --}}


            </tr>
        </thead>
        <tbody>

            @foreach ($student_fees as $student_fee)

                <tr>
                    <td style="white-space: nowrap">{!! explode(' ', $student_fee->created_at)[0] !!}</td>
                    {{--  <td>{!! $student_fee->payment_id !!}</td>  --}}
                    <td>{!! ucwords($student_fee->user->name) ?? '' !!}</td>
                    <td>{!! ucwords($student_fee->course->full_name) ?? '' !!}</td>
                    {{-- <td>{!! $student_fee->user->phone_no??'' !!}</td>
		             <td>{!! $student_fee->user->email??'' !!}</td> --}}
                    <td>{!! $student_fee->amount !!} </td>

				<!--  -->
				<td style="white-space: nowrap">
                    @if($student_fee->payment_id)
                        Paid
                    @else
                        Pending
                    @endif

                    </td>
		<td style="white-space: nowrap">

            @if($student_fee->payment_id)
			<div id="pending_refund_btn_{!!$student_fee->payment_id!!}">
				<a href="" data-toggle="modal" name="" data-target=".refund_request_{!! $student_fee->payment_id !!}">
					<span class="badge bg-info btn-success" style="width: 108px">
						Payment Refund
					</span>
				</a>
				@include('admin.reports.payment.partial.payment_refund',
				[
				'req_status'=>'refund_request_'.$student_fee->payment_id,
				'payment_id'=> $student_fee->payment_id,
				'amount'=>$student_fee->amount,
				'url'=>asset('admin/reports/payment/payment_refund/'.$student_fee->payment_id),
				'msg_status'=>'Payment Refund',
				'btn_class'=>'btn-primary'
				])

                @endif

            </div>
		</td>





                </tr>
            @endforeach
        </tbody>
    </table>
@section('pagination')
    <span class="pagination pagination-md pull-right">{!! $student_fees->render() !!}</span>

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
	function payment_refund(url,msg_status,payment_id) {

            console.log('status',status);
            console.log('url',url);
			var payment_refund_amount = $('.payment_refund_amount_'+payment_id).val();
			console.log('payment_refund_amount_',payment_refund_amount);

            $.ajax({
                url:url,
                method:'POST',
                data: {'_token' :'{!! csrf_token() !!}',
                       'status' : status,
                       'payment_refund_amount' : payment_refund_amount
                      },
                success: function(data){


                    console.log("response",data);
                },
				error: function(errordata) {
                console.log(errordata)
            }
        })
    }

    function change_modal_warning(status_url, status, cell_id, payment_id) {
        console.log('url', status_url);
        console.log('status', status);
        $.ajax({
            url: status_url,
            method: 'POST',
            data: {
                '_token': '{!! csrf_token() !!}',
                'status': status
            },
            success: function(data) {
                if (data.new_value == 'Inprogress') {
                    $('#pending_btn_' + payment_id).css('display', 'none');
                    $('#inprogress_btn_' + payment_id).css('display', 'block');
                } else { // completed , rejected
                    $('#pending_btn_' + payment_id).css('display', 'none');
                    $('#inprogress_btn_' + payment_id).css('display', 'none');
                    $('#finalstatus_btn_' + payment_id).html(data.new_value);
                    $('#finalstatus_btn_' + payment_id).css('display', 'block');
                }
                $('#' + cell_id).html(data.new_value);
                console.log("response", data);
            },
            error: function(errordata) {
                console.log(errordata)
            }
        })
    }

    function payment_excel(event) {
        $('#user_excel').val($('#user').val());
        $('#req_num_excel').val($('#req_num').val());
        $('#date_excel').val($('#reservationtime').val());
        $('#status_excel').val($('#status').val());
    }


    function show_note(msg) {
        $('#msg_div').html(msg);
    }
</script>
@endsection
