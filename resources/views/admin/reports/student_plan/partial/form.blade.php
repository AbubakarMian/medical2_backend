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

<!--  old_paln_show-->
<div class="old_paln_show">


<div class="form-group">
    {!! Form::label('old_fees_type','Fees Type') !!}
    <div>
    <input value="{{$student_plan->fees_type}}" name="lname" disabled class="form-control">
                </div>
    </select>
</div>


<div class="form-group">
    {!! Form::label('old_amount','Amount') !!}
    <div>
    <input value="{{$student_plan->amount}}" name="lname" disabled class="form-control old_amount">
                </div>
    </select>
</div>

<div class="form-group">
    {!! Form::label('old_due_date','Due Date') !!}
    <div>
    <input value="{{$student_plan->due_date}}" name="l_name" disabled class="form-control">
                </div>
    </select>
</div>
</div>

<!--  -->



<!--  -->
<div class="row">

    <div class="col-sm-10">
    </div>

    <div class="col-sm-2">
  
    <button type="button" onclick="edit_plan()" class="btn btn-danger edit_plans_area"> New Plan</button>

</div>

</div>
<!--  -->



<!--newwwwwwww  WORKSSSS-->

<div class="fees_type_areaaa">
<div class="form-group">
    {!! Form::label('fees_type','Fees Type',) !!}
    {!! Form::select('fees_type',$fees_type,null,["placeholder"=>"Select
    Type","onchange"=>"open_fees_type_div()", 
    "class"=>"form-control fees_type","required"]) !!}
    </select>
</div>
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
                    {!! Form::text('amounts', null, ['class' => 'form-control complete_amount',
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
          

        </div>


    </div>


    <!--  multiple times open-->
    <div class="multiple_times_open_div">




    </div>
</div>






<!--  -->





<!-- END_installment_fees_area -->






<!-- END NEW_WORKSSS -->











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

    function installment_html(v) {
        return( `
<div class="row installmet_div_row">

    <!-- columnnn-->
<div class="col-sm-6">
<div class="form-group">
    {!! Form::label('amount','Amount') !!}
    <div>
        {!! Form::text('amounts[]', null, ['class' => 'form-control',
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

         <div class="col-sm-2 btn btn-danger form-group" onclick="remove_installment(this)" style="margin-top: 10px;
    margin-left: 16px;
    margin-bottom: 18px;">Remove</div>

    </div>`
            
            
            );
    }

    function add_installment_divs() {

        console.log('add_installment_divs_add_installment_divs');
        // var installment_div = $('.installment_divs').length+1;
        var installmet_div_row = $('.installmet_div_row').length;
        var multiple_times_open_div = $('.multiple_times_open_div').append(installment_html(installmet_div_row));


    }



    function  edit_plan(){

console.log('edit_plan_edit_plan');

var old_paln_show = $('.old_paln_show').hide();

var fees_type_areaaa = $('.fees_type_areaaa').show();

var edit_plans_area = $('.edit_plans_area').hide();

}








    // end new


    $(document).ready(function() {

        var $complete_fees_area = $('.complete_fees_area').hide();
        var $installment_fees_area = $('.installment_fees_area').hide();
        var $fees_type_areaaa = $('.fees_type_areaaa').hide();
        var $remove_divs = $('.remove_divs').hide();
        // var edit_plans_area = $('.edit_plans_area').hide();



    });
</script>
<script>
    function validateForm() {
        return true;
    }
</script>



<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>



@endsection