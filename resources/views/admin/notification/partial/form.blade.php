<div class="form-group">
    {!! Form::label('name','Notification Name') !!}
    <div>
        {!! Form::text('title', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>' Enter Notification Name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>




<?php
$image = asset('images/download.png');

if (isset($notification)) {
if ($notification->avatar) {
    $image = $notification->avatar;

}
}
?>

<div class="form-group">

    <div class="form-group pull-right">
        <img width="100px" src="{!! $image !!}" class="show-product-img imgshow">
    </div>

    <div class="form-group">

        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['class' => 'choose-image', 'id' => 'image']) !!}
        <p class="help-block" id="error">Limit 2MB</p>
    </div>

</div>
<div class="form-group">
    {!! Form::label('details','Notification Details') !!}
    <div>
        {!! Form::text('detail', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>' Enter Notification Details','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
@include('admin.notification.partial.image_modal')



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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <!-- jQuery library -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}

    <!-- JS & CSS library of MultiSelect plugin -->
     <script src="multiselect/jquery.multiselect.js"></script>
    <link rel="stylesheet" href="multiselect/jquery.multiselect.css">


    <script>
         function validateForm() {
            return true;
        }


    </script>

@endsection




