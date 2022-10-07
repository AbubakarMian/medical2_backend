@extends('user.layout.header_footer')
@section('content')

{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">  --}}


<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    button.btn.btn-info.myy {
        width: 100p;
        width: 208px;
        margin-bottom: 22px;
        border-radius: 23px;
    }


    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>


<div class="page-header text-center">
    <h1>Courses And Group Details</h1>
</div>

<!-- Credit Card Payment Form - START -->
<div class="container">

    <!--  -->
    <div class="row">
    @if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                           
                        @endif
        <div class="col-xs-6">
            <div class="form-group"> <label> User Name</label>
                <div class="input-group">
                    <input type="text" name="amount" disabled value="{{$course_register->user->name}}" class="form-control" placeholder="Enter Amount" />
                    <span class="input-group-addon"></span>
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="form-group"> <label> Course Name</label>
                <div class="input-group">
                    <input type="text" name="amount" disabled value="{{$course_register->course->full_name}}" class="form-control" placeholder="Enter Amount" />
                    <span class="input-group-addon"></span>
                </div>
            </div>
        </div>
    </div>

    <!--  -->

    <!--  -->
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group"> <label> Group Name</label>
                <div class="input-group">
                    <input type="text" name="amount" disabled value="{{$course_register->course->group->name}}" class="form-control" placeholder="Enter Amount" />
                    <span class="input-group-addon"></span>
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="form-group"> <label> Payment Type</label>
                <div class="input-group">
                    <input type="text" name="amount" disabled value="{{$course_register->student_fees->fees_type}}" class="form-control" placeholder="Enter Amount" />
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
            <div class="form-group"> <label> Amount</label>
                <div class="input-group">
                    <input type="text" name="amount" disabled value="{{$single_student_fees->amount}}" class="form-control" placeholder="Enter Amount" />
                    <span class="input-group-addon"></span>
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="form-group"> <label> Due Date</label>
                <div class="input-group">
                    <input type="text" name="amount" disabled value="{{date('d-m-Y', $single_student_fees->due_date) }}" class="form-control" placeholder="Enter Amount" />
                    <span class="input-group-addon"></span>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    @elseif($student_fees)

    <!-- multiple payment show -->


    <form role="form" method="post" action="{{action('User\CoursesController@payment_screen')}}">
        @csrf
        @foreach($student_fees as $key => $c)


        <div class="row">

            <div class="col-xs-6">
                <div class="form-group"> <label> Amount</label>
                    <div class="input-group">
                        <input type="text" name="amount" disabled value="{{$c->amount}}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group"> <label> Due Date</label>
                    <div class="input-group">
                        <input type="text" name="amount" disabled value="{{date('d-m-Y', $c->due_date) }}" class="form-control" placeholder="Enter Amount" />
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>


        </div>


       
            <!--toggle -->
            <label class="switch">
                <input type="checkbox" name="student_id[]" value="{{$c->id}}">
                <span class="slider round"></span>
            </label>
       
        <!--  -->
        @endforeach
        <div class="row">

            <div class="col-xs-12 myy" style="text-align:center ;">
                <button type="submit" class="btn btn-info myy">Pay</button>
            </div>
        </div>


    </form>


    <!--  -->
    @endif


    <div>







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