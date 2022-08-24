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
        {!! Form::select('courses_id',  $course_id , null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Course','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('Teacher','teacher') !!}
    <div>
        {!! Form::select('teacher_id',  $teacher , null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter Teacher Name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>

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
            @foreach ($group_timings  as $key => $ch)

            <div class="row">

                {{-- first column   --}}
                <div class="col-sm-4">
                    <label for="cars">Choose a Class Day</label>

            <select name="day[]" id="cars" class="form-control">
              <option value="monday" {{$ch->day == 'monday' ? 'selected'     :''}}>Monday</option>
              <option value="tuesday" {{$ch->day == 'tuesday' ? 'selected'     :''}} >Tuesday</option>
              <option value="wednesday" {{$ch->day == 'wednesday' ? 'selected'     :''}}>Wednesday</option>
              <option value="thursday" {{$ch->day == 'thursday' ? 'selected'     :''}}>Thursday</option>
              <option value="friday" {{$ch->day == 'friday' ? 'selected'     :''}}>Friday</option>
              <option value="saturday" {{$ch->day == 'saturday' ? 'selected'     :''}}>Saturday</option>
              <option value="sunday" {{$ch->day == 'sunday' ? 'selected'     :''}}>Sunday</option>
            </select>
        </div>
        {{--   --}}


        {{--   second column  --}}
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

{{--    --}}

{{--  third column   --}}
<div class="col-sm-4">
<div class="form-group">
    {!! Form::label('end_time','End Time') !!}
    <div>
        {!! Form::time('end_time[]',date('h:i:s',$ch->end_time)  , ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'End Time',
        'maxlength'=>"100"]) !!}
    </div>
</div>
</div>

{{--    --}}


 </div>

            @endforeach
            @endif
        </div>
    </div>
    <!--  group mappppppppppppppppppp-->   



<!--  -->

<div class="form-group">
    {!! Form::label('is_online ','Group Online Class') !!}
   
    <div>

    <input type="checkbox" id="myCheck" onclick="myFunction()" name="is_online">

<!--  -->


<!-- <div class="form-group">
    {!! Form::label('is_online ','Group Online Class') !!}
   
    <div>
        {!! Form::checkbox('is_online',null  , ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'onclick="myFunction()"'=>'true',
        'data-parsley-trigger'=>'change',
        'maxlength'=>"100"]) !!}
    </div>
</div> -->



<!--  -->
    </div>
    </br>
    <!--  -->
    <!-- <div id="venue_map" style="display:none" > -->
    <div id="venue_map" >
    <!-- <label >Enter Venue:</label> 
    <input type="text" required  name="venue" class = 'form-control'> -->
        </br>

    <label>Open Map For Group Venue</label> 
    </br>  
    </br> 
    <input type="button" value="Open Map" class="btn btn-danger" onclick="open_map();">

    <input   hidden name="group_lat"  id="group_lats" value=""> 
<input  hidden  name="group_long"  id="group_longs" value="">  
  </div>
  <!--  -->


  <!-- <  group mappppppppppppppppppp-->    
</div>






{{--    --}}
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
    function validateForm() {
        return true;
    }

    // 
    $(document).ready(function(){
       
$('#myModal').modal('hide');


   });

function myFunction(){

    var checkBox = document.getElementById("myCheck");
    var venue_maps = document.getElementById("venue_map");
    if (checkBox.checked == true){
     venue_maps.style.display = "none";
    }
   else {
    venue_maps.style.display = "block";
    }
    console.log('sasa');
}

    // 

    // map
    function open_map(){
        console.log('mapssssssss');
        $('#myModal').modal('show');


    }





    // 

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


    {{--    --}}

</script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>


@endsection

