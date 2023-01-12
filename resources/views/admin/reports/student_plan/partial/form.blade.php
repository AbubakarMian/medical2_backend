{{-- {!!dd($student_plan);!!} --}}

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

<?php
$type = '';
?>
@foreach($student_plan as $p)
@if($p->status == 'paid')
<div class="form-group">
        {!! Form::label('old_amount','Amount Paid') !!}
        <div>
            <input value="{{$p->amount}}" name="lname" disabled class="form-control old_amount">
        </div>
        </select>
    </div>
 @else(!$p->status == 'paid')

<div class="old_paln_show">

    @if($p->fees_type == $type)
    @else
    <div class="form-group">
        {!! Form::label('old_fees_type','Fees Type') !!}
        <div>
            <input value="{{$p->fees_type}}" name="lname" disabled class="form-control">
        </div>
        </select>
    </div>
    @endif
    <?php
    $type = $p->fees_type;
    ?>

    <div class="form-group">
        {!! Form::label('old_amount','Amount Not Paid ') !!}
        <div>
            <input value="{{$p->amount}}" name="lname" disabled class="form-control old_amount">
        </div>
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('old_due_date','Due Date') !!}
        <div>
            <input value="{!! date('d-m-Y', $p->due_date) !!}" name="l_name" disabled class="form-control">

        </div>
        </select>
    </div>
</div>
<input hidden name="student_id[]" value="{{$p->id}}">
<input hidden name="user_id" value="{{$p->user_id}}">
<input hidden name="group_id" value="{{$p->group_id}}">
<input hidden name="course_register_id" value="{{$p->course_register_id}}">
<input hidden name="course_id" value="{{$p->course_id}}">
@endif
@endforeach
<div class="row">

    <div class="col-sm-10">
    </div>

    <div class="col-sm-2">

        <button type="button" onclick="edit_plan('{{$p->fees_type}}')" class="btn btn-danger edit_plans_area"> New Plan</button>

    </div>

</div>
<div class="fees_type_areaaa">
    <div class="form-group">
        {!! Form::label('fees_type','Fees Type',) !!}
        {!! Form::select('fees_type',$fees_type,null,[
        "onchange"=>"open_fees_type_div()",
        "class"=>"form-control fees_type remove_option",]) !!}
        </select>
    </div>
</div>
<div class="complete_fees_area">
    <h3>
        Enter Complete Fess Amount And Due Date
    </h3>

    <div class="row">
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
    </div>

</div>

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
    <div class="multiple_times_open_div">

    </div>
</div>
<span id="err" class="error-product"></span>
<div class="form-group col-md-12">
</div>

<div class="col-md-5 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-lg btn-parsley medsaveclick', 'onblur' => 'return validateForm();']) !!}
        </div>
    </div>
</div>
@section('app_jquery')
<script>
    var student_plan = '{!!$student_plan!!}';
    function open_fees_type_div() {
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

    function remove_installment(e) {
        $(e).parent().remove();
    }

    function installment_html(v) {
        return (`
        <div class="row installmet_div_row">
            <!-- columnnn-->
            <div class="col-sm-6">
                <div class="form-group">
                    <lable>Amount</lable>
                    <div>
                        <input type='number' name='amounts[]' class='form-control'
                            data-parsley-required='true' , data-parsley-trigger='change'
                            placeholder='Enter Amount'>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <lable>Due Date</lable>
            <div>
                <input type='number' name='due_date[]' class='form-control'
                            data-parsley-required='true' , data-parsley-trigger='change'
                            placeholder='Enter Due Date'>
            </div>
        </div>
            </div>
        <div class="col-sm-2 btn btn-danger form-group" onclick="remove_installment(this)" style="margin-top: 10px;
            margin-left: 16px;
            margin-bottom: 18px;">Remove</div>
        </div>`


        );
    }

    function add_installment_divs() {
        var installmet_div_row = $('.installmet_div_row').length;
        var multiple_times_open_div = $('.multiple_times_open_div').append(installment_html(installmet_div_row));
    }

    function edit_plan(fees_type) {
        var old_paln_show = $('.old_paln_show').hide();
        if(fees_type == 'installment'){
          var fees_type_areaaa = $('.fees_type_areaaa').show();
          var complete_remove = $(".remove_option option[value='complete']").remove();
          var $installment_fees_area_show = $('.installment_fees_area').show();
         }
        else{
            var fees_type_areaaa = $('.fees_type_areaaa').show();
            var installment_remove = $(".remove_option option[value='installment']").remove();
            var $complete_fees_area_show = $('.complete_fees_area').show()
      }
        var edit_plans_area = $('.edit_plans_area').hide();
    }

    $(document).ready(function() {
        var $complete_fees_area = $('.complete_fees_area').hide();
        var $installment_fees_area = $('.installment_fees_area').hide();
        var $fees_type_areaaa = $('.fees_type_areaaa').hide();
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
