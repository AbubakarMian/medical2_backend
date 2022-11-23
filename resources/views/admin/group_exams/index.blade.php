@extends('layouts.default_module')
@section('module_name')
List of {{ucwords($group->name)}} Group Exam
@stop
@section('add_btn')

{!! Form::open(['method' => 'post', 'url' => ['admin/group_exams/create'], 'files'=>true]) !!}
<input type="hidden" name="group_id" value="{!!$group->id!!}"> 
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


       
        <th>Exam Name</th>
        <th>Detail</th>
        


	   



	</tr>

	@foreach($exams as $e)
   <tr>


  
   <td>{{$e->name}}</td>
   <td>{{$e->detail}}</td>
   </tr>

	@endforeach



</thead>
<tbody>



   




	<tr></tr>


	



</tbody>
@section('pagination')

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
