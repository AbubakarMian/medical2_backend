
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
    <label for="courses_id">Select Courses</label>

    {!!Form::select('courses_id[]',$courses,null,[    'class' => 'form-control searchlist',
                            'multiple' => 'multiple',
                            'data-parsley-trigger'=>'change',
                            'required',
                            'maxlength'=>"100"])!!}


</div>
<div class="form-group">


    <div class="form-group">
        {!! Form::label('Book PDF','Book PDF') !!}
        {!! Form::file('upload_book', ['class' => 'choose-book', 'id'=>'upload_book'] ) !!}

    </div>
    </div>

    <!-- avatar -->
    <?php

$avatar =  asset('images/logo.png');
    if(isset($books)){

if($books->avatar){
    $avatar = $books->avatar;
}
}
?>

<div class="form-group">

<div class="form-group pull-right">
    <img src="{!! $avatar !!}"  class="show-product-img" data-toggle="modal" data-target=".imagemodal">
</div>

<div class="form-group">
    {!! Form::label('image','Image') !!}
    {!! Form::file('avatar', ['class' => 'choose-image', 'id'=>'image','required'] ) !!}
    <p class="help-block" id="error">Limit 2MB</p>
</div>
</div>
    <!-- avatar -->







<span id="err" class="error-product"></span>


<div class="form-group col-md-12">
</div>





<div class="col-md-5 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::submit('Save', ['class' => 'btn-block btn-lg btn-parsley medsaveclick', 'onblur' => 'return validateForm();']) !!}
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

<style>
    .medsaveclick{
        color: white;
        padding: 1px !important;
    }
</style>
