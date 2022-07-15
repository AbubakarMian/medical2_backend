@extends('user.layout.header_footer')
@section('content')
    <link href="{!! asset('theme/user_theme/css/course_register.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/user_theme/css/newmake.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/user_theme/css/proceedpayment.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v3.8.1/css/all.css">

    <link href="{!! asset('theme/user_theme/css/profile_courses.css') !!}" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="{!! asset('theme/code_busters/theme.css') !!}" /> --}}
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        td, th {
    border: 0px solid #dddddd;
    text-align: left;
    padding: 8px;
}
    </style>


    <div class="bannerarea"></div>


    <div class="courbandarea">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="courbanddata">
                        <h2>Select Your {{ ucwords($courses->full_name) }} Course Group</h2>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">



<!--  -->
@foreach ($courses_groups as $cg)

<div class="regtable">
                        
                        <div class="regtables">
                                <p>
                                {{ ucwords($cg->teacher->name) }} Teacher /  {{ ucwords($cg->name) }} Group
</p>
                                

                            </div><table>
                            <tbody><tr>
                              
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>


                            
                            
                            @foreach ($cg->group_timings as $key => $gt)

                            <tr>
                                <td>{{ ucwords($gt->day) }}</td>
                                <td>{{ date('h:i:s', $gt->start_time) }}</td>
                                <td>{{ date('h:i:s', $gt->end_time) }}</td>
                            </tr>
                            @endforeach
                            
                    


                        </tbody></table>
                        <div class="regtabless">
                        <a href="{{ asset('save_course_register/?course_id=' . $courses->id) }}"
                                style="line-height: 35px;"
                                >

                                <button type="button" class="btn btn-primary regi">Register</button>

                            </a>
                        </div>

                    </div>


  @endforeach
                            <!--  -->
                    

                  
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="courbanddata">
                        <h2>Instructions for Online Course Registration</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                            ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                            tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum
                            iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                            feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                            luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet,
                            cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                            ali.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel
                            illum dolore eu.</p>
                        <h2>Choose the relevant department for the Course Registration</h2>
                        <ul>
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

    <div class="container reviewsback">
        <div class="row">
            <!-- customer reviews list -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-0 raterwe">Ratings &amp; Reviews</h4>
                    </div>
                    <div>
                        <select class="custom-select">
                            <option selected="">Sort on</option>
                            <option value="Most Recent">Most Recent</option>
                            <option value="Relevant">Relevant</option>
                            <option value="Newest">Newest</option>
                        </select>
                    </div>
                </div>
                <div class="all_reviews_div">
                    <!-- reviews -->
                    <div class="mb-4 pb-4 border-bottom">
                        <div class="d-flex mb-3 align-items-center picturearea">
                            <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1"
                                alt="" class="rounded-circle avatar-lg">
                            <div class="ml-2">
                                <h5 class="mb-1">
                                    samirabenmahria <img src="images/verified.svg" alt="">
                                </h5>
                                <p class="font-12 mb-0">
                                    <span>United Arab Emirates</span> <span>July 27, 2021</span>
                                </p>
                            </div>
                        </div>
                        <div class="mb-1">
                            <span class="font-14 mr-2">
                                <span class="fa fa-star yellowstar"></span>
                                <span class="fa fa-star yellowstar"></span>
                                <span class="fa fa-star yellowstar"></span>
                                <span class="fa fa-star yellowstar"></span>

                            </span>
                        </div>
                        <div class="mb-1">
                            <span class="h5">Order FO3C86E4AE43</span>
                        </div>
                        <p class="pictureadata">
                            I have been using their services for the past 2 months and I can highly recommend them. </p>

                    </div>
                    <!-- reviews -->
                    <!-- reviews -->
                    <div class="mb-4 pb-4 border-bottom">
                        <div class="d-flex mb-3 align-items-center picturearea">
                            <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1"
                                alt="" class="rounded-circle avatar-lg">
                            <div class="ml-2">
                                <h5 class="mb-1">
                                    samirabenmahria <img src="images/verified.svg" alt="">
                                </h5>
                                <p class="font-12 mb-0">
                                    <span>United Arab Emirates</span> <span>June 10, 2021</span>
                                </p>
                            </div>
                        </div>
                        <div class="mb-1">
                            <span class="font-14 mr-2">
                                <span class="fa fa-star yellowstar"></span>
                                <span class="fa fa-star yellowstar"></span>
                                <span class="fa fa-star yellowstar"></span>
                                <span class="fa fa-star yellowstar"></span>

                            </span>
                        </div>
                        <div class="mb-1">
                            <span class="h5">Order FO3C86E4AE43</span>
                        </div>
                        <p class="pictureadata">
                            Very professional and the communication is fast! The team understand the needs of the customer.
                            I can highly recommend Hatinco! </p>

                    </div>
                    <!-- reviews -->
                    <!-- reviews -->
                    <div class="mb-4 pb-4 border-bottom">
                        <div class="d-flex mb-3 align-items-center picturearea">
                            <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1"
                                alt="" class="rounded-circle avatar-lg">
                            <div class="ml-2">
                                <h5 class="mb-1">
                                    samirabenmahria <img src="images/verified.svg" alt="">
                                </h5>
                                <p class="font-12 mb-0">
                                    <span>United Arab Emirates</span> <span>June 10, 2021</span>
                                </p>
                            </div>
                        </div>
                        <div class="mb-1">
                            <span class="font-14 mr-2">
                                <span class="fa fa-star yellowstar"></span>
                                <span class="fa fa-star yellowstar"></span>
                                <span class="fa fa-star yellowstar"></span>
                                <span class="fa fa-star yellowstar"></span>

                            </span>
                        </div>
                        <div class="mb-1">
                            <span class="h5">Order FO3C86E4AE43</span>
                        </div>
                        <p class="pictureadata">
                            Very professional and the communication is fast! The team understand the needs of the customer.
                            I can highly recommend Hatinco! </p>

                    </div>
                    <!-- reviews -->
                    <!-- reviews -->

                </div>
                <button id="get_reviews" class="btn btn-primary revikewclick">Read More Reviews</button>
            </div>
        </div>
    </div>









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
