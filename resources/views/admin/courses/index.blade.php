@extends('layouts.default_module')
@section('module_name')
Courses
@stop
@section('add_btn')

{!! Form::open(['method' => 'get', 'route' => ['courses.create'], 'files'=>true]) !!}
<span>{!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}</span>
{!! Form::close() !!}
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


        <th>Full Name</th>
        <th>Short Name</th>
	<th>Category</th>
		{{-- <th>Sta
		{{-- <th>Start Date</th> --}}
		<th> Image </th>
        <th> Fees </th>

	    <th>Edit  </th>
		<th>Delete  </th>



	</tr>
</thead>
<tbody>



    @foreach($courses as $c)




		<td >{!! ucwords($c->full_name ) !!} </td>
		<td >{!!ucwords($c->short_name) !!}</td>

		{{-- <td >{!! ucwords($c->start_date   ) !!}</td> --}}

        <?php if (!$c->avatar) {
			$c->avatar = asset('images/logo.png');
			}

	    ?>


	   <td><img width="100px" src="{!! 	$c->avatar  !!}" class="show-product-img imgshow"></td>
		<td >{!! ucwords($c->fees   ) !!}</td>
ass' => 'badge bg-info')) !!}

        </td>

		<td>{!! Form::open(['method' => 'POST', 'route' => ['courses.delete', $c->id]]) !!}
			<a href="" data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert" modal_msg="Do you want to delete?">
				<span class="badge bg-info btn-primary ">
					{!! $c->deleted_at?'Activate':'Delete' !!}</span></a>
			{!! Form::close() !!}
		</td>


	</tr>
	@endforeach


</tbody>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $courses->render() !!}</span>
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
