@extends('layouts.default_module')
@section('module_name')
	Contact Us
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
		
		

	</tr>
	</thead>
	<tbody>

	@foreach($contact_us as $c)

		<tr>


			<td>{!! $c->name !!}</td>
			<td>{!! $c->email !!}</td>
			<td>{!! $c->phone_no !!}</td>
			
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
	<span class="pagination pagination-md pull-right">{!! $contact_us->render() !!}</span>
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
