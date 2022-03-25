
{{-- <input name="invisible" type="hidden" value="{{ $category->id }}"> --}}

<div class="form-group">
    {!! Form::label('name','Name') !!}
    <div>
        {!! Form::text('name', $drivers->user->name ??'', ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('email','Email') !!}
    <div>
        {!! Form::email('email',  $drivers->user->email  ??'', ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Email','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('PHONE_NO','Phone Number') !!}
    <div>
        {!! Form::number('phone_no',  $drivers->user->phone_no  ??'', ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'phone_no','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('address','Address') !!}
    <div>
        {!! Form::text('adderss',  $drivers->user->adderss  ?? '', ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Address','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
{{-- multiple  --}}
<div class="form-group">
    {!! Form::label('parents_id','Parents Name') !!}
    <div>
        {!! Form::select('parents_id[]', $parent, $drivers->drivers_parents->pluck('parent_id') ,  [
            'class' => '4colactive searchlist',
            'multiple' => 'multiple',
         'data-parsley-trigger' => 'change',
        ]) !!}


    </div>
</div>
<div class="form-group">
    {!! Form::label('userpassword','Driver Password') !!}
    <div>
        {!! Form::password('password',['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter driver Password','id'=>'myInput',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
<input type="checkbox" onclick="myFunction()">Show Password
</div>


<?php
$image = asset('images/default_img.jpg');

if (isset($drivers)) {
if ($drivers->image) {
$image = $drivers->image;
}
}
?>

{{-- <div class="form-group">

    <div class="form-group pull-right">
        <img width="100px" src="{!! $image !!}" class="show-product-img imgshow">
    </div>

    <div class="form-group">

        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['class' => 'choose-image', 'id' => 'image']) !!}
        <p class="help-block" id="error">Limit 2MB</p>
    </div>

</div>
@include('admin.drivers.partial.image_modal') --}}





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
        function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}



    </script>

@endsection
