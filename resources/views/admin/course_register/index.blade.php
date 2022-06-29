@extends('layouts.default_module')
@section('module_name')
Course Register
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
</style>
@section('table')

<table id="groupTableAppend" style="opacity: 0">
	{{--    --}}

	<thead>
	<tr>
		<th>User Name</th>
		<th>Course Name</th>
		<th>Group  Name</th>
		<th>Payment Status</th>




	</tr>
</thead>
<tbody>
</tbody>
</table>
@stop
@section('app_jquery')

<script>
    $(document).ready(function() {

        fetchRecords();

        function fetchRecords() {
            $.ajax({
                url: '{!!asset("admin/get_course_register")!!}',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $("#groupTableAppend").css("opacity", 1);
                    var len = response['data'].length;
                    console.log('assadasd',response);
                    for (var i = 0; i < len; i++) {
                        console.log('aaaaaaa',response['data'][i]);
                        var id = response['data'][i].id;
                        var user_name = response['data'][i].user.name ;
                        var course_name = response['data'][i].course.full_name ;
                        var group = `<a class="btn btn-info" href="{!!asset('admin/courses/group/` + id + `')!!}">Groups</a>`;
                        createModal({
                             id: 'group_' + response['data'][i].id,
                             header: '<h4>Groups</h4>',
                             body: getGroupListTable(),
                             footer: `

                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             `,
                         });


                        console.log('qqqqqqqqqoooooooooo',response['data'][i]);




                        var tr_str = "<tr id='row_"+response['data'][i].id+"'>" +
                            "<td>" + user_name + "</td>" +
                            "<td>" + course_name + "</td>" +
                            "<td>" + edit + "</td>" +
                            "<td>" + is_paid + "</td>" +


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
    $(function() {
        createModal({
            id: 'group_' + response['data'][i].id,
            header: '<h4>Groups</h4>',
            body: getGroupListTable(),
            footer: `

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            `,
        });


    })

    function getGroupListTable() {
        var table = `
            <table>
                <thead>
                <thead>
                <tbody>
        `;

        @foreach($courses_list as $cl)
            table = table + '<tr>';

            table = table + '</td>';

            <?php
                $checked = '';
                if(in_array($cl->id,$question_course)){
                    $checked = 'checked';
                }
            ?>

            table = table + '<td><div class="checkbox"><label><input class="selected_courses_checkbox" type="checkbox" {!!$checked!!} value="{!!$cl->id!!}"></label></div>';
            table = table + '<td>{!! $cl->full_name !!}';
            table = table + '</td>';
            table = table + '</tr>';

        @endforeach()

        table = table + `</tbody></table>`;

        return table;
    }


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
