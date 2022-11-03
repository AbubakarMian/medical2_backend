@extends('layouts.default_module')
@section('module_name')
Employee Permissions
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

	.form-group.ff {
		width: 395px;
	}
</style>
@section('single_file_use')



<!--  -->
<form method="post" action="{{ url('permisiion/save') }}">
	<div class="form-group">
		{!! Form::label('role',' Role') !!}

		{!!Form::select('role_id',$role,null,['class' => 'form-control',
		'data-parsley-required'=>'true',
		'data-parsley-trigger'=>'change',
		'onchange'=>'select_role(this)',
		'placeholder'=>'Role',
		])!!}
	</div>
	<input hidden name="user_id" class="user_id" value="{{$user_id}}" />
	{{ csrf_field() }}


	<!--  -->
	<table id="groupTableAppend" class="table">
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
				<th hidden> Url</th>
			</tr>
		</thead>

		<!--  -->

		<tbody class="my_loop">

			<!--  -->


			@foreach($user_permissions as $up)

			<?php
			$url = $up->url;
			$can_view = $up->can_view ? 'checked' : '';
			$can_create = $up->can_create ? 'checked' : '';
			$can_save = $up->can_save ? 'checked' : '';
			$can_edit = $up->can_edit ? 'checked' : '';
			$can_update = $up->can_update ? 'checked' : '';
			$can_delete = $up->can_delete ? 'checked' : '';
			?>


			<tr>
				<td>{!! ucwords($url->module_name ) !!} </td>
				<!-- can_view -->
				<td>
					<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" value="{!!$url->id!!}" {!!$can_view!!}>
				</td>
				<!-- can_create -->
				<td>
					<input class="form-check-input tuik" name="create[]" type="checkbox" id="check1" value="{!!$url->id!!}" {!!$can_create!!}>
				</td>
				<!-- can_save -->
				<td>
					<input class="form-check-input tuik" name="save[]" type="checkbox" id="check1" value="{!!$url->id!!}" {!!$can_save!!}>
				</td>
				<!-- can_edit -->
				<td>
					<input class="form-check-input tuik" name="edit[]" type="checkbox" id="check1" value="{!!$url->id!!}" {!!$can_edit!!}>
				</td>
				<!-- can_update -->
				<td>
					<input class="form-check-input tuik" name="update[]" type="checkbox" id="check1" value="{!!$url->id!!}" {!!$can_update!!}>
				</td>
				<!-- can_delete -->
				<td>
					<input class="form-check-input tuik" name="delete[]" type="checkbox" id="check1" value="{!!$url->id!!}" {!!$can_delete!!}>
				</td>
			</tr>


			@endforeach




			<!--  -->
		</tbody>

		<!--  -->


		<!--  -->
	</table>
	<!--  -->
	<div class="form-group ff">
		<input type="submit" name="submit" class="btn btn-default btn-block btn-lg btn-parsley hh" value="submit" />
	</div>
</form>
<!--  -->


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
	$(document).ready(function() {
		console.log("ready!");

	});

	function select_role(e) {

		console.log('asasa');
		console.log('role', e.value);
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
					console.log('permissions', data.permissions);
					var permission = data.permissions;
					var permission_length = permission.length;
					console.log('permission_lengthpermission_length', permission_length);

					// 
					var tr_str = '';

					for (var i = 0; i < permission_length; i++) {

						console.log('aaaaaaa', permission[i]);
						var id = permission[i].id;
						var role_name = permission[i].role.name;
						var module_name = permission[i].url.module_name;
						var url_id = permission[i].url.id;
						var can_view = permission[i].can_view ? 'checked' : '';
						var can_create = permission[i].can_create ? 'checked' : '';
						var can_save = permission[i].can_save ? 'checked' : '';
						var can_edit = permission[i].can_edit ? 'checked' : '';
						var can_update = permission[i].can_update ? 'checked' : '';
						var can_delete = permission[i].can_delete ? 'checked' : '';

						urls_id = `<input  name="url_id[]"  value="` + url_id + `">`
						// 
						can_view = `<input  name="view[]" value="` + url_id + `" type="checkbox" `+can_view+` >`
						can_create = `<input  name="create[]" value="` + url_id + `" type="checkbox" `+can_create+` >`
						can_save = `<input  name="save[]" value="` + url_id + `" type="checkbox" `+can_save+` >`
						can_edit = `<input  name="edit[]" value="` + url_id + `" type="checkbox" `+can_edit+` >`
						can_update = `<input  name="update[]" value="` + url_id + `" type="checkbox" `+can_update+` >`
						can_delete = `<input  name="delete[]" value="` + url_id + `" type="checkbox" `+can_delete+` >`

						tr_str = tr_str + "<tr id='row_" + permission[i].id + "'>" +
							// "<td>" + role_name + "</td>" +
							"<td>" + module_name + "</td>" +
							"<td>" + can_view + "</td>" +
							"<td>" + can_create + "</td>" +
							"<td>" + can_save + "</td>" +
							"<td>" + can_edit + "</td>" +
							"<td>" + can_update + "</td>" +
							"<td>" + can_delete + "</td>" +
							"</tr>";




					}
					// tr_str = `<input class="form-check-input tuik" value="7" name="delete[]" type="checkbox" id="check1" name="option1" checked>`;


					$(".my_loop").html(tr_str);


					// 

				}
			},
			error: function(err) {
				console.log('error', err.responseText)
			}



		})

	}
</script>
@endsection