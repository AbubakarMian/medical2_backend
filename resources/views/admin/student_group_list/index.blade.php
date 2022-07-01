@extends('layouts.default_module')
@section('module_name')
    Student Group List
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
            {{-- <th>
                Checkbox
            </th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($student as $t)
            <?php
            $checkbox = false;
            if (in_array($t->id, $group_users)) {
                // dd('saa');
                $checkbox = true;
            }
            else{
                continue;
            }

            ?>
            <tr>

                <td>{!! ucwords($t->name) !!}</td>
                <td>

                    {{-- <input hidden name="course_id" value="{!! $group->courses_id !!}" > --}}

                    {{-- <div class="form-group">
                        <div>
                            {!! Form::checkbox('question', null,$checkbox, ['onClick' => 'check_uncheck_student(' . $t->id . ',' . $group->id . ')']) !!}
                        </div>
                    </div> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
@section('pagination')
    <div class="col-md-3 pull-left">
        <div class="form-group text-center">
            <div>
                {!! Form::open(['method' => 'get', 'route' => ['group.index']]) !!}
                {!! Form::submit('Cancel', ['class' => 'btn btn-default btn-block btn-lg btn-parsley']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('app_jquery')
    <script>
        function check_uncheck_student(student_id, group_id) {
            console.log(student_id, 'student_idstudent_idstudent_id');
            console.log(group_id, 'group_idgroup_idgroup_id');

            var my_url = '{!! asset('admin/student_group_checked/update') !!}'
            $.ajax({
                url: my_url,
                method: 'post',
                data: {
                    student_id: student_id,
                    group_id: group_id,
                    _token: '{!! csrf_token() !!}'

                },
                sucess: function(res) {
                    console.log('resss', res)
                },
                error: function(err) {
                    console.log('error', err)
                }



            })

        }
    </script>
@endsection
@stop
