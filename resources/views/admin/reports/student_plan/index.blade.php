
@extends('layouts.default_module')
@section('module_name')
Students plan
@stop


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
        <th> Name</th>
        <th> Course </th>
        <th> Group </th>
        <th> Edit Plan</th>


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
         url: '{!!asset("admin/student_plan/get_student_plan")!!}',
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
                  var name =  response['data'][i].user.name;
                  var course =  response['data'][i].course.full_name;
                  var group =  response['data'][i].group.name;
				  var edit = `<a class="btn btn-info" href="{!!asset('admin/student_plan/edit')!!}?user_id=`+id+`&course_register_id=`+id+`">Edit Plan</a>`;

                var tr_str = "<tr>" +
                    "<td>" +name+ "</td>" +
                    "<td>" +course+ "</td>" +
                    "<td>" +group+ "</td>" +
                    "<td>" +edit+ "</td>" +


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


