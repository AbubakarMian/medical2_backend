@extends('layouts.default_module')
@section('module_name')
User
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
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>User Type</th>
        <th>Image</th>




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
         url: '{!!asset("admin/users/get_users")!!}',
         type: 'get',
         dataType: 'json',
         success: function(response){
            console.log('response');
            $("#userTableAppend").css("opacity",1);
           var len = response['data'].length;

           console.log(response);


              for(var i=0; i<len; i++){
                  var id =  response['data'][i].id;
                  var name =  response['data'][i].name;
                  var email =  response['data'][i].email;
                  var phone_no =  response['data'][i].phone_no;
                  var address =  response['data'][i].address;
                  var user_type =  response['data'][i].role_id;
                  if(response['data'][i].role_id == 1){
                    user_type ='Super admin'
                        }
                        else if (response['data'][i].role_id == 2){
                    user_type ='User'
                        }
                        else if (response['data'][i].role_id == 3){
                    user_type ='Teacher'
                        }
                        else if (response['data'][i].role_id == 4){
                    user_type ='Emploee'
                        }
                  var image  = response['data'][i].image;
                //   var deleted_at   = response['data'][i].deleted_at;

                if(!image){
                    image = "{!!asset('images/logo.png')!!}"
                    console.log('no image');
                }

                // users    role ids
                // 'admin'    => '1',
                // 'user'   => '2',
                // 'teacher'   => '3',
                // 'employee'   => '4',




		        var image_col = `<img width="100px" src="`+image+`" class="show-product-img imgshow">`

                var tr_str = "<tr>" +
                    "<td>" +name+ "</td>" +
                    "<td>" +email+ "</td>" +
                    "<td>" +phone_no+ "</td>" +
                    "<td>" +address+ "</td>" +
                    "<td>" +user_type+ "</td>" +
                    "<td>" + image_col + "</td>" +

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

</script>
@endsection

