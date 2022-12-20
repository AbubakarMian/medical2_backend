@extends('layouts.default_report')
@section('report_name')
    Payment
@stop
@section('report_description')
@stop
@section('table')
    <table id="userTable" class="table table-bordered">
        <thead>
            <tr>
                <th >Payment Id</th>
                <th >Date</th>
                <th >User Name</th>
                <th >Course</th>
		        <th >Amount</th>
		        <th >Status</th>
		        <th >Refund</th>
		        <th >Recipt</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@include('admin.reports.payment.partial.payment_refund')
@include('admin.reports.payment.partial.msg_modal')

@endsection

{{-- @section('extra_css') --}}
{{-- <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" /> --}}
{{-- <link href="{!! asset('css/MonthPicker.min.css') !!}" rel="stylesheet" type="text/css" /> --}}
{{-- <link rel="stylesheet" type="text/css" href="{!! asset('css/examples.css') !!}" /> --}}
{{-- @stop --}}


@section('app_jquery')
<script>
$(document).ready(function(){
    console.log('asdasdasd');

    fetchRecords();

    function fetchRecords(){

       $.ajax({
         url: '{!!asset("admin/reports/payments/get_payment_report")!!}',
         type: 'get',
         dataType: 'json',
         success: function(response){
            $("#userTable").css("opacity",1);
           var len = response.data.length;
           var data = response.data;
           var tr_str = '';

                for(var i=0; i<len; i++){
                    var payment_id =  data[i].payment_id;
                    var date =  data[i].created_at;
                    var user_name = data[i].user.name;
                    var course_name = data[i].course.full_name;
                    var amount = data[i].amount;
                    var payment_status = data[i].action;
                    // var payment_refund = data[i].search_payment;
                    var refund_payment = data[i].receipt_url?`
                            <button class="btn rfnd-btn" onclick='open_refund_modal(`+JSON.stringify(data[i])+`)';>Refund</button>
                        `:'';
                    var recipt = data[i].receipt_url?` <a target="_blank" href="`+data[i].receipt_url+
                        `"><button class="btn btn-success" >Recipt</button></a>`:'';
                     tr_str = tr_str+"<tr>" +
                         "<td>" + payment_id + "</td>" +
                        "<td>" + get_date(date) + "</td>" +
                        "<td>" + user_name + "</td>" +
                        "<td>" + course_name + "</td>" +
                        "<td>" + amount + "</td>" +
                        "<td>" + payment_status + "</td>" +
                        "<td>" + refund_payment + "</td>" +
                        "<td>" + recipt + "</td>" +
                    "</tr>";
                }

                $("#userTable tbody").html(tr_str);
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

function get_date(date_time){
    var d= Date.parse(date_time);
    console.log('asdasdsad',d);
    var dt = new Date(date_time).toDateString();
    console.log('asdasdsad 22',dt);
    return dt;
}

function open_refund_modal(payment){
    $('.payment_id').val(payment.id);
    if(payment.refund_payments.length ){
        var refund_table ="";
        for(var i=0; i<payment.refund_payments.length ; i++){
            refund_table = refund_table+`<tr>`+
                `<td>`+payment.refund_payments[i].payment_id+`</td>`+
                `<td>`+payment.refund_payments[i].amount+`</td>`+
                `<td>`+payment.refund_payments[i].status+`</td>`+
                `<td>`+get_date(payment.refund_payments[i].created_at)+`</td>`;
        }
        $('.refund_details').css('display','block');
        $('.refund_details_body').html(refund_table);
    }
    else{
        $('.refund_details').css('display','none');
    }
    $('.payment_refund_modal').modal('toggle');
}

    function set_msg_modal(msg){
        $('.set_msg_modal').html(msg);
    }
	function payment_refund() {
			var payment_refund_amount = $('.payment_refund_amount').val();
			var payment_refund_reason = $('.payment_refund_reason').val();
			var payment_id = $('.payment_id').val();
            if(payment_refund_amount == '' ){
                alert('Amount required');
                return;
            }
            var url = '{!!asset("admin/reports/payment/payment_refund")!!}/'+payment_id;
            $.ajax({
                url:url,
                method:'POST',
                data: {'_token' :'{!! csrf_token() !!}',
                       'status' : status,
                       'payment_refund_amount' : payment_refund_amount,
                       'payment_refund_reason' : payment_refund_reason,
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


</script>
@endsection

<style>
    .rfnd-btn{
        color: #ffffff;
    background-color: #1582dc;
    background-image: none;
    border-color: #1582dc;

}
.rfnd-btn:hover{
    background-color: #0e5ea1;
    background-image: none;
    border-color: #0e5ea1;
    color: #ffffff;

}

</style>
