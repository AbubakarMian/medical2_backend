@extends('layouts.default_module')
@section('module_name')
    Workshop
@stop
@section('add_btn')

    {!! Form::open(['method' => 'get', 'route' => ['workshop.create'], 'files' => true]) !!}
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
            <th>Teacher </th>
            <th> Course</th>
            <th>Edit </th>
            <th>Delete </th>




        </tr>
    </thead>
    <tbody>



        @foreach ($workshop as $c)
            <td>
                <input type="text" class="f_name_{{ $c->id }}" disabled value="{{ $c->name }}">
            </td>


            <td>
                <div class="my_op_{{ $c->id }}">
                    <!-- <select class="form-control my_op_{{ $c->id }}">

				<option value="Red">Red</option>
				<option value="Green">Green</option>
				<option value="White">White</option>
				<option value="Black">Black</option>

				</select> -->
                </div>

                <input type="text" class="teacher_name_{{ $c->id }}" disabled value="{{ $c->teacher->name }}">
            </td>



            <td>
                <input type="text" class="course_name_{{ $c->id }}" disabled value="{{ $c->courses->full_name }}">
            </td>



            <td>
                <button type="button" class="btn btn-warning btn_chnage_{{ $c->id }}"
                    onclick="edit_workshop({!! $c->id !!})">Edit </button>
                <button type="button" style="display:none" class="btn btn-warning save_chnage_{{ $c->id }}"
                    onclick="save_workshop({!! $c->id !!})">Save </button>
            </td>


            <td>{!! Form::open(['method' => 'POST', 'route' => ['workshop.delete', $c->id]]) !!}
                <a href="" data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert"
                    modal_msg="Do you want to delete?">
                    <span class="badge bg-info btn-primary ">
                        {!! $c->deleted_at ? 'Activate' : 'Delete' !!}</span></a>
                {!! Form::close() !!}
            </td>



            </tr>
        @endforeach



    </tbody>
@section('pagination')
    <span class="pagination pagination-md pull-right">{!! $workshop->render() !!}</span>
    <div class="col-md-3 pull-left">
        <div class="form-group text-center">

        </div>
    </div>
@endsection
@stop

@section('app_jquery')
<script>
    function edit_workshop(workshop_id) {
        console.log('workshop_idworkshop_id', workshop_id);

        var edit_btn_chnage_value = $('.btn_chnage_' + workshop_id).css("display", "none");
        var save_btn_chnage_value = $('.save_chnage_' + workshop_id).css("display", "block");

        var input_enabled_f_name = $('.f_name_' + workshop_id).prop('disabled', false);
        // var input_enabled_teacher_name = $('.teacher_name_'+workshop_id).prop('disabled', false);
        // var input_enabled_course_name = $('.course_name_'+workshop_id).prop('disabled', false);

        var input_enabled_teacher_name = $('.teacher_name_' + workshop_id).css("display", "none");
        var input_enabled_course_name = $('.course_name_' + workshop_id).css("display", "none");

        var teacher = input_enabled_teacher_name;


        var mySelect = $('.my_op_' + workshop_id).append(

            $.each(teacher, function(val, text) {

                `<select class="form-control my_teacher" id="exampleFormControlSelect1">
      <option >` + text + `</option>
    </select>`
            })

        )

    }


    function save_workshop(workshop_id) {
        var input_enabled_f_name_value_get = $('.f_name_' + workshop_id).val();
        var input_enabled_teacher_name_value_get = $('.teacher_name_' + workshop_id).val();
        var input_enabled_course_name_value_get = $('.course_name_' + workshop_id).val();
        console.log('input_enabled_f_name_value_getinput_enabled_f_name_value_get', input_enabled_f_name_value_get);

        $.ajax({
            url: '{!! asset('admin/workshop_value_updte') !!}',
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{!! @csrf_token() !!}',
                'workshop_id': workshop_id,
                'input_enabled_f_name_value_get': input_enabled_f_name_value_get,
                'input_enabled_teacher_name_value_get': input_enabled_teacher_name_value_get,
                'input_enabled_course_name_value_get': input_enabled_course_name_value_get,
            },
            success: function(response) {
                console.log('responseresponse', response);
                var edit_btn_chnage_values = $('.btn_chnage_' + workshop_id).css("display", "block");
                var save_btn_chnage_values = $('.save_chnage_' + workshop_id).css("display", "none");

                // 	setTimeout(() => {
                // 		var btn_chnage_after = btn_chnage_value.html("Edit Workshop");
                // }, 3000); //1 SECONDS


            }
        });





    }
</script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection
