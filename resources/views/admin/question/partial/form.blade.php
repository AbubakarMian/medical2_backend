<style>
    .switchboxdata {
        margin: 10px;
    }

    .corheading {
        text-align: center;
        color: black;
        font-weight: 500;
        margin-bottom: 0px;
        margin-top: 3px;
    }

    .switchbox {
        display: flex;
    }

    .switchboxdata label {
        font-size: 13px;
        font-weight: 500;
        color: black;
    }

    .multiselect {
        width: 200px;
    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        font-weight: bold;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #dadada solid;
    }

    #checkboxes label {
        display: block;
    }

    #checkboxes label:hover {
        background-color: #1e90ff;
    }

    .addmudsize {
        width: 75%;
    }

    .addmudsize h5 {
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        color: gray;
    }

    .addmudbox p {
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        /* width:200px;  */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .addmudbox {
        border: 1px solid #e5e5e5;
        padding: 30px;
        border-radius: 5px;
        cursor: pointer;
    }

    .select_course {
        background: #191970;
        color: white;
        border-radius:6px;
    }

    .addmudbox:hover {
        /* transform: scale(1.10); */
        background: #191970e3;
        color: #ffffff;
    }

    .addmudbody {
        margin: 17px;
    }

    .mubocrl {
        overflow: scroll;
        overflow-x: hidden;
        height: 350px;
    }

    .addmudinput {
        display: flex;
    }

    .addmudinput input {
        width: 12%;
    }
</style>
{{-- <div id="add_custom_modals"></div> --}}

<div class="form-group">
    {!! Form::label('question', 'Question') !!}
    <div>
        {!! Form::text('question', null, [
            'class' => 'form-control',
            'data-parsley-required' => 'true',
            'data-parsley-trigger' => 'change',
            'placeholder' => 'Question',
            'required',
            'maxlength' => '100',
        ]) !!}
    </div>

</div>
<div class="form-group">
    {!! Form::label('add courses', 'Add Courses') !!}</br>
    <div>
        {{-- <button class="btn btn-primary" data-toggle="modal" background color="red  " data-target="#list_courses"
            onclick="return false">+Add Courses</button> --}}


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            + Add Courses
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog addmudsize" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Select Your Courses</h5>
                    </div>
                    <div class="modal-body mubocrl">
                        <div class="addmudinput">
                            <input type="text" class="form-control" id="serchhere" aria-describedby="emailHelp"
                                placeholder="serch here">
                            <button type="submit" class="btn btn-primary addmudsearch"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                        </div>
                        @foreach ($courses_list as $course_list_chunck)
                            <div class="addmudbody">
                                <div class="row">
                                    @foreach ($course_list_chunck as $course)
                                    <?php
                                        $is_selected = '';
                                        if(in_array($course['id'],$question_course)){
                                            $is_selected = 'select_course';
                                        }
                                    ?>
                                        <div class="col-sm-3">
                                            <div class="">
                                                <div class="addmudbox courses_list_class course_box_{!! $course['id'] !!} {!!$is_selected!!}"
                                                    my_id='{!! $course['id'] !!}'
                                                    onclick="course_onclick(this,'{!! $course['id'] !!}')">
                                                    <p>{!! $course['short_name'] !!}</p>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        {{-- @for ($s = 0; $s < 5; $s++)
                            <div class="addmudbody">
                                <div class="row">
                                    @for ($i = 0; $i < 4; $i++)
                                        <div class="col-sm-3">
                                            <div class="addmudbox">
                                                <p>English</p>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endfor --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="form-group">

    <div class="form-group">
        <label for="correct-choice">Select Correct Choice</label>
        <select class="form-control" id="correct-choice" name="correct_choice" required>
            @if ($question->choice)
                @foreach ($question->choice as $key => $ch)
                    <option class="option-file" value="{{ $key + 1 }}">Choice # {{ $key + 1 }}</option>
                @endforeach

            @endif
        </select>
    </div>
</div>
<div class="form-group">

    <div class="form-group">
        <div>
            <input type="button" value="+ Add choice" class="btn btn-info" onclick="addChoice();">
            <input type="button" value="Remove Choice" class="btn btn-danger" onclick="removeChoice();">
        </div>
    </div>
</div>
<div>

    <div class="choice-file">
        <div class="choice-input">
            @if ($question->choice)
                @foreach ($question->choice as $key => $ch)
                    <lable>Choice # {{ $key + 1 }}</lable>
                    <input type="text" class="add form-control" name="choices[]" value="{{ $ch->choice }}"
                        style="margin-top: 10px; margin-bottom: 5px;">
                @endforeach
            @endif
        </div>
    </div>
</div>

<input type="hidden" name="selected_courses" id="selected_courses">


<div class="col-md-5 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::submit('Save', [
                'class' => 'btn btn-primary btn-block btn-lg btn-parsley medsaveclick',
                'onclick' => 'return validateForm();',
            ]) !!}
        </div>
    </div>
</div>

@section('app_jquery')
    <script>
        // var selected_courses = [];

        function course_onclick(e, course_id) {

            console.log('new course_id', course_id);
            console.log('selected_courses', selected_courses);
            // var course_index = course_exist(course_id);
            if ($('.course_box_' + course_id).hasClass('select_course')) {
            // if (course_index === -1) {

                console.log('Already exist');

                // selected_courses.pop(course_index);
                $('.course_box_' + course_id).removeClass('select_course');
            } else {


                console.log('Not avalible  exist');

                // selected_courses.push(course_id);
                $('.course_box_' + course_id).addClass('select_course');


            }




        }


        function course_exist(course_id) {
            var index = selected_courses.findIndex(x => x == course_id);
            return index;
        }


        function validateForm() {

            var courses_div = $('.select_course');

            var selected_course = [];

            for(var i =0; i<courses_div.length;i++){
                var course_id = $(courses_div[i]).attr('my_id');
                console.log('course_idcourse_id',course_id);
                selected_course.push(course_id);
            }
            console.log('course_idcourse_id',course_id);


            var selected_courses_csv = selected_course.join(',');
            console.log('selected_courses', selected_courses_csv);
            $('#selected_courses').val(selected_courses_csv);

            return true;
        }

        function addChoice() {
            var nextdivnum = $('.add').length + 1;
            console.log('sfdffff', nextdivnum)
            $('.choice-file').append(radioBtnHtml(nextdivnum));
            $('#correct-choice').append(optionHtml(nextdivnum));
        }

        function radioBtnHtml(nextdivnum) {
            return `<div class="choice-input">
                                <lable>Choice # ` + nextdivnum + `</lable>
                                <input type="text" required class="add form-control" name="choices[]" style="margin-top: 10px; margin-bottom: 5px;">
                                </div>
                            `
        }

        function removeChoice() {
            console.log('length', $('.choice-input').length);
            if ($('.choice-input').length < 2) {
                return;
            }
            $('.choice-input:last').remove();
            $('.option-file:last').remove();
        }

        function optionHtml(no) {
            return `
                            <option class ="option-file" value="` + no + `">Choice # ` + no + `</option>
                            `
        }
        var expanded = false;

        function showCheckboxes() {
            var checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }
    </script>
    <!-- JS & CSS library of MultiSelect plugin -->
    <!-- <script src="multiselect/jquery.multiselect.js"></script>
                                    <link rel="stylesheet" href="multiselect/jquery.multiselect.css">

                                    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->
@endsection
