
{{-- <input name="invisible" type="hidden" value="{{ $category->id }}"> --}}
<style>
select#gender {
    width: 100%;
    height: 10%;
    border: 1px solid #e3e6f3;
}
    </style>

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
    {!! Form::label('gender','Gender') !!}
    <div>

        {!! Form::select('gender', array('Male'=>'Male','Female'=>'Female'), [
            'class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter gender','required',
        'maxlength'=>"100"]) !!}
    </div>

</div>
<div class="form-group">
    {!! Form::label('email','Email') !!}
    <div>
        {!! Form::text('email',  null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter email','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('address','Address') !!}
    <div>
        {!! Form::text('address',  null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter address','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('password','Password') !!}
    <div>
        {!! Form::text('password',  null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter Password','required',
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

