@extends('layouts.default_module')
@section('module_name')
Student Plan
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
        <th> Edit Plan</th>
      


        
		



	</tr>
</thead>
<tbody>



    @foreach($student_plan as $s_p)




		<td >{!! ucwords($s_p->user->name ) !!} </td>
		<td >{!!ucwords($s_p->user->email) !!}</td>
        <td > <a class="btn btn-primary" href="{{ asset('admin/student_plan/edit?student_id=' . $s_p->id) }}">
                                   Edit {!!$s_p->name!!} Plan
                                </a>
							
							
							
							</td>

		

	   



       
        

	</tr>
	@endforeach


</tbody>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $student_plan->render() !!}</span>
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
