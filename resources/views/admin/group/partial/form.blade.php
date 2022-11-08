<style>
    div#zoom {
        background-color: #d8dcee;
        color: black;
        font-size: 17px;
        margin-top: 14px;
        margin-bottom: 0px;
    }

    #zoom_textarea {
        background-color: #d8dcee;
        color: black;
        font-size: 17px;
        margin-top: 14px;
        margin-bottom: 0px;
    }

    input#myCheck {
        width: 35px;
        height: 19px;
    }
</style>


<!-- modal -->



<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 100%;
    height: 83%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Group Map</h4>
            </div>
            <!-- <div class="modal-body" id="map">
          <p>Some text in the modal.</p>
        </div> -->
            <div id="map">
                @include('admin.group.map')


            </div>

        </div>

    </div>
</div>


<!--  -->
<div class="form-group">
    {!! Form::label('name','name') !!}
    <div>
        {!! Form::text('name', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>' Name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('course','course') !!}
    <div>
        {!! Form::select('courses_id', $course_id , null, ['class' => 'form-control select_data_for_course',
        'data-parsley-required'=>'true',
        'onchange'=>'select_course(this)',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Select Course','required',
        'maxlength'=>"100"]) !!}
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

        <button type="button" onclick="edit_plan()" class="btn btn-danger edit_plans_area">New Plan</button>

    </div>

</div>
<!--  -->

<div class="form-group">
    {!! Form::label('Teacher','teacher') !!}
    <div>
        {!! Form::select('teacher_id', $teacher , null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter Teacher Name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>




<!--newwwwwwww  WORKSSSS-->

<div class="form-group open_fees_type_div_area">
    <div id="palne" style="font-size: 19px;
    color: cornflowerblue;
    font-weight: bold">
        Please Select A new Plan
    </div>
    {!! Form::label('fees_type','Fees Type',) !!}
    {!! Form::select('fees_type',$fees_type,null,["placeholder"=>"Select
    Type","onchange"=>"open_fees_type_div()", "class"=>"form-control fees_type","required"]) !!}
    </select>
</div>



<!--  complete_fees_area-->


<div class="complete_fees_area" style="background-color: #d3d3d32e;">
    <h3>
        Enter Complete Fess Amount And Due Date
    </h3>

    <div class="row">

        <!-- columnnn-->
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('amount','Amount') !!}
                <div>
                    {!! Form::text('amount', null, ['class' => 'form-control complete_amount',
                    'data-parsley-required'=>'true',
                    'data-parsley-trigger'=>'change',
                    'placeholder'=>'Enter Amount',
                    'maxlength'=>"100"]) !!}
                </div>
            </div>
        </div>


        <!-- end columnnn -->

        <!-- columnnn -->
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('due_date','Due Date') !!}
                <div>
                    {!! Form::date('due_date', null, ['class' => 'form-control complete_due_date',
                    'data-parsley-required'=>'true',
                    'data-parsley-trigger'=>'change',
                    'placeholder'=>'Enter Due Date',
                    'maxlength'=>"100"]) !!}
                </div>
            </div>
        </div>

        <!-- end  columnnn-->

    </div>

</div>

<!-- END_complete_fees_area -->




<!--  INSATLLMENT_fees_area-->
<div class="installment_fees_area">


    <h3>
        Enter Installment
    </h3>

    <div class="row">

        <div class="col-sm-10">
        </div>

        <div class="col-sm-2">

            <button type="button" onclick="add_installment_divs()" class="btn btn-danger installment_divs">Add Installment</button>

        </div>


    </div>


    <!--  multiple times open-->
    <div class="multiple_times_open_div" style="background-color: #d3d3d32e;">

    </div>
</div>


<!--  -->





<!-- END_installment_fees_area -->





<!-- END NEW_WORKSSS -->


<!--  -->
<div class="form-group">
    {!! Form::label('address','Address') !!}
    <div>
        {!! Form::text('address', null, ['class' => 'form-control address',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'id'=>'address',
        'placeholder'=>' address','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('city','City') !!}
    <div>
        {!! Form::text('city', null, ['class' => 'form-control city',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'id'=>'city',
        'placeholder'=>' city','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>








<!-- <div class="form-group">
    {!! Form::label('country','Country') !!}
    <div>
        {!! Form::text('country', null, ['class' => 'form-control country',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change', 
        'id'=>'country', 
        'placeholder'=>' country','required',
        'maxlength'=>"100"]) !!}
    </div>
</div> -->


<!--  -->
<?php



?>
<div class="form-group">
    {!! Form::label('start_date','Start Date') !!}
    <div>
        {!! Form::date('start_date',null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'required',

        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('end_date','End Date') !!}
    <div>
        {!! Form::date('end_date', null , ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'required',
        'maxlength'=>"100"]) !!}
    </div>
</div>


</br>

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
    <div class="choice-input">
        @if (isset($group_timings))
        @foreach ($group_timings as $key => $ch)

        <div class="row">

            {{-- first column   --}}
            <div class="col-sm-4">
                <label for="cars">Choose a Class Day</label>

                <select name="day[]" id="cars" class="form-control">
                    <option value="monday" {{$ch->day == 'monday' ? 'selected'     :''}}>Monday</option>
                    <option value="tuesday" {{$ch->day == 'tuesday' ? 'selected'     :''}}>Tuesday</option>
                    <option value="wednesday" {{$ch->day == 'wednesday' ? 'selected'     :''}}>Wednesday</option>
                    <option value="thursday" {{$ch->day == 'thursday' ? 'selected'     :''}}>Thursday</option>
                    <option value="friday" {{$ch->day == 'friday' ? 'selected'     :''}}>Friday</option>
                    <option value="saturday" {{$ch->day == 'saturday' ? 'selected'     :''}}>Saturday</option>
                    <option value="sunday" {{$ch->day == 'sunday' ? 'selected'     :''}}>Sunday</option>
                </select>
            </div>
            {{-- --}}


            {{-- second column  --}}
            <div class="col-sm-4">


                <div class="form-group">
                    {!! Form::label('start_time','Start Time') !!}
                    <div>
                        {!! Form::time('start_time[]',date('h:i:s',$ch->start_time) , ['class' => 'form-control',
                        'data-parsley-required'=>'true',
                        'data-parsley-trigger'=>'change',
                        'placeholder'=>'Start Time',
                        'maxlength'=>"100"]) !!}
                    </div>
                </div>
            </div>

            {{-- --}}

            {{-- third column   --}}
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('end_time','End Time') !!}
                    <div>
                        {!! Form::time('end_time[]',date('h:i:s',$ch->end_time) , ['class' => 'form-control',
                        'data-parsley-required'=>'true',
                        'data-parsley-trigger'=>'change',
                        'placeholder'=>'End Time',
                        'maxlength'=>"100"]) !!}
                    </div>
                </div>
            </div>

            {{-- --}}


        </div>

        @endforeach
        @endif
    </div>
</div>
<!--  group mappppppppppppppppppp-->



<!--  -->


    {!! Form::label('is_online ','Group Online Class') !!}

    <div>

        <input type="checkbox" id="myCheck" onclick="myFunction()" name="is_online">
    </div>


    <div class="form-group" id="zoom">



        {!! Form::label('zoom','Choose Url For Online Class') !!}
        {!! Form::file('zoom', ['class' => 'choose-zoom', 'id'=>'zoomss'] ) !!}
        <p class="help-block" id="error">Limit 2MB</p>

        <span>OR</span />

        <div id="zoom_textarea">
            {!! Form::textarea('zoom_visible',null,['class'=>'form-control' ,
            'rows'=>'3','placeholder'=>'Enter video URL',
            'maxlength'=>"225"]) !!}
            {!!Form::hidden('video')!!}

        </div>



    </div>



</br>
<!--  -->

<div id="venue_map">
    <!-- <label >Enter Venue:</label> 
    <input type="text" required  name="venue" class = 'form-control'> -->
    </br>

    <label>Open Map For Group Venue</label>
    </br>
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





<div class="col-md-5 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-lg btn-parsley', 'onblur' => 'return validateForm();']) !!}
        </div>
    </div>
</div>




@section('app_jquery')
<script>
    // newwww

    function select_course(course_id) {

        //     var count = 0;
        //     $(course_id).click(function () {
        //     count += 1;

        //     if (count == 2) {
        //         // $(".old_paln_show").hide();


        //     }
        //   });

        $.ajax({

            url: "{!!asset('admin/group/select_courses_id')!!}/" + course_id.value,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{!!@csrf_token()!!}'
            },
            success: function(response) {
                console.log('aaaaaaaaaaaaaaa', response);
                var len = response['data'].length;
                console.log('aaaaaaacccccctttttttttt', response['data'].length);
                if (response.status) {
                    console.log('aaaaaaacccccc', response['data'][0].courses.full_name);
                    var course_name = response['data'][0].courses.full_name;


                    for (var i = 0; i < len; i++) {
                        console.log('qqqqqqqqqqqqq', response['data'][i]);


                        console.log('amountamount', response['data'][i].amount);


                        var amount = response['data'][i].amount;

                        var due_date = new Date(response['data'][i].due_date * 1000).toDateString("en-US", {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });

                        var fees_type = response['data'][i].fees_type;
                        var course_name = response['data'][i].courses.full_name;





                        var tr_str =
                            `
                     
                        <div class="row">
                  
                        <!-- columnnn-->
                        <div class="col-sm-6">
                        <div class="form-group">
                        {!! Form::label('amount','Amount') !!}
                        <div>
                        <input value="` + amount + `" class="form-control" disabled>
                        </div>
                        </div>

                            </div>
                            <!-- end columnnn -->

                            <!-- columnnn-->
                        <div class="col-sm-6">
                        <div class="form-group">
                        {!! Form::label('due_date','Due Date') !!}
                        <div>
                        <input value="` + due_date + `" class="form-control" disabled>
                        </div>
                        </div>

                            </div>
                            <!-- end columnnn -->

                            </div>

                            </div> `;



                        $(".old_paln_show").append(tr_str);



                    }




                    var edit_plans_area = $('.edit_plans_area').show();

                    console.log('bbbbbbbbbbbbbbbbbbbbb', response.status);



                }
            }
        });
        //  


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

        if (select_fees_type == 'complete') {

            var $complete_fees_area = $('.complete_fees_area').show()
            var $installment_fees_area = $('.installment_fees_area').hide()

        };
        if (select_fees_type == 'installment') {

            var $installment_fees_area = $('.installment_fees_area').show();
            var $complete_fees_area = $('.complete_fees_area').hide()

        };



    }

    function remove_installment(e) {

        $(e).parent().remove();
    }

    function installment_html(v) {
        return (`


<div class="row installmet_div_row">

<!-- columnnn-->
<div class="col-sm-6">
<div class="form-group">
{!! Form::label('amount','Amount') !!}
<div>
{!! Form::text('amount[]', null, ['class' => 'form-control',
'data-parsley-required'=>'true',
'data-parsley-trigger'=>'change',
'placeholder'=>'Enter Amount',
'maxlength'=>"100"]) !!}
</div>
</div>

    </div>
    <!-- end columnnn -->

<!-- columnnn -->
    <div class="col-sm-6">
    <div class="form-group">
{!! Form::label('due_date','Due Date') !!}
<div>
{!! Form::date('due_date[]', null, ['class' => 'form-control',
'data-parsley-required'=>'true',
'data-parsley-trigger'=>'change',
'placeholder'=>'Enter Due Date',
]) !!}
</div>
</div>
    </div>

 <!-- end  columnnn-->
 

 <div class="col-sm-2 btn btn-danger form-group" onclick="remove_installment(this)" style="margin-top: 10px;
    margin-left: 16px;
    margin-bottom: 18px;">Remove</div>

    </div>`


        );
    }

    function add_installment_divs() {

        console.log('add_installment_divs_add_installment_divs');
        // var installment_div = $('.installment_divs').length+1;
        var installmet_div_row = $('.installmet_div_row').length;
        var multiple_times_open_div = $('.multiple_times_open_div').append(installment_html(installmet_div_row));


    }







    // end new
    function validateForm() {
        return true;
    }

    // 
    $(document).ready(function() {
        // var checkBox = document.getElementById("myCheck");
        var venue_maps = $("#venue_map").hide();
        var zoom =$("#zoom").hide();
        // 
        var $open_fees_type_div_area = $('.open_fees_type_div_area').hide();
        var $complete_fees_area = $('.complete_fees_area').hide();
        var $installment_fees_area = $('.installment_fees_area').hide();
        var edit_plans_area = $('.edit_plans_area').hide();

        $('#myModal').modal('hide');


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





    // 


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
                    {!! Form::label('start_time','Choose a Class Start Time') !!}
                    <div>
                        {!! Form::time('start_time[]',  null, ['class' => 'form-control',
                        'data-parsley-required'=>'true',
                        'data-parsley-trigger'=>'change',
                        'placeholder'=>'Start Time',
                        'maxlength'=>"100"]) !!}
                    </div>
                </div>
            </div>

            {{--    --}}

{{--  third column   --}}
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('end_time','Choose a Class End Time') !!}
                    <div>
                        {!! Form::time('end_time[]',  null, ['class' => 'form-control',
                        'data-parsley-required'=>'true',
                        'data-parsley-trigger'=>'change',
                        'placeholder'=>'End Time',
                        'maxlength'=>"100"]) !!}
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
        return `
                            <option class ="option-file"  value="` + no + `">Choice # ` + no + `</option>
                            `
    }
</script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>


@endsection