@extends('layouts.default_module')
@section('module_name')
  Permissions 
@stop


@section('table-properties')
width="400px" style="table-layout:fixed;"
@endsection


<style>
	td.role {
		font-size: 22px;
		color: black;
		font-family: cursive;
		background-color: darkgray;
	}

	td {
		white-space: nowrap;
		overflow: hidden;
		width: 30px;
		height: 30px;
		text-overflow: ellipsis;
	}
</style>
@section('table')

<div class="form-group">
    {!! Form::label('role',' Role') !!}

    {!!Form::select('role_id',$role,null,['class' => 'form-control',
    'data-parsley-required'=>'true',
    'data-parsley-trigger'=>'change',
	'onchange'=>'select_role(this)',
    'placeholder'=>'Select Category','required',
    'maxlength'=>"100"])!!}
</div> 
</div> 
<!--  -->
<table id="groupTableAppend" class="table" >
<thead>
	<tr>
		
		<!-- <th>Role</th> -->
		<th>Module Name</th>
		<th> View</th>
		<th> Create</th>
		<th> Save</th>
		<th> Edit</th>
		<th> Update</th>
		<th> Delete</th>
	</tr>
</thead>

<!--  -->
<tbody>

<!--  -->

@foreach($urls as $b)




<tr>

	
	<td>{!! ucwords($b->module_name ) !!} </td>
	<!-- can_view -->
	<td>
		@if($b->permission->can_view == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked onclick="can_view()">
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
		
	</td>
	<!-- can_create -->
	<td>
		@if($b->permission->can_create == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>
	<!-- can_save -->
	<td>
		@if($b->permission->can_save == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>
	<!-- can_edit -->
	<td>
		@if($b->permission->can_edit == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>
	<!-- can_update -->
	<td>
		@if($b->permission->can_update == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>
	<!-- can_delete -->
	<td>
		@if($b->permission->can_delete == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>

</tr>
	@endforeach



<!--  -->
    </tbody>
</table>


<!--  -->
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $urls->render() !!}</span>
<div class="col-md-3 pull-left">
	<div class="form-group text-center">
		<div>
			{!! Form::open(['method' => 'get', 'route' => ['dashboard']]) !!}
			{!! Form::submit('Cancel', ['class' => 'btn btn-default btn-block btn-lg btn-parsley']) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
@stop
<!--  -->





@section('app_jquery')
<script>



$( document ).ready(function() {
    console.log( "ready!" );
	// $(".table#index-table").css("display","none")
});

function select_role(e){

console.log('asasa');
console.log('role',e.value);
var role_id = e.value;
var my_url = `{!! asset('admin/role_response') !!}`
$.ajax({
                url: my_url,
                method: 'post',
                dataType: "json",
                data: {
                    'role_id': role_id,
                    '_token': '{!! csrf_token() !!}'

                },
                success: function(data) {
                    // var p = data;
                    // // var p = JSON.parse(data);
                    // var data = data;
                    console.log('reeeeeeestatuse0', data);
                    if (data.status == true) {
                     
                        console.log('role_id');
                        console.log('permissions',data.permissions);
						var permission = data.permissions;
						var permission_length = permission.length;
						console.log('permission_lengthpermission_length',permission_length);

						// 
						
						for(var i=0; i<permission_length; i++){

							console.log('aaaaaaa',permission[i]);
							var id = permission[i].id;
							var role_name = permission[i].role.name;
							var module_name = permission[i].url.module_name;
                           var can_view = permission[i].can_view;
                           var can_create  = permission[i].can_create ;
                           var can_save  = permission[i].can_save ;
                           var can_edit  = permission[i].can_edit ;
                           var can_update  = permission[i].can_update;
                           var can_delete   = permission[i].can_delete ;
						   if(can_view == 1){
					         can_view =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked >`

						   }
						   else{
							can_view =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1"  >`

						   }
						   if(can_create == 1){
							can_create =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked >`

						   }
						   else{
							can_create =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1"  >`

						   }
						   if(can_save == 1){
							can_save =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked >`

						   }
						   else{
							can_save =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1"  >`

						   }
						   if(can_edit == 1){
							can_edit =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked >`

						   }
						   else{
							can_edit =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1"  >`

						   }
						   if(can_update == 1){
							can_update =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked >`

						   }
						   else{
							can_update =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1"  >`

						   }
						   if(can_delete == 1){
							can_delete =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked >`

						   }
						   else{
							can_delete =   `<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1"  >`

						   }
                         

						   var tr_str = "<tr id='row_"+permission[i].id+"'>" +
                            // "<td>" + role_name + "</td>" +
                            "<td>" + module_name + "</td>" +
                            "<td>" + can_view + "</td>" +
                            "<td>" + can_create + "</td>" +
                            "<td>" + can_save + "</td>" +
                            "<td>" + can_edit + "</td>" +
                            "<td>" + can_update + "</td>" +
                            "<td>" + can_delete + "</td>" +
                            
                            "</tr>";

						   $("#groupTableAppend tbody").html(tr_str);

						}
						 
						 
						 

						// 
						
					    }},
                error: function(err) {
                    console.log('error', err.responseText)
                }



            })

}


</script>
@endsection