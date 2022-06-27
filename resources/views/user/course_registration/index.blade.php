@extends('user.layout.header_footer')
@section('content')
<link href="{!! asset('theme/user_theme/css/course_register.css') !!}" rel="stylesheet">
<link href="{!! asset('theme/user_theme/css/newmake.css') !!}" rel="stylesheet">
<link href="{!! asset('theme/user_theme/css/proceedpayment.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v3.8.1/css/all.css">

<section>
        <div class="sliderbannerarea">
            <div class="sliderplace">
                <div >


                    <div>

                            <div class="bannerarea">
                                {{--  <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="bannerareadata">
                                                <h1>Phlebotomy Certification Workshop</h1>
                                                <h3>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                                    diam nonummy nibh euismod tincidunt ut laoreet dolore
                                                    magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                                    quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                                    aliquip ex ea commodo consequat.</h3>
                                                <button type="button" class="btn btn-primary banclick">Learn More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>  --}}
                            </div>





                    </div>


                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="collagearea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="collageareadata">
                            <h2>Instructions for Online Course Registration</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis
                                at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna ali
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{--    --}}


    <section>
        <div class="collagearea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="collageareadata">
                            <h2>Choose the relevant department for the Course Registration</h2>

                            <ul style="line-height: 30px;
                            color:#337ab7;
                            font-size: 18px;">
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                <li>Ut eu metus eu enim egestas congue non a diam.</li>
                                <li>Mauris vel neque placerat, sodales nisi ac, fermentum nisi.</li>
                                <li>Donec aliquet nibh maximus, semper arcu vitae, elementum nibh.</li>
                                <li>Nunc eu leo a lacus maximus placerat at non tortor</li>
                                <li>Integer ultrices quam sit amet risus tristique, eu pulvinar quam porta</li>
                              </ul>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="collagearea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="collageareadata">







           <div class="col-2 padding-top-bottom-btn-col">


                <button  onclick="openpaymentdiv()"   class="btn btn-primary logclick"
                style="width: fit-content;color: #fff;
                background-color: #e63946;
                border-color: #e63946;">
              Payment  Course Registration

                </button>


               </div>
               <div class="col-12 text-center">
                   <p class="text-break text-secondary"></p>
               </div>

           </div>

       </div>
       <div class="paymentclosediv" id="myDIV"  style="display:none">
           <form role="form" action="{{ url('course_register/stripe') }}" method="post"
           class="require-validation" data-cc-on-file="false"
           data-stripe-publishable-key="{{$stripe_key}}"
           id="payment-form">
           @csrf


           <div class="container py-5">
               <!-- For demo purpose -->
               <div class="row mb-4">
                   <div class="col-lg-8 mx-auto text-center">
                       <h1 class="display-6">Payment</h1>
                   </div>
               </div> <!-- End -->

               <div class="row">
                   <div class="col-lg-6 mx-auto">
                       <div class="card ">
                           <div class="card-header">
                               <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">


                               </div> <!-- End -->


                               <!-- Credit card form content -->
                               <div class="tab-content">
                                   <!-- credit card info-->


                                           <div class="form-group"> <label for="username">
                                                   <h6>Card Owner</h6>
                                               </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control mycard"> </div>
                                           <div class="form-group"> <label for="cardNumber">
                                                   <h6>Card number</h6>
                                               </label>
                                               <div class="input-group">
                                                   <input autocomplete='off'
                                                   class='form-control card-number' name="mycard" size='20' type='text' required>
                                                   <div class="input-group-append">
                                                        <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i>
                                                           <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i>
                                                       </span>
                                                    </div>
                                               </div>
                                           </div>
                                           <input class='form-control mycard' id="amount" name="amount" required size='4' type='hidden'>
                                           <div class="row">
                                               <div class="col-sm-8">
                                                   <div class="form-group"> <label><span class="hidden-xs">
                                                               <h6>Expiration Date</h6>
                                                           </span></label>
                                                       <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control card-expiry-month" required>
                                                           <input type="number" placeholder="YY" name="" class="form-control card-expiry-year" required> </div>
                                                   </div>
                                               </div>
                                               <div class="col-sm-4">
                                                   <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                           <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                       </label> <input type="text" required class="form-control card-cvc"> </div>
                                               </div>
                                           </div>
                                           <div class="card-footer">
                                               <div class="card-footer">
                                                    <button type="submit"  class="subscribe btn btn-primary btn-block shadow-sm" onclick="return setAmount();">
                                                         Confirm Payment
                                                         </button>

                                                   {{--  <button   type="submit" class="btn btn-primary btn-lg pformpress" onclick="return setAmount();">Place
                                                   Order</button> --}}

                                   </div>
                                   </div>
                               </div>

                               </div> <!-- End -->


                               <!-- End -->
                           </div>
                       </div>


       </div>

   </form>
       </div>




   </section>







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

