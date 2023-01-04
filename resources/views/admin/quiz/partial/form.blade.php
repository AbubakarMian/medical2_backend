

<div class="form-group">
    {!! Form::label('name','Full Name') !!}
    <div>
        {!! Form::text('name', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>' Name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('detail','Detail') !!}
    <div>
        {!! Form::text('detail',  null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Detail','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>



<div class="form-group">
        <label for="courses">Select Courses</label>

        {!!Form::select('course_id',$courses_list,null,['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Select Course','required',
        'maxlength'=>"100"])!!}
        {{-- <select class="form-control" id="courses" name="courses" required>
            @foreach ($courses_list as $key => $ch)
            <option class="option-file" value="{{ $key + 1 }}">{{ $ch->name }}</option>
            @endforeach

        </select> --}}
    </div>


<span id="err" class="error-product"></span>


<div class="form-group col-md-12">
</div>





<div class="col-md-5 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-lg btn-parsley medsaveclick', 'onblur' => 'return validateForm();']) !!}
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

