@extends('layouts.default_module')
@section('module_name')
Question List
@stop
@section('table')

<thead>
    <tr>

        <th>
            Question
        </th>
        <th>
            Checkbox
        </th>
    </tr>
</thead>
<tbody>
    <?php
    // dd($quiz_question_id);
    // if(isset($quiz_question)){
    // if($quiz_question->)


    // }

    ?>
    @foreach ($question_courses as $key => $qc)
    <?php
    $q = $qc->question;
    ?>
    <tr class="myarrow myarrow_{{ $q->id }}">

        <td>
            {{ ucwords($q->question) }}

        </td>
        <td>


            <div class="form-group">

                <div>
                    <?php
                    $is_checked = false;

                    if (in_array($q->id, $quiz_question)) {
                        $is_checked = true;
                    }
                    ?>
                    {!! Form::checkbox('question', null,$is_checked,
                    ['onClick'=>'check_uncheck_question('.$q->id.','.$quiz->id.')']) !!}
                </div>

            </div>
        </td>
    </tr>
    @endforeach

</tbody>

@section('pagination')
{{-- <span class="pagination pagination-md pull-right">{!! $question->render() !!}</span> --}}
<div class="col-md-3 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::open(['method' => 'get', 'route' => ['admin.quiz']]) !!}
            {!! Form::submit('Back', ['class' => 'btn btn-default btn-block btn-lg btn-parsley']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('app_jquery')
<script>
    function check_uncheck_question(question_id, quiz_id) {
        var my_url = '{!! asset("admin/quiz_question_list/update")!!}';
        console.log('my_url', my_url);
        $.ajax({
            url: my_url,
            method: 'post',
            data: {
                question_id: question_id,
                quiz_id: quiz_id,
                _token: '{!!csrf_token()!!}'
            },
            success: function(res) {
                console.log('ress', res);
            },
            error: function(err) {
                console.log('error', err);
            }
        })
    }
</script>
@endsection

@stop