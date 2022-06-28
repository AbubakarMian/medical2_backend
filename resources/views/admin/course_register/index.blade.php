@extends('layouts.default_module')
@section('module_name')
Course Register
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
		<th>User Name</th>
		<th>Course Name</th>
		<th>Group  Name</th>
		<th>IS PAID</th>
	
		
		

	</tr>
	</thead>
	<tbody>

	@foreach($course_register as $c)

		<tr>


			<td>Ali</td>
			<td>{!! $c->course->full_name !!}</td>
			<td>{!! $c->group->name ?? 'No Group Assigned' !!}</td>
			<td>{!! $c->is_paid !!}</td>
			
			<td>


			{{-- <a href="">
		            <span class="badge bg-info" name="msgmodal"
					data-url="{!! asset('index.php/admin/contact/full_desc/').'/'.$p->id !!}"
						  >
		            Show</span>
              </a> --}}
			</td>


		</tr>
	@endforeach
	</tbody>
@section('pagination')
	<span class="pagination pagination-md pull-right">{!! $course_register->render() !!}</span>
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
{{-- @include('admin.modules.contact.partial.detail_modal') --}}
@section('app_jquery')

<script>

		$(function(){

			$('span[name="msgmodal"]').on('click', function(e){
				e.preventDefault();
				var my_url = $(this).attr('data-url');
				var mySpan = this;
				$.get(my_url , function (data) {
					var trHTML = '';
					$.ajax({
						type: 'GET',
						url: my_url,
						data: 'application/json',
						dataType: 'json',
						success: function (data) {

								console.log("sucess",data);
								trHTML = data.msg;

							$('#my_msg_div').html(trHTML);
							$('#msgmodal').modal('show');
						},
						error: function (data) {
							console.log('Error:', data);
						}
					});
				});
			});
		});

	</script>


@endsection
