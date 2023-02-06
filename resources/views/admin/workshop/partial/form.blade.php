<style type="text/css">
    body {
        margin: 0;
        padding: 0;
    }

    body,
    html {
        height: 100%;
    }

    .demo-multiple-select {
        width: 603%;

    }

    .mbsc-form-group-title {
        font-size: 25px;
        color: cadetblue;
        font-family: cursive;
        margin-bottom: 24px;
    }

    .mbsc-ios.mbsc-datepicker .mbsc-calendar,
    .mbsc-ios.mbsc-datepicker .mbsc-calendar-cell,
    .mbsc-ios.mbsc-datepicker .mbsc-calendar-slide {
        background: #;
    }
    .medsaveclick{
        color: white;
        padding: 1px !important;
    }

    /* calender css */





    /* calender css */
</style>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 100%;
    height: 83%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Group Map</h4>
            </div>
            <div id="map">
                @include('admin.workshop.map')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'name') !!}
            <div>
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'data-parsley-required' => 'true',
                    'data-parsley-trigger' => 'change',
                    'placeholder' => ' Name',
                    'required',
                    'maxlength' => '100',
                ]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('course', 'course') !!}
            <div>
                {!! Form::select('courses_id', $course_id, null, [
                    'class' => 'form-control',
                    'data-parsley-required' => 'true',
                    'data-parsley-trigger' => 'change',
                    'placeholder' => 'Course',
                    'required',
                    'maxlength' => '100',
                ]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('Teacher', 'teacher') !!}
            <div>
                {!! Form::select('teacher_id', $teacher, null, [
                    'class' => 'form-control',
                    'data-parsley-required' => 'true',
                    'data-parsley-trigger' => 'change',
                    'placeholder' => 'Enter Teacher Name',
                    'required',
                    'maxlength' => '100',
                ]) !!}
            </div>
        </div>

        <?php

        ?>

        <div class="form-group">
            {!! Form::label('start_time', 'Start Time') !!}
            <div>
                {!! Form::time('start_time', null, [
                    'class' => 'form-control',
                    'data-parsley-required' => 'true',
                    'data-parsley-trigger' => 'change',
                    'required',

                    'maxlength' => '100',
                ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('end_time', 'End Time') !!}
            <div>
                {!! Form::time('end_time', null, [
                    'class' => 'form-control',
                    'data-parsley-required' => 'true',
                    'data-parsley-trigger' => 'change',
                    'required',
                    'maxlength' => '100',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="is_online ">Workshop Online Class</label>
            <input style="height: 12px;
            margin-top: 33px;" type="checkbox" id="online_checkbox" onclick="set_is_online()" name="is_online"><div>

                <!--  -->
                <!-- <div class="form-group">
                <label for="is_online ">Group Online Class</label>
                    <div>
                        <input checked="checked" name="is_online" type="checkbox">
                    </div>
                </div> -->
                <!--  -->
            </div>
            <br>
            <!--  -->
            <!-- <div id="venue_map" style="display:none" > -->
            <div id="venue_map" style="display: block;    margin-top: 25px;">
                <!-- <label >Enter Venue:</label>
                <input type="text" required  name="venue" class = 'form-control'> -->


                <input type="button" value="Open Map" class="btn btn-danger" onclick="open_map();">&nbsp;<label>Open Map For Workshop Venue</label>
                <br>
                <br>

                <input hidden="" name="group_lat" id="group_lats" value="">
                <input hidden="" name="group_long" id="group_longs" value="">
            </div>
            <!--  -->
            <!-- <  group mappppppppppppppppppp-->
        </div>

        <div class="result"></div>

        </br>

        <!--  -->

        <div class="demo-multiple-select">
            <div style="height:5%">
                <div class="mbsc-grid">
                    <div class="mbsc-row">
                        <div class="mbsc-col-sm-12 mbsc-col-md-4">
                            <div class="mbsc-form-group">

                                {{-- costum Calendar start --}}

                                <button type="button" class="btn btn-primary camodal" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    Launch Calendar
                                </button>
                                <input type="hidden" name="dates" class="dates">
                                @include('admin.workshop.partial.calender', [
                                    'date_input' => '.dates',
                                    'selection_type' => 'multiple',
                                ])


                                {{-- costum Calendar finish --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="col-md-5 pull-left">
            <div class="form-group text-center">
                <div>
                    {!! Form::submit('Save', [
                        'class' => 'btn-block btn-lg btn-parsley medsaveclick',
                        'onclick' => 'return validateForm();',
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
</div>


<!--  -->


<!--  -->

<span id="err" class="error-product"></span>

<div class="form-group col-md-12"></div>



@section('app_jquery')
    <script>
        function validateForm() {
            // getAllDates();
            return true;
        }
        $(document).ready(function() {
            $('#myModal').modal('hide');
        });

        function set_is_online() {
            var checkBox = document.getElementById("online_checkbox");
            var venue_maps = document.getElementById("venue_map");
            if (checkBox.checked == true) {
                venue_maps.style.display = "none";
            } else {
                venue_maps.style.display = "block";
            }
            console.log('sasa');
        }

        function open_map() {
            console.log('mapssssssss');
            var checkBox = document.getElementById("online_checkbox");
            $('#myModal').modal('show');
        }

        {{--    --}}

        function addday() {
            var nextdivnum = $('.add').length + 1;
            console.log('sfdffff', nextdivnum)
            $('.choice-file').append(radioBtnHtml(nextdivnum));
            $('#correct-choice').append(optionHtml(nextdivnum));
        }

        function radioBtnHtml(nextdivnum) {
            return `<div class="choice-input">
            <div class="row">
                {{-- first column   --}}
                <div class="col-sm-4">
                    <label for="cars">Choose a Class Day</label>
                    <select name="day[]" id="cars" class="form-control">
                      <option value="monday">Monday</option>
                      <option value="tuesday">Tuesday</option>
                      <option value="wednesday">Wednesday</option>
                      <option value="thursday">Thursday</option>
                      <option value="friday">Friday</option>
                      <option value="saturday">Saturday</option>
                      <option value="sunday">Sunday</option>
                    </select>
            </div>
            {{--   --}}

            {{--   second column  --}}
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('start_time', 'Choose a Class Start Time') !!}
                    <div>
                        {!! Form::time('start_time[]', null, [
                            'class' => 'form-control',
                            'data-parsley-required' => 'true',
                            'data-parsley-trigger' => 'change',
                            'placeholder' => 'Start Time',
                            'maxlength' => '100',
                        ]) !!}
                    </div>
                </div>
            </div>

            {{--    --}}

            {{--  third column   --}}
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('end_time', 'Choose a Class End Time') !!}
                                <div>
                                    {!! Form::time('end_time[]', null, [
                                        'class' => 'form-control',
                                        'data-parsley-required' => 'true',
                                        'data-parsley-trigger' => 'change',
                                        'placeholder' => 'End Time',
                                        'maxlength' => '100',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
            {{--    --}}


            </div>
            </div>`
        }

        function removeday() {
            console.log('length', $('.choice-input').length);
            if ($('.choice-input').length < 1) {
                return;
            }
            $('.choice-input:last').remove();
        }

        function optionHtml(no) {
            return `<option class ="option-file"  value="` + no + `">Choice # ` + no + `</option>`
        }
    </script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection
