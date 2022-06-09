

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
    {!! Form::label('start_date','Start Date') !!}
    <div>
        {!! Form::date('start_date',  null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Start Date',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('end_date','End Date') !!}
    <div>
        {!! Form::date('end_date',  null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'End Date',
        'maxlength'=>"100"]) !!}
    </div>
</div>









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

</script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection

