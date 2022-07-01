@extends('user.layout.header_footer')
@section('content')
    <link href="{!! asset('theme/user_theme/css/course_register.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/user_theme/css/newmake.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/user_theme/css/proceedpayment.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v3.8.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{!! asset('theme/code_busters/theme.css') !!}" />

    <section>
        <div class="sliderbannerarea">
            <div class="sliderplace">
                <div>


                    <div>

                        <div class="bannerarea">
                            {{-- <div class="container-fluid">
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
                                </div> --}}
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
                        {{-- <button  onclick="openpaymentdiv()"   class="btn btn-primary logclick"
                style="width: fit-content;color: #fff;
                background-color: #e63946;
                border-color: #e63946;">
             Register

                </button> --}}


                        <div class="collageareadata">


                            {{-- <section class="login-section">
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
                            @endif --}}
                            <h2>Instructions for Online Course Registration</h2>
                            <p style="line-height: 29px;">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam
                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in
                                hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                facilisis
                                at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit
                                augue duis dolore te feugait nulla facilisi.
                                Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna ali
                            </p>
                            <a href="{{ asset('save_course_register/?course_id=' . $courses->id) }}">
                                <button type="button" class="btn btn-primary "
                                    style="width: fit-content;   background-color: #e63946;">
                                    Register
                                </button>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{--  --}}


    <section>
        <div class="collagearea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="collageareadata">
                            <h2>Choose the relevant department for the Course Registration</h2>

                            <ul
                                style="line-height: 30px;
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

                            <div class="details-section reviews" style="margin-top: 25px;">
                                <h2 class="details-heading hsize-2">Reviews</h2>
                                <div class="mb2reviews-review-list">


                                    <!-- First review -->
                                    <div class="mb2reviews-review-item item-46">
                                        <div class="mb2reviews-review-item-inner">
                                            <div class="mb2reviews-review-userpicture">
                                                <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1"
                                                    class="userpicture defaultuserpic" width="100" height="100"
                                                    alt="Picture of Jayden Jones" title="Picture of Jayden Jones">
                                            </div>
                                            <div class="mb2reviews-review-details">
                                                <div class="mb2reviews-review-header">
                                                    <div class="mb2reviews-stars">
                                                        <div class="stars-empty">
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                        </div>

                                                        <div class="stars-full" style="width:98;">
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                        </div>
                                                    </div>


                                                    <span class="mb2reviews-username">Jayden J.</span>
                                                    <span class="mb2reviews-date">22 Mar 2021</span>
                                                </div>
                                                <div class="mb2reviews-review-content">
                                                    Mihi enim erit isdem istis fortasse iam utendum. Dat enim intervalla et
                                                    relaxat.
                                                    Hoc est non dividere, sed frangere. Obsecro, inquit, Torquate, haec
                                                    dicit Epicurus.
                                                </div>
                                                <div class="mb2reviews-review-footer">
                                                    <div class="mb2reviews-review-thumbs">
                                                        <span class="mb2reviews-review-thumbtext text1">Was this review
                                                            helpful?</span>
                                                        <span class="mb2reviews-review-thumbtext text2">Thank you for your
                                                            feedback</span>

                                                        <!--Second review -->
                                                        <span class="mb2reviews-review-thumb" data-review="46"
                                                            data-thumb="yes">
                                                            <i class="glyphicon glyphicon-thumbs-up"></i></span>
                                                        <span class="mb2reviews-review-thumb" data-review="46"
                                                            data-thumb="no">
                                                            <i class="glyphicon glyphicon-thumbs-down"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb2reviews-review-item item-45">
                                        <div class="mb2reviews-review-item-inner">
                                            <div class="mb2reviews-review-userpicture">
                                                <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1"
                                                    class="userpicture defaultuserpic" width="100" height="100"
                                                    alt="Picture of Luca Fischer" title="Picture of Luca Fischer">
                                            </div>
                                            <div class="mb2reviews-review-details">
                                                <div class="mb2reviews-review-header">
                                                    <div class="mb2reviews-stars">
                                                        <div class="stars-empty">
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                        </div>

                                                        <div class="stars-full" style="width:94%;">
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                        </div>
                                                    </div><span class="mb2reviews-username">Luca F.</span>
                                                    <span class="mb2reviews-date">22 Mar 2021</span>
                                                </div>
                                                <div class="mb2reviews-review-content">
                                                    Istam voluptatem perpetuam quis potest praestare sapienti. Itaque contra
                                                    est, ac dicitis.
                                                    Mihi enim erit isdem istis fortasse iam utendum. Dat enim intervalla et
                                                    relaxat.</div>
                                                <div class="mb2reviews-review-footer">
                                                    <div class="mb2reviews-review-thumbs">
                                                        <span class="mb2reviews-review-thumbtext text1">Was this review
                                                            helpful?</span>
                                                        <span class="mb2reviews-review-thumbtext text2">Thank you for your
                                                            feedback</span>


                                                        <!--Third review -->
                                                        <span class="mb2reviews-review-thumb" data-review="45"
                                                            data-thumb="yes">
                                                            <i class="glyphicon glyphicon-thumbs-up"></i></span>

                                                        <span class="mb2reviews-review-thumb" data-review="45"
                                                            data-thumb="no">
                                                            <i class="glyphicon glyphicon-thumbs-down"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb2reviews-review-item item-44">
                                        <div class="mb2reviews-review-item-inner">
                                            <div class="mb2reviews-review-userpicture">
                                                <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1"
                                                    class="userpicture defaultuserpic" width="100" height="100"
                                                    alt="Picture of Jayden Brown" title="Picture of Jayden Brown">
                                            </div>
                                            <div class="mb2reviews-review-details">
                                                <div class="mb2reviews-review-header">
                                                    <div class="mb2reviews-stars">
                                                        <div class="stars-empty">
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                        </div>

                                                        <div class="stars-full" style="width:81%;">
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                        </div>
                                                    </div>
                                                    <span class="mb2reviews-username">Jayden B.</span><span
                                                        class="mb2reviews-date">22 Mar 2021</span>
                                                </div>
                                                <div class="mb2reviews-review-content">
                                                    Dat enim intervalla et relaxat. Hoc est non dividere, sed frangere.
                                                    Obsecro, inquit,
                                                    Torquate, haec dicit Epicurus.</div>
                                                <div class="mb2reviews-review-footer">
                                                    <div class="mb2reviews-review-thumbs">
                                                        <span class="mb2reviews-review-thumbtext text1">Was this review
                                                            helpful?</span>
                                                        <span class="mb2reviews-review-thumbtext text2">Thank you for your
                                                            feedback</span>


                                                        <span class="mb2reviews-review-thumb" data-review="44"
                                                            data-thumb="yes">
                                                            <i class="glyphicon glyphicon-thumbs-up"></i></span>
                                                        <span class="mb2reviews-review-thumb" data-review="44"
                                                            data-thumb="no" style="margin-bottom: 45px;">
                                                            <i class="glyphicon glyphicon-thumbs-down"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb2reviews-more-wrap"></div>

                            </div>







                        </div>

                    </div>





    </section>







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
