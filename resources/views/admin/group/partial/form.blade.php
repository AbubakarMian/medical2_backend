{{-- {!!dd($group->registration_start_time);!!} --}}


<style>
    .medsaveclick {
        padding: 1px !important;
    }

    div#zoom {
        background-color: #f1f4f9;
        color: #59595a;
        font-size: 15px;
        margin-top: 14px;
        margin-bottom: 0px;
        padding: 15px;
    }

    /* .form-group.open_fees_type_div_area {
        background-color: #d3d3d32e;
        width: 100%;
        height: 27%;
        border-radius: 8px;
    } */

    #zoom_textarea {
        background-color: #d8dcee;
        color: black;
        font-size: 17px;
        margin-top: 14px;
        margin-bottom: 0px;
    }

    input#is_online_checkbox {
        width: 35px;
        height: 19px;
    }

    select#fees_type {
        /* background-color: aliceblue; */
        height: 52px;
        border-radius: 27px;
        font-size: 21px;
        color: black;
        font-family: fangsong;
    }

    .orspan {
        font-size: 13px;
        font-weight: 700;
        margin: 1px 2px;
    }

    .gmap {
        text-align: center;
        font-size: 18px;
        font-weight: 700;
        color: gray;
    }
</style>


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<!-- modal -->



<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
<div class="row">
    <div class="col-md-6">
        <span class="error error_span" id="error_span"></span>

        {{-- <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><p><span class="error_span" id="error_span"></span></p></strong>
        </div> --}}

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-mg ">

                <!-- Modal content-->
                <div class="modal-content" style="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title gmap">Group Map</h4>
                    </div>
                    <!-- <div class="modal-body" id="map">
          <p>Some text in the modal.</p>
        </div> -->
                    <div id="map">
                        @include('admin.group.map')


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="form-group">
            {!! Form::label('name', 'name') !!}
            <div>
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'data-parsley-required' => 'true',
                    'data-parsley-trigger' => 'change',
                    'placeholder' => ' Name',
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
        // $course = '';
        // if(isset($group)){
        //     $address = $group->address;
        // }
        ?>
        <div class="form-group">
            {!! Form::label('course', 'course') !!}
            <div>
                {!! Form::select('courses_id', $course_id, null, [
                    'class' => 'form-control select_data_for_course',
                    'data-parsley-required' => 'true',
                    'onchange' => 'select_course(this)',
                    'data-parsley-trigger' => 'change',
                    'placeholder' => 'Select Course',
                    'maxlength' => '100',
                ]) !!}
            </div>
        </div>


        <!-- <div class="old_paln_show_heading">
</div> -->
        <div class="old_paln_show">
        </div>

        <!--  -->
        <div class="row">

            <div class="col-sm-10">
            </div>

            <div class="col-sm-2">

                {{-- <button type="button" onclick="edit_plan()" class="btn btn-danger edit_plans_area">New Plan</button> --}}

            </div>

        </div>
        <!--  -->






        <!--newwwwwwww  WORKSSSS-->

        <div class="form-group open_fees_type_div_area">
            <div id="palne"
                style="
             font-size: 20px;
             color: black;
                font-weight: bold;
                             ">
                {{-- Please Select A new Plan
            </div>
            <div class="my_feese_type" style="margin-top: 22px;color: black;">

                {!! Form::label('fees_type', 'Fees Type') !!}
                {!! Form::select('fees_type', $fees_type, null, [
                    'placeholder' => "Select
                                                                                Type",
                    'onchange' => 'open_fees_type_div()',
                    'class' => 'form-control fees_type',
                ]) !!} --}}

                <input type="hidden" name="fees_type" value="installment">
                <!-- </select> -->

            </div>

        </div>


        <!--  INSATLLMENT_fees_area-->
        {{-- <div class="installment_fees_area"> --}}

            <?php
            $install = '';
            if (isset($group)) {
                $install = 'block;';
            }
            else {
                $install = 'none;';
              }

            ?>
        <div>
            {{-- <h3>
                Enter Installment
            </h3> --}}





            <div class="row">
                <div class="col-sm-10">
                </div>
                <div class="col-sm-2" id="installment_button" style ="display:{!! $install !!}">
                    <button type="button" onclick="add_installment_divs()" class="btn btn-danger installment_divs" >Add
                        Installment</button>
                </div>
            </div>
            <!--  multiple times open-->
            <div class="multiple_times_open_div" style="background-color: #d3d3d32e;">

            </div>
        </div>
        <!-- END_installment_fees_area -->

        <!-- END NEW_WORKSSS -->

        <?php
        $address = '';
        if (isset($group)) {
            $address = $group->address;
        }
        ?>
        <!--  -->
        <div class="form-group">
            {!! Form::label('address', 'Address') !!}
            <div>
                {!! Form::text('address', $address, [
                    'class' => 'form-control address',
                    'data-parsley-required' => 'true',
                    'data-parsley-trigger' => 'change',
                    'id' => 'address',
                    'placeholder' => ' address',
                    'required',
                    'maxlength' => '100',
                ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('city', 'City') !!}
            <div>
                {!! Form::text('city', null, [
                    'class' => 'form-control city',
                    'data-parsley-required' => 'true',
                    'data-parsley-trigger' => 'change',
                    'id' => 'city',
                    'placeholder' => ' city',
                    'required',
                    'maxlength' => '100',
                ]) !!}
            </div>
        </div>

        <!-- <div class="form-group">
            {!! Form::label('country', 'Country') !!}
            <div>
                {!! Form::text('country', null, [
                    'class' => 'form-control country',
                    'data-parsley-required' => 'true',
                    'data-parsley-trigger' => 'change',
                    'id' => 'country',
                    'placeholder' => ' country',
                    'required',
                    'maxlength' => '100',
                ]) !!}
            </div>
                </div> -->


        <!--  -->
        <?php

        ?>

    </div>
    <?php
    $start_date = '';
    if (isset($group)) {
        $start_date = $group->start_date;
    }
    ?>

    <div class="col-md-6">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('start_date', 'Start Date') !!}
                <div>
                    <input type="date" name="start_date" class="form-control start_date_validation"
                        value={!! $start_date !!} data-parsley-required="true" data-parsley-trigger="change"
                        placeholder="Enter start date">


                </div>
            </div>
        </div>
        <?php
        $end_date = '';
        if (isset($group)) {
            $end_date = $group->end_date;
        }
        ?>
        <div class="col-md-6">

            <div class="form-group">
                {!! Form::label('end_date', 'End Date') !!}
                <div>
                    <input type="date" name="end_date" class="form-control end_date_validation"
                        value={!! $end_date !!} data-parsley-required="true" data-parsley-trigger="change"
                        placeholder="Enter End date">



                </div>
            </div>
        </div>


        {{-- register start and end date --}}

        <?php
        $registration_start_time = '';
        if (isset($group)) {
            $registration_start_time = $group->registration_start_time;
        }
        ?>
        <div class="col-md-6">

            <div class="form-group">
                {!! Form::label('start_date', 'Registeration Start Date') !!}
                <div>
                    <input type="date" name="registration_start_time" class="form-control start_date_validation"
                        value={!! $registration_start_time !!} data-parsley-required="true" data-parsley-trigger="change"
                        placeholder="Enter Registeration starting date">



                </div>
            </div>
        </div>
        <?php
        $registration_end_time = '';
        if (isset($group)) {
            $registration_end_time = $group->registration_end_time;
        }
        ?>
        <div class="col-md-6">

            <div class="form-group">
                {!! Form::label('end_date', 'Registeration End Date') !!}
                <div>
                    <input type="date" name="registration_end_time" class="form-control end_date_validation"
                        value={!! $registration_end_time !!} data-parsley-required="true" data-parsley-trigger="change"
                        placeholder="Enter Registeration Ending date">



                </div>
            </div>
        </div>
        <div class="form-group">

            <div class="form-group">
                <div>
                    <input type="button" value="+ Add day" class="btn btn-info" onclick="addday();">

                    <input type="button" value="Remove day" class="btn btn-danger" onclick="removeday();">


                </div>
            </div>



        </div>
        <div>







        </div>


        <div class="choice-file">
            @if (isset($group_timings))
                <div class="choice-input">

                    @foreach ($group_timings as $key => $ch)
                        <div class="row">

                            {{-- first column   --}}
                            <div class="col-sm-4">
                                <label for="cars">Choose a Class Day</label>

                                <select name="day[]" id="cars" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="monday" {{ $ch->day == 'monday' ? 'selected' : '' }}>Monday</option>
                                    <option value="tuesday" {{ $ch->day == 'tuesday' ? 'selected' : '' }}>Tuesday
                                    </option>
                                    <option value="wednesday" {{ $ch->day == 'wednesday' ? 'selected' : '' }}>Wednesday
                                    </option>
                                    <option value="thursday" {{ $ch->day == 'thursday' ? 'selected' : '' }}>Thursday
                                    </option>
                                    <option value="friday" {{ $ch->day == 'friday' ? 'selected' : '' }}>Friday</option>
                                    <option value="saturday" {{ $ch->day == 'saturday' ? 'selected' : '' }}>Saturday
                                    </option>
                                    <option value="sunday" {{ $ch->day == 'sunday' ? 'selected' : '' }}>Sunday</option>
                                </select>
                            </div>
                            {{-- --}}


                            {{-- second column  --}}
                            <div class="col-sm-4">


                                <div class="form-group">
                                    {!! Form::label('start_time', 'Start Time') !!}
                                    <div>
                                        {!! Form::time('start_time[]', date('H:i:s', $ch->start_time), [
                                            'class' => 'form-control',
                                            'data-parsley-required' => 'true',
                                            'data-parsley-trigger' => 'change',
                                            'placeholder' => 'Start Time',
                                            'maxlength' => '100',
                                            'required',
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            {{-- --}}

                            {{-- third column   --}}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('end_time', 'End Time') !!}
                                    <div>
                                        {!! Form::time('end_time[]', date('H:i:s', $ch->end_time), [
                                            'class' => 'form-control',
                                            'data-parsley-required' => 'true',
                                            'data-parsley-trigger' => 'change',
                                            'placeholder' => 'End Time',
                                            'maxlength' => '100',
                                            'required',
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            {{-- --}}


                        </div>
                    @endforeach
                </div>
            @endif

        </div>
        <!--  group mappppppppppppppppppp-->



        <!--  -->




        <div>
            {!! Form::label('is_online ', 'Group Online Class') !!}
            <input class="casva" type="checkbox" id="is_online_checkbox" onclick="is_online_class()"
                name="is_online">
        </div>


        <div class="form-group" id="zoom" class="zoomin">



            {!! Form::label('zoom', 'Enter Url For Online Class') !!}
            {{-- {!! Form::file('zoom', ['class' => 'choose-zoom', 'id' => 'zoomss']) !!}
            <p class="help-block" id="error">Limit 2MB</p>

            <span>OR</span> --}}

            <div id="zoom_textarea">
                {!! Form::text('zoom_visible', null, [
                    'class' => 'form-control',
                    'rows' => '5',
                    'placeholder' => 'Enter video URL',
                    'maxlength' => '225',
                ]) !!}
                {!! Form::hidden('video') !!}

            </div>



        </div>



        </br>
        <!--  -->

        <div>
            <!-- <label >Enter Venue:</label>
     <input type="text" required  name="venue" class = 'form-control'> -->
            </br>

            <label>Open Map For Group Venue</label>
            </br>
            <input type="button" value="Open Map" class="btn btn-danger" onclick="open_map();">

            <input hidden name="group_lat" id="group_lats" value="">
            <input hidden name="group_long" id="group_longs" value="">
        </div>
        <!--  -->


        <!-- <  group mappppppppppppppppppp-->







        {{-- --}}
        <span id="err" class="error-product"></span>


        <div class="form-group col-md-12">
        </div>





    </div>
    <div class="col-md-12">

        <div class="col-md-3 pull-left">
            <div class="form-group text-center">
                <div>
                    {!! Form::submit('Save', [
                        'class' => 'btn btn-primary btn-block btn-lg btn-parsley medsaveclick',
                        'onclick' => 'return validateForm();',
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
</div>


@section('app_jquery')
    <script>
        // newwww

        function select_course(course_id) {

            var count = 0;
            $(course_id).click(function() {
                count += 1;
                    $('#installment_button').css("display" , "block");


                if (count == 2) {
                    // $(".old_paln_show").hide();


                }
            });

            $.ajax({

                url: "{!! asset('admin/group/select_courses_id') !!}/" + course_id.value,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: '{!! @csrf_token() !!}'
                },
                success: function(response) {
                    console.log('aaaaaaaaaaaaaaa', response);
                    var len = response['data'].length;
                    console.log('aaaaaaacccccctttttttttt', response['data'].length);
                    if (response.status) {
                        console.log('aaaaaaacccccc', response['data'][0].courses.full_name);
                        var course_name = response['data'][0].courses.full_name;

                        var tr_str = '';

                        for (var i = 0; i < len; i++) {
                            console.log('qqqqqqqqqqqqq', response['data'][i]);


                            console.log('amountamount', response['data'][i].amount);


                            var amount = response['data'][i].amount;

                            // var due_date = new Date(response['data'][i].due_date * 1000).toDateString("en-US", {
                            //     weekday: 'long',
                            //     year: 'numeric',
                            //     month: 'long',
                            //     day: 'numeric'
                            // });
                            var due_date = (new Date(response['data'][i].due_date * 1000).toLocaleString('sv-SE') + '').replace(' ','T');

                            var fees_type = response['data'][i].fees_type;
                            var course_name = response['data'][i].courses.full_name;
                            var instalment_value  = {
                                amount:amount,
                                due_date:due_date
                            };
                            var multiple_times_open_div = $('.multiple_times_open_div').append(installment_html(instalment_value));

                            // tr_str = tr_str +
                            //     `

                            //         <div class="row">

                            //         <!-- columnnn-->
                            //         <div class="col-sm-6">
                            //         <div class="form-group">
                            //         {!! Form::label('amount', 'Amount') !!}
                            //         <div>
                            //         <input value="` + amount + `" class="form-control" disabled>
                            //         </div>
                            //         </div>

                            //             </div>
                            //             <!-- end columnnn -->

                            //             <!-- columnnn-->
                            //         <div class="col-sm-6">
                            //         <div class="form-group">
                            //         {!! Form::label('due_date', 'Due Date') !!}
                            //         <div>
                            //         <input value="` + due_date + `" class="form-control" disabled>
                            //         </div>
                            //         </div>

                            //             </div>
                            //             <!-- end columnnn -->

                            //             </div>
                            //             </div> `;


                        }
                        $(".old_paln_show").html(tr_str);
                        var edit_plans_area = $('.edit_plans_area').show();
                        console.log('bbbbbbbbbbbbbbbbbbbbb', response.status);
                    }
                }

            });

        }

        function edit_plan() {

            console.log('edit_plan_edit_plan');
            var open_fees_type_div_area = $('.open_fees_type_div_area').show();
            var old_paln_show = $('.old_paln_show').hide();
            var edit_plans_area = $('.edit_plans_area').hide();

        }

        function open_fees_type_div() {


            console.log('open_fesss_type_divvvvvvvv');

            var select_fees_type = $('.fees_type').val();
            console.log('select_fees_type__select_fees_type', select_fees_type);

            // if (select_fees_type == 'complete') {

            //     var $complete_fees_area = $('.complete_fees_area').show()
            //     var $installment_fees_area = $('.installment_fees_area').hide()

            // };
            // if (select_fees_type == 'installment') {

            var $installment_fees_area = $('.installment_fees_area').show();
            var $complete_fees_area = $('.complete_fees_area').hide()

            // };



        }

        function remove_installment(e) {
            var installment_length = $('.installmet_div_row').length;
            if (installment_length > 1) {
                $(e).parent().remove();
            }
        }

        function installment_html(instalment_value) {
            console.log('instalment_value',instalment_value);

            return (`<div class="row installmet_div_row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('amount', 'Amount') !!}
                                <div>
                                    <input type="number" name="amount[]" value="`+instalment_value.amount+`"
                                    class="form-control" data-parsley-trigger="change" placeholder="Enter Amount" min="0">
                                </div>
                            </div>

                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                            {!! Form::label('due_date', 'Due Date') !!}
                            <div>
                                <input type="date" name="due_date[]" value="`+instalment_value.due_date+`"
                                    class="form-control" data-parsley-trigger="change" placeholder="Enter Due Date">
                            </div>
                            </div>
                                </div>

                            <div class="col-sm-2 btn btn-danger form-group" onclick="remove_installment(this)" style="margin-top: 10px;
                                margin-left: 16px;
                                margin-bottom: 18px;">
                                Remove
                            </div>
                        </div>`);
        }

        function add_installment_divs(instalment_value) {
            var default_obj = {
                amount:0,
                due_date:''
            };
            instalment_value = instalment_value || default_obj;
            var multiple_times_open_div = $('.multiple_times_open_div').append(installment_html(instalment_value));
        }

        function is_online_class() {

            var online_checkbox = $('#is_online_checkbox');
            var venue_maps = $('#venue_maps');
            // var venue_maps = document.getElementById("venue_map");
            var zoom = $('#zoom');
            if (online_checkbox.is(':checked')) {
                console.log('in if condition')
                zoom.css('display', 'block');
                venue_maps.css('display', 'none');
            } else {
                console.log('in else condition')
                venue_maps.css('display', 'block');
                zoom.css('display', 'none');
            }
            console.log('sasa');
        }

        function open_map() {
            console.log('mapssssssss');
            $('#myModal').modal('show');
        }

        $(document).ready(function() {
            var venue_maps = $("#venue_map").hide();
            var zoom = $("#zoom").hide();
            var $open_fees_type_div_area = $('.open_fees_type_div_area').hide();
            var $complete_fees_area = $('.complete_fees_area').hide();
            var $installment_fees_area = $('.installment_fees_area').hide();
            var edit_plans_area = $('.edit_plans_area').hide();
            $('#myModal').modal('hide');

            @if(isset($group->group_fees))
                @foreach ($group->group_fees as $group_fee)
                    add_installment_divs({
                        amount:"{!!$group_fee->amount!!}",
                        due_date:"{!! date('Y-m-d',$group_fee->due_date)!!}"
                    })
                @endforeach
            @endif
        });

        function myFunction() {

            var checkBox = document.getElementById("myCheck");
            var venue_maps = document.getElementById("venue_map");
            var zoom = document.getElementById("zoom");
            if (checkBox.checked == true) {
                zoom.style.display = "block";
                venue_maps.style.display = "none";
            } else {
                venue_maps.style.display = "block";
                zoom.style.display = "none";
            }
            console.log('sasa');
        }

        //

        // map
        function open_map() {
            console.log('mapssssssss');
            $('#myModal').modal('show');
        }

        function addday() {
            var nextdivnum = $('.add').length + 1;
            console.log('sfdffff', nextdivnum)
            $('.choice-file').append(radioBtnHtml(nextdivnum));
            $('#correct-choice').append(optionHtml(nextdivnum));
        }

        function radioBtnHtml(nextdivnum) {
            return `<div class="choice-input">

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="cars">Choose a Class Day</label>

                                    <select name="day[]" required id="cars" class="form-control">
                                    <option value="">Select</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                    <option value="sunday">Sunday</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('start_time', 'Class Start Time') !!}
                                        <div>
                                            {!! Form::time('start_time[]', null, [
                                                'class' => 'form-control',
                                                'data-parsley-trigger' => 'change',
                                                'placeholder' => 'Start Time',
                                                'maxlength' => '100',
                                                'required',
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('end_time', 'Class End Time') !!}
                                        <div>
                                            {!! Form::time('end_time[]', null, [
                                                'class' => 'form-control',
                                                'data-parsley-trigger' => 'change',
                                                'placeholder' => 'End Time',
                                                'maxlength' => '100',
                                                'required',
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`
        }

        function removeday() {
            if ($('.choice-input').length < 2) {
                return;
            } else {
                $('.choice-input:last').remove();
            }
        }

        function optionHtml(no) {
            return `<option class ="option-file"  value="` + no + `">Choice # ` + no + `</option>`
        }

        function validateForm() {
            var date_valid_error_msg = '';
            var start_date_valid = true;
            var end_date_valid = true;
            var start_date_valid = $('.start_date_validation').val();
            if (start_date_valid == '') {
                start_date_valid = false;
                $('.error_span').html('Enter valid Start date');
                return 'invalid start';
            }
            var end_date_valid = $('.end_date_validation').val();
            if (end_date_valid == '') {
                end_date_valid = false;
                console.log('enter valid end date');
                $('.error_span').html('Enter valid End date');
                return 'invalid end';
            }
        }

        </script>
        @endsection
