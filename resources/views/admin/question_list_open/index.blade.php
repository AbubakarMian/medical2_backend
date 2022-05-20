@extends('layouts.default_module')
@section('module_name')
Question List
@stop
@section('table')

<thead>
    <tr>

        <th>
            Question
        </th>
        <th>
            Checkbox
        </th>
    </tr>
</thead>
<tbody>
  <script> 
$(document).ready(function() {

fetchRecords();

function fetchRecords() {
    $.ajax({
        url: '{!!asset("admin/getquestion/{id}")!!}',
        type: 'get',
        dataType: 'json',
        success: function(response) {
            $("#questionTableAppend").css("opacity", 1);
            var len = response['data'].length;
            console.log(response);
            for (var i = 0; i < len; i++) {
                var id = response['data'][i].id;
                var question = response['data'][i].question;

                var tr_str = "<tr id='row_"+response['data'][i].id+"'>" +
                            "<td>" + question + "</td>" +
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
                




</script>







@stop