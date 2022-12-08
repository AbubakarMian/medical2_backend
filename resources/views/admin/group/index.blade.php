@extends('layouts.default_module')
@section('module_name')
List of Groups
@stop

<style>
    .fhgyt th {
    border: 1px solid #e3e6f3 !important;
    height: 42px;
    padding: 4px;
}
.fhgyt td {
    border: 1px solid #e3e6f3 !important;
    height: 42px;
    padding: 4px;
    background: #f9f9f9
}
.fhgyt  {
    width: 100%
}

</style>

@section('add_btn')
{!! Form::open(['method' => 'get', 'url' => ['admin/group/create'], 'files' => true]) !!}
<span>{!! Form::submit('Add Group', ['class' => 'btn btn-success pull-right']) !!}</span>
{!! Form::close() !!}
@stop

@section('table')

<table class="fhgyt" id="groupTableAppend" style="opacity: 0">
    <thead>
        <tr>
           <th>Course </th>
            <th>Group </th>
            <th>Teacher </th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Group Exams</th>
            <!-- <th>Students</th> -->
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
                url: '{!!asset("admin/get_group")!!}',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $("#groupTableAppend").css("opacity", 1);
                    var len = response['data'].length;
                    console.log('assadasd',response);
                    for (var i = 0; i < len; i++) {
                        
                        console.log('aaaaaaa',response['data'][i]);
                        var id = response['data'][i].id;
                        var course_name = response['data'][i].courses.full_name  ;
                        var group_text = response['data'][i].name;
                        // var group_text = response['data'][i].name ? name:'No Name';
                        var teacher_name = response['data'][i].teacher.name ;
                        // var course_text = response['data'][i].course_id;
                        var group_start_date = response['data'][i].start_date;
                        var group_end_date = response['data'][i].end_date;
                        console.log('qqqqqqqq',response['data'][i].group);
                        // var Students = `<a class="btn btn-info" href="{!!asset('admin/group/students/` + id + `')!!}">Students</a>`;
                        var edit = `<a class="btn btn-info" href="{!!asset('admin/group/edit/` + id + `')!!}">Edit</a>`;
                       createModal({
                            id: 'group_' + response['data'][i].id,
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
                        var delete_btn = `<a class="btn btn-info" data-toggle="modal" data-target="#` + 'group_' + response['data'][i].id + `">Delete</a>`;
                        var group_exams = `<a class="btn btn-info" href="{!!asset('admin/group_exams/` + id + `')!!}">Group Exams</a>`;

                        var tr_str = "<tr id='row_"+response['data'][i].id+"'>" +
                           
                            "<td>" + course_name + "</td>" +
                            "<td>" + group_text + "</td>" +
                            "<td>" + teacher_name + "</td>" +
                            // "<td>" + course_text + "</td>" +
                            // "<td>" + group_start_date + "</td>" +
                            // "<td>" +  Date.parse(group_start_date) + "</td>" +
                            "<td>" + new Date(group_start_date*1000).toDateString("en-US", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) + "</td>" +
                            "<td>" + new Date(group_end_date*1000).toDateString("en-US", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) + "</td>" +
                            // "<td>" + group_end_date + "</td>" +
                            // "<td>" + Students + "</td>" +
                            "<td>" + group_exams + "</td>" +
                            "<td>" + edit + "</td>" +
                            "<td>" + delete_btn + "</td>" +
                            "</tr>";

                        $("#groupTableAppend tbody").append(tr_str);
                    }
                    $('#groupTableAppend').DataTable({
                        dom: '<"top_datatable"B>lftipr',
                    });
                }
            });
        }

    });

    function delete_request(id) {
        $.ajax({

            url: "{!!asset('admin/group/delete')!!}/" + id,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{!!@csrf_token()!!}'
            },
            success: function(response) {
                console.log(response);
                if(response.status){
                    var myTable = $('#group').DataTable();
                    myTable.row('#row_'+id).remove().draw();
                }
            }
        });
    }
</script>
@endsection
