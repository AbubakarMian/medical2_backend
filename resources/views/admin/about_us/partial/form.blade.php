
{{-- <div class="form-group">
    {!! Form::label('name',' Name') !!}
    <div>
        {!! Form::text('name', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>' Name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div> --}}
{!! Form::label('description', 'Description') !!}
    <div >

    <div>
        {!! Form::textarea('description', null, ['class' => ' form-control' , 'id'=>'ckeditor1222', 'data-parsley-required' => 'true', 'data-parsley-trigger' => 'change', 'placeholder' => 'Enter title', 'required', 'maxlength' => '100']) !!}
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
    $(function() {
        // $( '#ckeditor1222' ).ckeditor();
        // setTimeout(function() {
        //     console.log('stat');
            CKEDITOR.replace('ckeditor1222', {
                fullPage: true,
                allowedContent: true
            });
        // }, 5000)


    })

</script>



<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>



@endsection

