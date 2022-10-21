@extends('user.layout.header_footer')
@section('content')

{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">  --}}


<style>

    .inlineimage{
        max-width:470px;margin-right: 8px;margin-left: 10px}
    .images{
        display: inline-block;max-width: 98%;height: auto;width: 22%;margin: 1%;left:20px;text-align: center}
</style>



    <!-- Credit Card Payment Form - START -->
    <div class="container">
        
                            
                                

           
 <div class="page-header text-center">
        <h1>Credit Card Payment Gateway</h1>
</div>

@if(isset($res_student_array))


    <div class="row">
<div class="col-xs-12">
    <div class="form-group"> 
        <label> Your Total Amount</label>
        <div class="input-group">
            <input type="text"  disabled value="{{ $amount}}" class="form-control" />
            <span class="input-group-addon"></span>
        </div>
    </div>
</div>
</div>
@endif


    <!--  -->

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <section class="login-section">
                                <div class="container-fluid login-container">
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
    
                                @elseif( $message = Session::get('error'))
                                    <div class="alert alert-danger text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            {{--  <h3 class="text-center">Payment Details</h3>  --}}
                            <div class="inlineimage"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png"> </div>
                        </div>
                    </div>
                    <form role="form" action="{{ url('payment/stripe') }}" method="post"
                    class="require-validation" data-cc-on-file="false"
                    data-stripe-publishable-key="{{$stripe_key}}"
                    id="payment-form">
                    @csrf
                    <div class="panel-body">


                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group"> <label>CARD NUMBER</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control card-number"  required name="mycard" placeholder="Valid Card Number" /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
                                           
                                    <!-- total_amount -->
                              
                                 <!--  -->
                                 
                                @if(isset($res_student_array))
                                @foreach($res_student_array as $key => $c)
                                <input type="hidden" name="group_student_id[]"  value="{{$c->id}}" class="form-control" />
                                  <input type="hidden" name="amount"  value="{{ $amount}}" class="form-control" />
                                @endforeach
                                @endif
                              <!--  --> 
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                         <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                          <input type="text" class="form-control card-expiry-month" placeholder="MM"  required />
                                         </div>  <input type="text" class="form-control card-expiry-year" placeholder="YY" required />
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group"> <label>CV CODE</label> <input type="text"  required class="form-control card-cvc" placeholder="CVC" /> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group"> <label>CARD OWNER</label> <input type="text"  required class="form-control mycard"  name="username" placeholder="Card Owner Name" /> </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">


                                    <button type="submit" class="btn btn-success btn-lg btn-block" >
                                        Confirm Payment
                                        </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</div>







   @endsection














   @section('app_jquery')
   <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

   <script>


   $(function(){
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

