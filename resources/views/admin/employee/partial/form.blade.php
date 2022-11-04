
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
    {!! Form::label('email',' Email') !!}
    <div>
        {!! Form::text('email', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>' Email','required',
        'maxlength'=>"100"]) !!}
    </div>
</div> 
<div class="form-group">
    {!! Form::label('password',' Password') !!}
    <div>
        {!! Form::text('password', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>' Password','required',
        'maxlength'=>"100"]) !!}
    </div>
</div> 





<!-- <div>
<button class="employee_save" onclick="employee_permission()">SAVE </button>
</div> -->


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

