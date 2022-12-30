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

    .addmudbox:hover {
        /* transform: scale(1.10); */
        background: #191970;
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
                        @for ($s = 0; $s < 5; $s++)
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
                        @endfor
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
                'class' => 'btn btn-primary btn-block btn-lg btn-parsley',
                'onclick' => 'return validateForm();',
            ]) !!}
        </div>
    </div>
</div>

@section('app_jquery')
    <script>
        $(function() {
            createModal({
                id: 'list_courses',
                class: 'cascassssssssssss',
                header: '<h4 class="corheading">Courses</h4>',
                body: getCoursesListTable(),
                footer: `

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            `,
            });


        })

        function getCoursesListTable() {
            var table = `
            <table>
                <thead>
                <thead>
                <tbody>
        `;

            @foreach ($courses_list as $cl)
                table = table + '<tr>';

                table = table + '</td>';

                <?php
                $checked = '';
                if (in_array($cl->id, $question_course)) {
                    $checked = 'checked';
                }
                ?>

                table = table +
                    '<td><div class="checkbox"><label><input class="selected_courses_checkbox" type="checkbox" {!! $checked !!} value="{!! $cl->id !!}"></label></div>';
                table = table + '<td>{!! $cl->full_name !!}';
                table = table + '</td>';
                table = table + '</tr>';


                // new checkboxes start
                table = `<div class='row'>
                    <div class='col-sm-12'>
                        <div class='switchbox'>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                        </div>
                        <div class='switchbox'>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                            <div class='switchboxdata'>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default</label>
                            </div>
                        </div>
                    </div>
                </div>`;
                // new checkboxes finish
            @endforeach ()

            table = table + `</tbody></table>`;

            return table;
        }


        function validateForm() {
            // return false;
            var selected_courses_checkbox = $('.selected_courses_checkbox');
            var values_selected_courses = [];



            $("input:checkbox[class=selected_courses_checkbox]:checked").each(function() {
                values_selected_courses.push($(this).val());
            });

            console.log('values_selected_courses', values_selected_courses);
            var selected_courses_csv = values_selected_courses.join(',');
            console.log('selected_courses', selected_courses_csv);
            $('#selected_courses').val(selected_courses_csv);

            // return false;
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
