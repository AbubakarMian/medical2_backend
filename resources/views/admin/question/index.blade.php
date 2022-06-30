@extends('layouts.default_module')
@section('module_name')
List of Questions
@stop

@section('add_btn')
{!! Form::open(['method' => 'get', 'url' => ['admin/question/create'], 'files' => true]) !!}
<span>{!! Form::submit('Add Question', ['class' => 'btn btn-success pull-right']) !!}</span>
{!! Form::close() !!}
@stop

@section('table')

<table id="questionTableAppend" style="opacity: 0">
    <thead>
        <tr>

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
    $(function() {

        fetchRecords();

        function fetchRecords() {
            $.ajax({
                url: '{!!asset("admin/getquestion/0")!!}',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $("#questionTableAppend").css("opacity", 1);
                    var len = response['data'].length;
                    console.log(response);
                    for (var i = 0; i < len; i++) {
                        console.log('aaaaaaa',response['data'][i]);
                        var id = response['data'][i].id;
                        // var question = response['data'][i].question;
                        var question_text = response['data'][i].question;
                        console.log('qqqqqqqq',response['data'][i].question);
                        var edit = `<a class="btn btn-info" href="{!!asset('admin/question/edit/` + id + `')!!}">Edit</a>`;
                       createModal({
                            id: 'question_' + response['data'][i].id,
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
                        var delete_btn = `<a class="btn btn-info" data-toggle="modal" data-target="#` + 'question_' + response['data'][i].id + `">Delete</a>`;

                        var tr_str = "<tr id='row_"+response['data'][i].id+"'>" +
                            "<td>" + question_text + "</td>" +
                            "<td>" + edit + "</td>" +
                            "<td>" + delete_btn + "</td>" +
                            "</tr>";

                        $("#questionTableAppend tbody").append(tr_str);
                    }
                    $('#questionTableAppend').DataTable({
                        dom: '<"top_datatable"B>lftipr',
                    });
                }
            });
        }

    });

    function delete_request(id) {
        $.ajax({

            url: "{!!asset('admin/question/delete')!!}/" + id,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{!!@csrf_token()!!}'
            },
            success: function(response) {
                console.log(response);
                if(response.status){
                    var myTable = $('#questionTableAppend').DataTable();
                    myTable.row('#row_'+id).remove().draw();
                }
            }
        });
    }
</script>
@endsection
