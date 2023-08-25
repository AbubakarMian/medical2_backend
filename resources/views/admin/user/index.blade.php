@extends('layouts.default_module')
@section('module_name')
User
@stop
@section('add_btn')
{{--
{!! Form::open(['method' => 'get', 'route' => ['user.create'], 'files'=>true]) !!}
<span>{!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}</span>
{!! Form::close() !!} --}}
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
<h4>Total {!!$user->total()!!}</h4>
{{-- {!! Form::open(['method' => 'post', 'route' => ['doctor.search'], 'files'=>true]) !!}
@include('admin.doctor.partial.searchfilters')
{!!Form::close() !!} --}}
{{-- @stop --}}

<thead>
	<tr>


	   <th>Name</th>
	   <th>Email</th>
	   <th>Phone No</th>
	   <!-- <th>Address</th> -->
	   <!-- <th>User Type</th>
	   <th>Image</th> -->



	</tr>
</thead>
<tbody>

    @foreach($user as $ct)


    <?php
                    // $user_type ="";
                if($ct->role_id == 1){
                    $user_type ='Super admin';
                        }
                        else if ($ct->role_id  == 2){
                    $user_type ='User';
                        }
                        else if ($ct->role_id  == 3){
                    $user_type ='Teacher';
                        }
                        else if ($ct->role_id  == 4){
                    $user_type ='Emploee';
                        }
                        ?>



		<td >{!! ucwords($ct->name) !!}</td>
		<td >{!! ucwords($ct->email) !!}</td>
		<td >{!! ucwords($ct->phone_no) !!}</td>
		<!-- <td >{!! ucwords($ct->adderss) !!}</td> -->



	</tr>
	@endforeach


</tbody>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $user->render() !!}</span>
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
