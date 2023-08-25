
@extends('layouts.default_module')
@section('module_name')
All Certificaes
@stop

<!-- @section('add_btn')
{!! Form::open(['method' => 'get', 'url' => ['admin/role/create'], 'files' => true]) !!}
{!! Form::close() !!}
@stop -->
@section('table-properties')
width="400px" style="table-layout:fixed;"
@endsection



<style>
	td {
		white-space: nowrap;
		overflow: hidden;
		width: 30px;
		height: 30px;
		text-overflow: ellipsis;
	}
    .fhgyt th {
    border: 1px solid #e3e6f3 !important;
}
.fhgyt td {
    border: 1px solid #e3e6f3 !important;
    background: #f9f9f9
}
</style>
@section('table')

<table class="fhgyt" id="userTableAppend" style="opacity: 0">
<thead>
	<tr>
        <th> User Id</th>
        <th> Course</th>
        <th> Student</th>
        <th> Cert No</th>
        <!-- <th> View</th> -->
        <!-- <th> issue_date</th>
        <th> expiration_date</th> -->
        <th> Issue Date</th>
        <th> Expiry Date</th>
        <th> View</th>


	</tr>
</thead>
<tbody>
</tbody>
</table>

@stop
@section('app_jquery')

<script>

$(document).ready(function(){

    fetchRecords();

    function fetchRecords(){

       $.ajax({
         url: '{!!asset("admin/import_data/get_all_certificates")!!}',
         type: 'get',
         dataType: 'json',
         success: function(response){
            console.log('response');
            $("#userTableAppend").css("opacity",1);
           var len = response['data'].length;
		   console.log('response2');

           console.log(response);

              for(var i=0; i<len; i++){
                  var id =  response['data'][i].id;
                  var userid =  response['data'][i].userid;
                //   var courseid =  response['data'][i].courseid;
                  var coursename =  response['data'][i].course;
                  var firstname =  response['data'][i].student;
                  var cert_no =  response['data'][i].cert_no;
                  var path =  response['data'][i].path;
                  var issue_date =  response['data'][i].issue_date;
                  var expiration_date =  response['data'][i].expiration_date;
                  var ceritificate_issue_date =  response['data'][i].ceritificate_issue_date;
                  var ceritificate_expire_date =  response['data'][i].ceritificate_expire_date;
				  var view = `<a class="btn btn-info" target="_blank" href="`+path+`">View</a>`;

                var tr_str = "<tr>" +
                    "<td>" +userid+ "</td>" +
                    // "<td>" +courseid+ "</td>" +
                    "<td>" +coursename+ "</td>" +
                    "<td>" +firstname+ "</td>" +
                    "<td>" +cert_no+ "</td>" +
                    // "<td>" +path+ "</td>" +
                    // "<td>" +issue_date+ "</td>" +
                    // "<td>" +expiration_date+ "</td>" +
                    "<td>" +ceritificate_issue_date+ "</td>" +
                    "<td>" +ceritificate_expire_date+ "</td>" +
                    "<td>" +view+ "</td>" +


                "</tr>";

                $("#userTableAppend tbody").append(tr_str);
                }
                $(document).ready(function() {
console.log('sadasdasdad');
                $('#userTableAppend').DataTable({
					dom: '<"top_datatable"B>lftipr',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                });
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

