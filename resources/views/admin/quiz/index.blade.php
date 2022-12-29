
@extends('layouts.default_module')
@section('module_name')
Exam
@stop

@section('add_btn')
{!! Form::open(['method' => 'get', 'url' => ['admin/quiz/create'], 'files' => true]) !!}
<span>{!! Form::submit('Add Exam', ['class' => 'btn btn-success pull-right']) !!}</span>
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
              <th>Name</th>
              <th>Details</th>
              <th>Courses</th>
              <th>Question</th>
              <th>Edit</th>
              <th>Delete</th>


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
         url: '{!!asset("admin/quiz/get_quiz")!!}',
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
                  var name =  response['data'][i].name;
                  var detail =  response['data'][i].detail;
                  var course =  response['data'][i].course;
				  var question = `<a class="btn btn-info resize" href="{!!asset('admin/question_list/` + id + `')!!}">Question</a>`;
				  var edit = `<a class="btn btn-info" target="_blank" href="{!!asset('admin/quiz/edit/` + id + `')!!}">Edit</a>`;
                       createModal({
                            id: 'books_' + response['data'][i].id,
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
                        var delete_btn = `<a class="btn btn-info" data-toggle="modal" data-target="#` + 'books_' + response['data'][i].id + `">Delete</a>`;

                        var tr_str = "<tr id='row_"+response['data'][i].id+"'>" +

                    "<td>" +name+ "</td>" +
                    "<td>" +detail+ "</td>" +
                    "<td>" +course+ "</td>" +
                    "<td>" +question+ "</td>" +
                    "<td>" +edit+ "</td>" +
                    "<td>" +delete_btn+ "</td>" +


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


    function delete_request(id) {
            $.ajax({

                url: "{!! asset('admin/quiz/delete') !!}/" + id,
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

