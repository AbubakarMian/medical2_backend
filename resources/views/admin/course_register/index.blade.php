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

    .tublke {
        width: 100%
    }

    .tublke tr {
        border: 1px solid #e3e6f3;
        height: 42px !important;
    }

    .tublke td {
        border: 1px solid #e3e6f3;
        padding: 6px 10px;
        background: #f9f9f9;
    }

    .tublke th {
        border: 1px solid #e3e6f3;
        padding: 6px 10px;
    }

    .remoheading {
        text-align: center;
        font-size: 19px;
        color: black;
        font-weight: 500;
    }

    td.coursetd {
        border: 1px solid #e5e5e5 !important;
        text-align: center !important;
        height: 43px !important;
        font-size: 13px !important;
        color: gray !important;
        font-weight: 500 !important;
    }

    tr.coursetr th {
        border: 1px solid #e5e5e5 !important;
        font-size: 13px !important;
        font-weight: bold !important;
        text-align: left !important;
    }

    .couregmodal {
        width: 35% !important;
    }
    #acaf {
    margin-top: -55px !important;
}
</style>
@section('table')



    <table class="tublke" id="groupTableAppend" style="opacity: 0">
        {{--    --}}

        <thead>
            <tr>
                <th>User </th>
                <th>Course </th>
                <th>Group </th>
                <th>Change Group </th>
                <th>Payment </th>




            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <button style="display: none" type="button" class="btn btn-info btn-lg open_modal_click" data-toggle="modal"
        data-target="#myModal">Open Modal</button>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog couregmodal">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title remoheading" id="my_group_name"></h4>
                </div>
                <div class="modal-body">
                    <table id="coursesTableAppend" style="opacity: 0">
                        <thead>
                            <tr class="coursetr">
                                <th>Group Name</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                <th>Update Group</th>
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

@stop
@section('app_jquery')

    <script>
        $(document).ready(function() {

            fetchRecords();
            $('#coursesTableAppend').DataTable({
                dom: '<"top_datatable"B>Lftipr',
            });

            function fetchRecords() {
                $.ajax({
                    url: '{!! asset('admin/get_course_register') !!}',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $("#groupTableAppend").css("opacity", 1);
                        var len = response['data'].length;
                        var tr_str = '';
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var user_name = response['data'][i].user.name;
                            var course_name = response['data'][i].course.full_name;
                            var group_names = response['data'][i].group;

                            if (group_names) {
                                group_name = group_names.name;

                            } else {
                                group_name = 'No Group Assigned';
                            }
                            var group = `<a class="btn btn-info" onclick="courses_group_request(` +
                                response['data'][i].id + `)" >Group</a>`;
                            var is_paids = response['data'][i].student_feess;
                            if (is_paids.length > 0) {
                                is_paid = 'Due Date Have Passed'

                            } else {
                                is_paid = 'Paid';
                            }
                            tr_str = tr_str + `<tr id='row_` + response["data"][i].id + `'>` +
                                `<td>` + user_name + `</td>` +
                                `<td>` + course_name + `</td>` +
                                `<td>` + group_name + `</td>` +
                                `<td>` + group + `</td>` +
                                `<td>` + is_paid + `</td></tr>`;
                        }
                        $("#groupTableAppend tbody").append(tr_str);
                        $('#groupTableAppend').DataTable({
                            dom: '<"top_datatable"B>lftipr',
                        });
                    }
                });
            }
        });

        function courses_group_request(id) {
            console.log('ressss')
            $.ajax({
                url: "{!! asset('admin/courses/group') !!}/" + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('ressss response', response)
                    // $('#myModal').modal('show');
                    $('.open_modal_click').click();
                    $("#coursesTableAppend").css("opacity", 1);

                    var groups = response['groups'].length;
                    var tr_str = '';
                    for (var i = 0; i < groups; i++) {
                        var id = response['groups'][i].id;
                        var name = response['groups'][i].name;
                        var start_date = response['groups'][i].start_date;
                        var end_date = response['groups'][i].end_date;
                        var is_checked = response['groups'][i].id == response['register_course'].group_id ?
                            'checked' : '';
                        var update_course_group = `<input type="radio"  name="radioName"  ` + is_checked +
                            `  class="my_group_radio_ coursebulit` + response['register_course'].group_id +
                            ` " onclick="update_course_group_fun(` + response['groups'][i].id + `,` + response[
                                'register_course'].id + `)" /> `;
                        tr_str = tr_str + "<tr class='coursetr' id='row_" + response['groups'][i].id + "'>" +
                            "<td class='coursetd'>" + name + "</td>" +
                            "<td class='coursetd'>" + new Date(start_date * 1000).toLocaleDateString("en-US") +
                            "</td>" +
                            "<td class='coursetd'>" + new Date(end_date * 1000).toLocaleDateString("en-US") +
                            "</td>" +
                            "<td class='coursetd'>" + update_course_group + "</td>" +
                            "</tr>";
                        $("#my_group_name").html(response['groups'][i].courses.full_name + ' Course');
                    }
                    $("#coursesTableAppend tbody").html(tr_str);
                }
            });
        }

        function update_course_group_fun(group_id, register_course_id) {
            $.ajax({

                url: "{!! asset('admin/update_course_group') !!}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: '{!! @csrf_token() !!}',
                    'group_id': group_id,
                    'register_course_id': register_course_id,
                },
                success: function(response) {
                    console.log('abbbbbbbbbbbbbb', response);
                    console.log('group', response.register_course.group_id);
                    var selected_group_id = response.register_course.group_id;
                }
            });
        }


    </script>


@endsection
