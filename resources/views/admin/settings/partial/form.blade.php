
<div class="form-group">
  <label>
    Coin Purchase <small>(this means how much dollars will be needed to purchase one coin)</small>
  </label>
  <div>
    {!! Form::text('coin_purchase', $settings->value,['class' => 'form-control',
    'data-parsley-required'=>'true',
    'data-parsley-trigger'=>'change',
    'placeholder'=>' Enter Coin Purchase Value ','required',
    'maxlength'=>"100"]) !!}
</div>

</div>


<div class="form-group">
    <label>
      Coin  Sell <small>(this means how much coins will be sold for one dollar)</small>
    </label>
    <div>
      {!! Form::text('coin_sell', $settings_sell->value,['class' => 'form-control',
      'data-parsley-required'=>'true',
      'data-parsley-trigger'=>'change',
      'placeholder'=>' Enter Coin Purchase Value ','required',
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




