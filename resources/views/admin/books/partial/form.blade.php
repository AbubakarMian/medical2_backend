
{{-- <input name="invisible" type="hidden" value="{{ $category->id }}"> --}}

<div class="form-group">
    {!! Form::label('name',' Name') !!}
    <div>
        {!! Form::text('name', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>' Name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description','Description') !!}
    <div>
        {!! Form::text('description',  null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter Description','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>

<div class="form-group">
    <label for="category_id">Select Category</label>

    {!!Form::select('category_id',$category,null,['class' => 'form-control',
    'data-parsley-required'=>'true',
    'data-parsley-trigger'=>'change',
    'placeholder'=>'Select Category','required',
    'maxlength'=>"100"])!!}
    {{-- <select class="form-control" id="courses" name="courses" required>
        @foreach ($courses_list as $key => $ch)
        <option class="option-file" value="{{ $key + 1 }}">{{ $ch->name }}</option>
        @endforeach

    </select> --}}
</div>

<div class="form-group">
    <label for="courses_id">Select Courses</label>

    {!!Form::select('courses_id',$courses,null,['class' => 'form-control',
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










{{-- {!! Form::label('description', 'Description') !!}
    <div >

    <div>
        {!! Form::textarea('description', null, ['class' => 'ckeditor form-control' , 'id'=>'summary-ckeditor', 'data-parsley-required' => 'true', 'data-parsley-trigger' => 'change', 'placeholder' => 'Enter title', 'required', 'maxlength' => '100']) !!}
    </div>



</div> --}}





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

