

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

{{--    --}}


<div class="form-group">

    <div class="form-group">
        <div>
            <input type="button" value="+ Add day" class="btn btn-info" onclick="addday();">

            <input type="button" value="Remove day" class="btn btn-danger" onclick="removeday();">


        </div>
    </div>
</div>
<div>

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

