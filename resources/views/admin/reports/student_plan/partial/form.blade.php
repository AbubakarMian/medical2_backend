<style>
    .image_area {
        position: relative;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 1000px !important;
    }

    .overlay {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }

    .image_area:hover .overlay {
        height: 50%;
        cursor: pointer;
    }

    .text {
        color: blue;
        font-size: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>



<!--newwwwwwww  WORKSSSS-->

<div class="form-group">
    {!! Form::label('fees_type','Fees Type',) !!}
    {!! Form::select('fees_type',$fees_type,null,["placeholder"=>"Select
    Type","onchange"=>"open_fees_type_div()", "class"=>"form-control fees_type","required"]) !!}
    </select>
</div>



<!--  complete_fees_area-->


<div class="complete_fees_area">
    <h3>
        Enter Complete Fess Amount And Due Date
    </h3>

    <div class="row">
        <!-- columnnn-->
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('amount','Amount') !!}
                <div>
                    {!! Form::text('amount', null, ['class' => 'form-control complete_amount',
                    'data-parsley-required'=>'true',
                    'data-parsley-trigger'=>'change',
                    'placeholder'=>'Enter Amount',
                    'maxlength'=>"100"]) !!}
                </div>
            </div>

        </div>
        <!-- end columnnn -->

        <!-- columnnn -->
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('due_date','Due Date') !!}
                <div>
                    {!! Form::date('due_date', null, ['class' => 'form-control complete_due_date',
                    'data-parsley-required'=>'true',
                    'data-parsley-trigger'=>'change',
                    'placeholder'=>'Enter Due Date',
                    'maxlength'=>"100"]) !!}
                </div>
            </div>
        </div>

        <!-- end  columnnn-->

    </div>

</div>

<!-- END_complete_fees_area -->




<!--  INSATLLMENT_fees_area-->
<div class="installment_fees_area">


    <h3>
        Enter Installment
    </h3>

    <div class="row">

        <div class="col-sm-10">
        </div>

        <div class="col-sm-2">

            <button type="button" onclick="add_installment_divs()" class="btn btn-danger installment_divs">Add Installment</button>
            <button type="button" class="btn btn-danger remove_divs">Remove Installment</button>

        </div>


    </div>


    <!--  multiple times open-->
    <div class="multiple_times_open_div">




    </div>
</div>






<!--  -->





<!-- END_installment_fees_area -->






<!-- END NEW_WORKSSS -->

<input type="hidden" name="cropped_image" id="cropped_image">










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
    // newwww

    function open_fees_type_div() {


        console.log('open_fesss_type_divvvvvvvv');

        var select_fees_type = $('.fees_type').val();
        console.log('select_fees_type__select_fees_type', select_fees_type);

        if (select_fees_type == 'complete') {

            var $complete_fees_area = $('.complete_fees_area').show()
            var $installment_fees_area = $('.installment_fees_area').hide()

        };
        if (select_fees_type == 'installment') {

            var $installment_fees_area = $('.installment_fees_area').show();
            var $complete_fees_area = $('.complete_fees_area').hide()

        };



    }

    function remove_installment(e){

        $(e).parent().remove();
    }

    function installment_html(installmet_div_row_number) {
        return( `
<div class="row installmet_div_row">
<div onclick="remove_installment(this)">Remove</div>
    <!-- columnnn-->
<div class="col-sm-6">
<div class="form-group">
    {!! Form::label('amount','Amount') !!}
    <div>
        {!! Form::text('amount[]', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter Amount',
        'maxlength'=>"100"]) !!}
    </div>
</div>

            </div>
            <!-- end columnnn -->

<!-- columnnn -->
            <div class="col-sm-6">
            <div class="form-group">
    {!! Form::label('due_date','Due Date') !!}
    <div>
        {!! Form::date('due_date[]', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Enter Due Date',
        ]) !!}
    </div>
</div>
            </div>

         <!-- end  columnnn-->

            </div>

            </div>`);
    }

    function add_installment_divs() {

        console.log('add_installment_divs_add_installment_divs');
        // var installment_div = $('.installment_divs').length+1;
        var installmet_div_row = $('.installmet_div_row').length;
        var multiple_times_open_div = $('.multiple_times_open_div').append(installment_html(installmet_div_row));


    }












    // end new


    $(document).ready(function() {

        var $complete_fees_area = $('.complete_fees_area').hide();
        var $installment_fees_area = $('.installment_fees_area').hide();
        var $remove_divs = $('.remove_divs').hide();



    });
</script>
<script>
    function validateForm() {
        return true;
    }
</script>



<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>



@endsection