@extends('layouts.default_module')
@section('module_name')
Employee
@stop
 @section('add_btn')

{!! Form::open(['method' => 'get', 'route' => ['employee.create'], 'files'=>true]) !!}
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

@section('pagination')
<span class="pagination pagination-md pull-right">{!! $employee->render() !!}</span>
<div class="col-md-3 pull-left">
	<div class="form-group text-center">

	</div>
</div>
@endsection

