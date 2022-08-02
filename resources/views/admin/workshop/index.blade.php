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
        <th>Teacher  </th>
        <th> Course</th>
     
		<th>Edit  </th>
		<th>Delete  </th>

	 


	</tr>
</thead>
<tbody>



@foreach($workshop as $c)




		<td> 
		<input type="text" class="f_name_{{$c->id}}" disabled value="{{$c->name}}">
			</td>

		
		<td> 
		<input type="text" class="teacher_name_{{$c->id}}" disabled value="{{$c->teacher->name}}">
			</td>
		
		
		<td> 
		<input type="text" class="course_name_{{$c->id}}" disabled value="{{$c->courses->full_name}}">
			</td>



        <td>
		<button type="button" class="btn btn-warning btn_chnage_{{$c->id}}" onclick="edit_workshop({!!$c->id!!})">Edit Workshop</button>
        </td>


		<td>{!! Form::open(['method' => 'POST', 'route' => ['workshop.delete', $c->id]]) !!}
			<a href="" data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert" modal_msg="Do you want to delete?">
				<span class="badge bg-info btn-primary ">
					{!! $c->deleted_at?'Activate':'Delete' !!}</span></a>
			{!! Form::close() !!}
		</td>
       


	</tr>
	@endforeach
	


</tbody>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $workshop->render() !!}</span>
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

@section('app_jquery')
<script>
  
function edit_workshop(workshop_id){
        console.log('workshop_idworkshop_id',workshop_id);

	var btn_chnage_value = $('.btn_chnage_'+workshop_id).html("Save Workshop");

	var input_enabled_f_name = $('.f_name_'+workshop_id).prop('disabled', false);
	var input_enabled_teacher_name = $('.teacher_name_'+workshop_id).prop('disabled', false);
	var input_enabled_course_name = $('.course_name_'+workshop_id).prop('disabled', false);


  console.log('input_enabledinput_enabled',input_enabled_f_name);
	
  var input_enabled_f_name_value_get = $(input_enabled_f_name).val();
  var input_enabled_teacher_name_value_get = $(input_enabled_f_name).val();
  var input_enabled_course_name_value_get = $(input_enabled_f_name).val();
  console.log('input_enabled_f_name_value_getinput_enabled_f_name_value_get',input_enabled_f_name_value_get);
  $.ajax({
                url: '{!!asset("admin/workshop_value_updte")!!}',
				type: 'POST',
                dataType: 'json',
                data: {
                _token: '{!!@csrf_token()!!}',
				'workshop_id' : workshop_id,
				'input_enabled_f_name_value_get' : input_enabled_f_name_value_get,
				'input_enabled_teacher_name_value_get' : input_enabled_teacher_name_value_get,
				'input_enabled_course_name_value_get' : input_enabled_course_name_value_get,
               },
                success: function(response) {
					console.log('responseresponse',response);
					var btn_chnage_after = btn_chnage_value.html("Edit Workshop");

      
                }
            });

	

    

     }

</script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection





