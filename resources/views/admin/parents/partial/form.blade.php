<style>
    .multiselect {
        width: 200px;
    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        font-weight: bold;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #dadada solid;
    }

    #checkboxes label {
        display: block;
    }

    #checkboxes label:hover {
        background-color: #1e90ff;
    }

</style>
@if ($message = Session::get('error'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
    @if($control == 'edit')
        {!! Form::model($parents,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['parents.update', $parents->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['parents.save' ], 'files'=>true]) !!}
    @endif

<div class="form-group">
    {!! Form::label('name','Name') !!}
    <div>
        {!! Form::text('name', $parents->user->name ??'', ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('email','Email') !!}
    <div>
        {!! Form::email('email',  $parents->user->email  ??'', ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Email','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('PHONE_NO','Phone Number') !!}
    <div>
        {!! Form::number('phone_no',  $parents->user->phone_no  ??'', ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'phone_no','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('address','Address') !!}
    <div>
        {!! Form::text('address',  $parents->user->address  ?? '', ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Address','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('userpassword','Parents Password') !!}
    <div>
        {!! Form::password('password',['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter Parent Password','id'=>'myInput',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
<input type="checkbox" onclick="myFunction()">Show Password
</div>



        <span id="err" class="error-product"></span>


        <div class="form-group col-md-12">
        </div>





        <div class="col-md-5 pull-left">
            <div class="form-group text-center">
                <div>
                    {!!Form::submit('Save',
                    ['class'=>'btn btn-primary btn-block btn-lg btn-parsley medsaveclick','onblur'=>'return validateForm();'])!!}
                </div>
            </div>
        </div>



        @section('app_jquery')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- JS & CSS library of MultiSelect plugin -->
        <script src="multiselect/jquery.multiselect.js"></script>
        <link rel="stylesheet" href="multiselect/jquery.multiselect.css">


        <script>
            var expanded = false;

            function showCheckboxes() {
                var checkboxes = document.getElementById("checkboxes");
                if (!expanded) {
                    boxes.style.display = "block";
                    expanded = true;
                } else {
                    checkboxes.style.display = "none";
                    expanded = false;
                }
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



