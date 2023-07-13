@extends('user.layout.header_footer')
@section('content')

{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">  --}}
<link href="{!! asset('theme/user_theme/css/groupform.css') !!}" rel="stylesheet">
<link href="{!!asset('theme/user_theme/css/courses_payment.css')!!}" rel="stylesheet">

<!-- <style>
  
</style> -->

<div class="bgareaa">

    <div class="page-header text-center dubhead">
        <h1>COURSE AND GROUP DETAILS</h1>
    </div>

    <!-- Credit Card Payment Form - START -->
    <div class="container sacvg">




        <!--  -->
        <div class="row">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>

            @endif
            <div class="col-xs-6">
                <div class="form-group lube"> <label> User Name:</label>
                    <div class="input-group">
                        <input type="text" name="amount" class="lubin" disabled value="{{$course_register->user->name}}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group lube"> <label> Course Name:</label>
                    <div class="input-group">
                        <input type="text" name="Course" class="lubin" disabled value="{{$course_register->course->full_name}}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->

        <!--  -->
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group lube"> <label> Group Name:</label>
                    <div class="input-group">
                        <input type="text" name="Group" class="lubin" disabled value="{{$course_register->group->name}}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group lube"> <label> Payment Type:</label>
                    <div class="input-group">
                        <input type="text" name="Payment" class="lubin" disabled value="{{$course_register->student_fees->fees_type}}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->




        @if(isset($single_student_fees))
        <!-- single payment show -->
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group lube"> <label> Amount:</label>
                    <div class="input-group">
                        <input type="text" name="amount" class="lubin" disabled value="{{$single_student_fees->amount}}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group lube"> <label> Due Date:</label>
                    <div class="input-group">
                        <input type="text" name="amount" class="lubin" disabled value="{{date('d-m-Y', $single_student_fees->due_date) }}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>
        </div>



        </label>


        <form role="form" method="post" action="{{url('user_single_payment')}}">
            <div class="col-xs-12 myy zcs" style="text-align:center;margin-top:25px">

                <a href="{{asset('user_single_payment?single_student_id='.$single_student_fees->id)}}" type="button" class="btn btn-info myy lubclick">
                    Pay

                </a>
            </div>
        </form>
    </div>
</div>

<!--  -->
@elseif($student_fees)

<!-- multiple payment show -->
<form role="form" method="post" action="{{url('user_payment')}}">
    @csrf
    @foreach($student_fees as $key => $c)

    <div class="amount_due_date_div_{{$c->id}}" onclick="amount_due_date_div('{{$c->id}}')">

        <div class="row my_amount_date_{{$c->id}}">


            <div class="col-xs-6">
                <div class="form-group lube"> <label> Amount:</label>
                    <div class="input-group">
                        <input type="text" name="amount" class="lubin" disabled value="{{$c->amount}}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group lube"> <label> Due Date:</label>
                    <div class="input-group">
                        <input type="text" name="amount" class="lubin" disabled value="{{date('d-m-Y', $c->due_date) }}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>


        </div>

    </div>



    <!--toggle -->
    <label class="switch">
        <input type="checkbox" class="highlight_class_{{$c->id}}" onclick="highlight_div('{{$c->id}}')" name="student_id[]" value="{{$c->id}}">
        <span class="slider round"></span>
    </label>

    <!--  -->
    @endforeach
    <div class="row">

        <div class="col-xs-12 myy" style="text-align:center;">
            <button type="submit" class="btn btn-info myy lubclick">PAY</button>
        </div>
    </div>


</form>
</div>

<!--  -->
@endif











@endsection














@section('app_jquery')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
    $(function() {
        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    //    amount: $('.amount').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    })

    function highlight_div(e) {


        var student_id = e;
        console.log('student_id', student_id);

        var highlight_class = $('.highlight_class_' + student_id);

        if ($(highlight_class).is(':checked')) {
            console.log('eeeeeeeeeeeeee', student_id)
            var my_amount_date = $('.my_amount_date_' + student_id).css("background-color", "#e5e5e5");

        } else if (!$(highlight_class).is(':checked')) {
            var my_amount_date = $('.my_amount_date_' + student_id).css("background-color", "");

        }

    }

    function amount_due_date_div(e) {


        var student_id = e;
        console.log('student_id', student_id);

        var highlight_class = $('.highlight_class_' + student_id).prop('checked', true);
        var my_amount_date = $('.my_amount_date_' + student_id).css("background-color", "#e5e5e5");

    }


    function openpaymentdiv() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>


@endsection