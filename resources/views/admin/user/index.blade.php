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
</style>
@section('table')


<thead>
	<tr>


        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Image</th>



	</tr>
</thead>
<tbody>



    @foreach($user as $c)




		<td >{!! ucwords($c->name) !!} </td>
		<td >{!! ucwords($c->email) !!} </td>
		<td >{!! ucwords($c->phone_no) !!} </td>
		<td >{!! ucwords($c->adderss) !!} </td>


        <?php if (!$c->avatar) {
			$c->avatar = asset('images/logo.jpg');
			}

	    ?>


	   <td><img width="100px" src="{!! 	$c->avatar  !!}" class="show-product-img imgshow"></td>
		<td >{!! ucwords($c->description   ) !!}</td>





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
