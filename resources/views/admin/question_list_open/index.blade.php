@extends('layouts.default_module')
@section('module_name')
Question List
@stop
@section('table')

<h4 style="font-weight: 800;">Fiter by Course:
{!! Form::select('course_id',$courses,null,['id'=>'course_id','onChange'=>'filter_question_by_course(this)' , 'style'=>'box-sizing: border-box'])  !!}
</h4>
<h3 style="margin-left: 1300px; font-weight: 1000;">{!! $quiz->course->full_name!!}</h3>
<table id="questionTableAppend" style="opacity: 0">
    <thead>
        <tr>
            <th>Question</th>
            <th>Checkbox</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@stop
@section('app_jquery')                                 
<script>

function filter_question_by_course(e){
    var selected_course_id = e.value;
    console.log('e',e.value)
    // console.log('valu   ',$("#course_id option:selected").val());
    var quiz_questions_list = <?php echo json_encode($quiz_question) ?>;

    $.ajax({
                url: '{!!asset("admin/course/questions")!!}/'+selected_course_id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $("#questionTableAppend").css("opacity", 1);

                    // console.log('testttt',response['question_courses'])
                    var len = response['data'].length;
                    console.log(response);
                    for (var i = 0; i < len; i++) {
                        var question = response['data'][i].question;
                        var id = question.id;
                        var question_text = question.question;
                        var is_checked = '';
                        if(quiz_questions_list.includes(id)){
                            is_checked = 'checked';
                        }
                        var checkbox_html = `
                            <div class="form-group">
                                <div>
                                <input type="checkbox" name="question" `+is_checked+`
                                    onclick="check_uncheck_question('`+id+`','{!!$quiz->id!!}')">
                                </div>
                            </div>
                        `;
                        var tr_str = tr_str+"<tr id='row_"+id+"'>" +
                            "<td>" + question_text + "</td>" +
                            "<td>" + checkbox_html + "</td>" +
                            "</tr>";

                       
                    }
                    $("#questionTableAppend tbody").html(tr_str);
                    // $('#questionTableAppend').DataTable({
                    //     dom: '<"top_datatable"B>lftipr',                          
                    // });
                }
            });
    
    
}

    $(document).ready(function() {

        fetchRecords();

        function fetchRecords() {
            var quiz_questions_list = <?php echo json_encode($quiz_question) ?>;
            console.log('quiz_question',quiz_questions_list);
            console.log('apiii')
            $.ajax({
                url: '{!!asset("admin/course/questions/0")!!}',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $("#questionTableAppend").css("opacity", 1);

                    // console.log('testttt',response['question_courses'])
                    var len = response['data'].length;
                    console.log(response);
                    for (var i = 0; i < len; i++) {
                        var question = response['data'][i].question;
                        var id = question.id;
                        var question_text = question.question;
                        var is_checked = '';
                        if(quiz_questions_list.includes(id)){
                            is_checked = 'checked';
                        }
                        var checkbox_html = `
                            <div class="form-group">
                                <div>
                                <input type="checkbox" name="question" `+is_checked+`
                                    onclick="check_uncheck_question('`+id+`','{!!$quiz->id!!}')">
                                </div>
                            </div>
                        `;
                        var tr_str = tr_str+"<tr id='row_"+id+"'>" +
                            "<td>" + question_text + "</td>" +
                            "<td>" + checkbox_html + "</td>" +
                            "</tr>";

                        
                    }
                    $("#questionTableAppend tbody").append(tr_str);
                    $('#questionTableAppend').DataTable({
                        dom: '<"top_datatable"B>lftipr',                          
                    });
                }
            });
        }
    });


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
