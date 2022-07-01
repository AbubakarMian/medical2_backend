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

{{--  modal  --}}
{{--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>  --}}

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Group Courses</h4>
      </div>
      <div class="modal-body">
        <table id="coursesTableAppend" style="opacity: 0">
            {{--    --}}

            <thead>
            <tr>

                <th>Group  Name</th>
                <th>Starting  Date</th>
                <th>Ending  Date</th>
                <th> Radio Button</th>





            </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


{{--  modal close  --}}
@stop
@section('app_jquery')

<script>
    $(document).ready(function() {

        fetchRecords();

        function fetchRecords() {
            $('#myModal').modal('hide');
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
              var group = `<a class="btn btn-info" onclick="courses_group_request(` + response['data'][i].id + `)" >Group</a>`;


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

 {{--  courses_group_request  --}}
    function courses_group_request(id) {
        $.ajax({

            url: "{!!asset('admin/courses/group')!!}/" + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#myModal').modal('show');
                $("#coursesTableAppend").css("opacity", 1);
                {{--    --}}
                var groups = response['groups'].length;
                 console.log('abbbbbbbbbbbbbb',response);
                 {{--    --}}


                for (var i = 0; i < groups; i++) {


                    console.log('aaaaaaacccccccc',response['groups'][i]);
                    var id = response['groups'][i].id;
                    var name = response['groups'][i].name ;
                    var start_date = response['groups'][i].start_date ;
                    var end_date = response['groups'][i].end_date ;

                    {{--  radio   btn --}}
                    {{--  var update_course_group = `<a class="btn btn-info" onclick="update_course_group(` + response['register_course'].id + `)" >Group</a>`;  --}}


                    var update_course_group = `  <input type="radio" name="radioName" onclick="update_course_group(` +response['groups'][i].id +`,`+ response['register_course'].id + `)" /> `;



                    var tr_str = "<tr id='row_"+response['groups'][i].id+"'>" +
                        "<td>" + name + "</td>" +
                        "<td>" + new Date(start_date*1000).toLocaleDateString("en-US") + "</td>" +

                        "<td>" + new Date(end_date*1000).toLocaleDateString("en-US") + "</td>" +
                        "<td>" +  update_course_group+ "</td>" +




                        "</tr>";

                    $("#coursesTableAppend tbody").append(tr_str);
                }
                $('#coursesTableAppend').DataTable({
                    dom: '<"top_datatable"B>lftipr',
                });

            }
        });
    }

    {{--    --}}

    {{--  group update  --}}


    function update_course_group(group_id,register_course_id) {

        $.ajax({

            url: "{!!asset('admin/update_course_group')!!}" ,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{!!@csrf_token()!!}',
                'group_id': group_id,
                'register_course_id': register_course_id,
            },
            success: function(response) {


                {{-- RESPONSE   --}}

                 console.log('abbbbbbbbbbbbbb',response);
                 {{--    --}}



            }
        });
    }



    {{--    --}}

</script>


@endsection
