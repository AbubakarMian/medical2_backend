@extends('layouts.default_module')
@section('module_name')
Workshop
@stop
@section('add_btn')

{!! Form::open(['method' => 'get', 'route' => ['workshop.create'], 'files'=>true]) !!}
<span>{!! Form::submit('Add Workshop', ['class' => 'btn btn-success pull-right']) !!}</span>
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


        <th> Name</th>
        <th> Email</th>
        <th> Gender</th>


	    <th>Edit  </th>
		<th>Delete  </th>



	</tr>
</thead>
<tbody>



    




		<td >ASAS </td>
		<td >SAAS</td>
		<td >SAAS</td>



        </td>
        <td>
          EDIT

        </td>


		<td>
			DLETE
		</td>


	</tr>
	


</tbody>
@section('pagination')
<span class="pagination pagination-md pull-right"></span>
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
