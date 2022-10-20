@extends('user.layout.header_footer')
@section('content')

{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">  --}}

<link href="{!!asset('theme/user_theme/css/courses_payment.css')!!}" rel="stylesheet">

<!-- <style>
  
</style> -->

<div class="bgareaa">

<div class="page-header text-center dubhead">
<h1>Group Members Details</h1>
    <h1>Courses And Group Details</h1>
</div>

<!-- Credit Card Payment Form - START -->
<div class="container">

    <!--  -->
    <div class="row">
    @if (isset($success))
<div class="alert alert-success alert-block">
     <button type="button" class="close" data-dismiss="alert">×</button>
 <strong>Thankyou ! Course Register Successfully for Group Members</strong>
</div>
 @endif



     <div class="row">
     <div class="col-xs-6">

     <div class="form-group lube"> <label> Course Name:</label>
                <div class="input-group">
                    <input type="text" name="Course" class="lubin" disabled value="{{$course->full_name}}" class="form-control" placeholder="Enter Amount" />
                    <span class="input-group-addon"></span>
                </div>
            </div> 
            </div> 

         
        <div class="col-xs-6">
            <div class="form-group lube"> <label> Group Name:</label>
                <div class="input-group">
                    <input type="text" name="Group" class="lubin" disabled value="{{$course->group->name}}" class="form-control" placeholder="Enter Amount" />
                    <span class="input-group-addon"></span>
                </div>
            </div>
        </div> 
    </div>
<?php
// dd($studen_array_id[0]);

?>
@foreach($all_course_register as $c_r )
<div class="row">
    
        <div class="col-xs-6">
            <div class="form-group lube"> <label> User Name:</label>
                <div class="input-group">
                    <input type="text" name="amount" class="lubin" disabled value="{{$c_r->user->name}}" class="form-control" placeholder="Enter Amount" />
                    <span class="input-group-addon"></span>
                </div>
            </div>
        </div>
        
 </div>

       

     @foreach($group->group_fees as $c )
 
     <div class="amount_due_date_div_{{$c_r->user_id}}" onclick="amount_due_date_div('{{$c_r->user_id}}')">
     <div class="row my_amount_date_{{$c_r->user_id}}{{$c->id}}">
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
    <!--  -->
    </div>
    <!--  -->
 
    
         <!--toggle -->
         <label class="switch">
                    <input type="checkbox" class="highlight_class_{{$c_r->user_id}}{{$c->id}}" onclick="highlight_div('{{$c->id}}','{{$c_r->user_id}}')" name="student_id[]" value="{{$c_r->user_id}}">
                    <span class="slider round"></span>
        </label>
        
            <!--  -->
    


@endforeach


@endforeach

        <!-- <div class="row">
       
    </div> -->
    </div>
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
            function highlight_div(e,u){


                var group_fess_id = e;
                var user = u;
                console.log('group_fess_id',group_fess_id);
                console.log('user',user);
              

                var highlight_class = $('.highlight_class_'+user+group_fess_id);

                if ($(highlight_class).is(':checked')) {
                    console.log('eeeeeeeeeeeeee',group_fess_id)
                    var my_amount_date = $('.my_amount_date_'+user+group_fess_id).css("background-color", "skyblue");

            }
            else if(!$(highlight_class).is(':checked')){
                var my_amount_date = $('.my_amount_date_'+user+group_fess_id).css("background-color", "white");

            }

        }
        function amount_due_date_div(e){
          

            var group_fess_id = e;
            console.log('group_fess_id',group_fess_id);

            var highlight_class = $('.highlight_class_'+group_fess_id).prop('checked',true);
            var my_amount_date = $('.my_amount_date_'+group_fess_id).css("background-color", "skyblue");
           
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