@extends('layouts.default_module')
@section('module_name')
Courses
@stop

@section('add_btn')
{!! Form::open(['method' => 'get', 'url' => ['admin/courses/create'], 'files' => true]) !!}
<span>{!! Form::submit('Add Course', ['class' => 'btn btn-success pull-right']) !!}</span>
{!! Form::close() !!}
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

        <th>Full Name</th>
        <th>Short Name</th>
        <th> Fees </th>
        <th> Image </th>
        <th>Edit </th>
        <th>Delete </th>


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
         url: '{!!asset("admin/courses/get_courses")!!}',
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
                  var name =  response['data'][i].full_name;
                  var email =  response['data'][i].short_name;
                  var gender =  response['data'][i].examination_fees;
                  var image =  response['data'][i].avatar;
				  var imgaa = `<img src="(` + image + `)">`;
				  var edit = `<a class="btn btn-info" href="{!!asset('admin/courses/edit/` + id + `')!!}">Edit</a>`;
                       createModal({
                            id: 'courses_' + response['data'][i].id,
                            header: '<h4>Delete</h4>',
                            body: 'Do you want to continue ?',
                            footer: `
                                <button class="btn btn-danger" onclick="delete_request(` + response['data'][i].id + `)"
                                data-dismiss="modal">
                                    Delete
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                `,
                        });
                        var delete_btn = `<a class="btn btn-info" data-toggle="modal" data-target="#` + 'courses_' + response['data'][i].id + `">Delete</a>`;

                        var tr_str = "<tr id='row_"+response['data'][i].id+"'>" +
                    "<td>" +name+ "</td>" +
                    "<td>" +email+ "</td>" +
                    "<td>" +gender+ "</td>" +
                    "<td>" + imgaa+ "</td>" +
                    "<td>" +edit+ "</td>" +
                    "<td>" +delete_btn+ "</td>" +


                "</tr>";

                $("#userTableAppend tbody").append(tr_str);
                }

console.log('sadasdasdad');
                $('#userTableAppend').DataTable({
					dom: '<"top_datatable"B>lftipr',
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

    function delete_request(id) {
            $.ajax({

                url: "{!! asset('admin/courses/delete') !!}/" + id,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: '{!! @csrf_token() !!}'
                },
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        var myTable = $('#userTableAppend').DataTable();
                        myTable.row('#row_' + id).remove().draw();
                    }
                }
            });
        }

</script>
@endsection

