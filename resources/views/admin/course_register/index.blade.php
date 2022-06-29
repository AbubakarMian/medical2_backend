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
                        var group =
                        `<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Groups</button>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">

                              <div class="modal-body">
                                <div >
                                <table class="table">
                                    <tr>
                                        <th>
                                            Group
                                        </th>
                                        <th>
                                            Starting Date
                                        </th>
                                        <th>
                                           Select
                                        </th>
                                    </tr>

                                    <tr>
                                        <td>
                                          22-06-22
                                        </td>
                                        <td>
                                            29-06-22
                                        </td>
                                        <td>
                                    <input type="checkbox" >
                                        </td>

                                    </tr>



                                   </table>
                                </div>


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>`;



                        var is_paids =  response['data'][i].is_paid;
						if(is_paids){
                            is_paid = 'Yes'

						}
						else{
							is_paid = 'No'

						}
                        console.log('qqqqqqqqqoooooooooo',response['data'][i]);




                        var tr_str = "<tr id='row_"+response['data'][i].id+"'>" +
                            "<td>" + user_name + "</td>" +
                            "<td>" + course_name + "</td>" +
                            "<td>" + group + "</td>" +
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
            id: 'list_courses',
            header: '<h4>Courses</h4>',
            body: getCoursesListTable(),
            footer: `

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            `,
        });


    })


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
