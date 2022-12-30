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
ٖ
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

<!--  -->

<div class="form-group">
    {!! Form::label('is_online ', 'Workshop Online Class') !!}
    <div>
        <input type="checkbox" id="myCheck" onclick="myFunction()" name="is_online">
        <!--  -->
        <!-- <div class="form-group">
        {!! Form::label('is_online ', 'Group Online Class') !!}
            <div>
                {!! Form::checkbox('is_online', null, [
                    'class' => 'form-control',
                    'data-parsley-required' => 'true',
                    'onclick="myFunction()"' => 'true',
                    'data-parsley-trigger' => 'change',
                    'maxlength' => '100',
                ]) !!}
            </div>
        </div> -->
        <!--  -->
    </div>
    </br>
    <!--  -->
    <!-- <div id="venue_map" style="display:none" > -->
    <div id="venue_map">
        <!-- <label >Enter Venue:</label>
        <input type="text" required  name="venue" class = 'form-control'> -->
        </br>

        <label>Open Map For Workshop Venue</label>
        </br>
        </br>
        <input type="button" value="Open Map" class="btn btn-danger" onclick="open_map();">
        <input hidden name="group_lat" id="group_lats" value="">
        <input hidden name="group_long" id="group_longs" value="">
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

<!--  -->

<span id="err" class="error-product"></span>

<div class="form-group col-md-12"></div>

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
        function validateForm() {
            // getAllDates();
            return true;
        }
        $(document).ready(function() {
            $('#myModal').modal('hide');
        });

        function myFunction() {
            var checkBox = document.getElementById("myCheck");
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
            var checkBox = document.getElementById("myCheck");
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


        // mobiscroll.setOptions({
        //     locale: mobiscroll
        //         .localeEn, // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        //     theme: 'ios', // Specify theme like: theme: 'ios' or omit setting to use default
        //     themeVariant: 'light' // More info about themeVariant: https://docs.mobiscroll.com/5-17-2/calendar#opt-themeVariant
        // });

        var init = null;

        function getAllDates() {
            console.log('get init', init);
            var ainst = $('#demo-multi-day').mobiscroll('getInst');
            // var a = ainit.getInst();
            // console.log('get dates',ainst.getVal());
            console.log('get dates', ainst);
            // var multi_dates = ainst.getVal();
            var multi_dates = ainst.getVal();
            console.log('get _valueText', multi_dates);
            var selected = [];
            $.each(multi_dates, function(key, value) {
                console.log('valuevaluevaluevalue', value.getTime());
                console.log('getTimezoneOffset', value.getTimezoneOffset());
                console.log('value', value);
                var gmt_time = (value.getTime() + (value.getTimezoneOffset() * 60 * 1000)) / 1000;
                console.log('gmt_time', gmt_time);
                $('.result').append(`<input hidden  name="selected_multi[]" value="` + gmt_time + `" >`);
            });
        }

        $(function() {
            // Mobiscroll Calendar initialization
            init = $('#demo-multi-day').mobiscroll();
            init.datepicker({
                // controls: ['calendar'], // More info about controls: https://docs.mobiscroll.com/5-17-2/calendar#opt-controls
                returnFormat: [
                    'jsdate'
                ], // moment More info about returnFormat: https://docs.mobiscroll.com/5-17-2/calendar#opt-controls
                display: 'inline', // Specify display mode like: display: 'bottom' or omit setting to use default
                selectMultiple: true
            });
        });
    </script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection
