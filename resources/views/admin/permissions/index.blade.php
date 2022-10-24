@extends('layouts.default_module')
@section('module_name')
{{ucwords($user_permission->user->name) }} Empolyee  Permissions
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


<thead>
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th>Module Name</th>
		<th> View</th>
		<th> Create</th>
		<th> Save</th>
		<th> Edit</th>
		<th> Update</th>
		<th> Delete</th>
	</tr>
</thead>


<?php
$role_id = '';
?>

@foreach($permissions as $b)
@if($role_id == $b->role_id)
<td></td>
@else
<td class="role">{!! ucwords($b->role_id) !!} </td>
@endif

<tbody>

<tr>
	<td></td>
	<td></td>
	<td></td>
	<td>{!! ucwords($b->url->module_name ) !!} </td>
	<!-- can_view -->
	<td>
		@if($b->can_view == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked onclick="can_view()">
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
		<input hidden class="user_permission_id" name="user_permission" value="{{$user_permission->id}}">
	</td>
	<!-- can_create -->
	<td>
		@if($b->can_create == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>
	<!-- can_save -->
	<td>
		@if($b->can_save == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>
	<!-- can_edit -->
	<td>
		@if($b->can_edit == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>
	<!-- can_update -->
	<td>
		@if($b->can_update == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>
	<!-- can_delete -->
	<td>
		@if($b->can_delete == 1)

		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1" checked>
		@else
		<input class="form-check-input tuik" name="view[]" type="checkbox" id="check1" name="option1">
		@endif
	</td>

	<?php
	$role_id = $b->role_id;
	?>
</tr>
	@endforeach
</tbody>

@section('pagination')
<span class="pagination pagination-md pull-right">{!! $permissions->render() !!}</span>
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