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

    td,
    th {
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
                    <!--  -->



                    <div class="regtabless">
                        <!-- <a href="http://localhost/medical2_backend/public/save_course_register/?course_id=1" style="line-height: 35px;"> -->


                        <button type="button" class="btn btn-primary regi" onclick="add_members()">Add Group Members</button>
                        <!-- <button type="button" class="btn btn-primary regi" onclick="add_members()">Register</button> -->





                    </div>




                    <!--  -->

                </div>
            </div>
        </div>
        <div class="row">
        </div>




        <!-- <div class="add_members_register_form" style="margin-top:20px"> -->
        <div class="col-sm-12">
            <form role="form" method="post" action="{{action('User\CoursesController@group_registration_save')}}">
                {!! csrf_field() !!}
                <input hidden name="course_id" value="{{course_id}}">
                <input hidden name="group_id" value="{{group_id}}">
                <div class="add_members_register_form" style="margin-top:20px">
                </div>

                <button type="submit" class="btn btn-primary regi show_register" style="margin-top:20px; display:none">Register</button>

            </form>


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
                        <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1" alt="" class="rounded-circle avatar-lg">
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
                        <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1" alt="" class="rounded-circle avatar-lg">
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
                        <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1" alt="" class="rounded-circle avatar-lg">
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




<script>
    function add_members() {


        console.log('hrlooooooooooooooo');
        var div_add_members_register_form_area = $('.div_add_members_register_form_area').length;
        if(div_add_members_register_form_area == 0){
          var  show_register = $('.show_register').css('display','block');
            
        }
        $add_members_register_form = $('.add_members_register_form').append(add_members_register_form_area(div_add_members_register_form_area));


    }

    function add_members_register_form_area(v) {
        return (
            `
<div class="div_add_members_register_form_area">
 <h3>
 Registration Form
 </h3>
 <button type="button" class="btn btn-danger" onclick="remove_form_area(this)" style="margin-bottom:10px">Remove Group Members</button>
 
    

                <div class="row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="First name" name="first_name[]"  required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Last name" name="last_name[]" ,required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Address" name="address[]"  required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="City" name="city[]"  required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Zip code" name="zip_code[]">
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control" id="four" name="state[]"  required>
                      <option>Select State</option>
                      <option>Alabama</option>
                      <option>Florida</option>
                      <option>Georgia</option>
                      <option>Idaho</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Contact" name="contact[]" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="E-mail" name="email[]"  required>
                  </div>
                </div>

           
              </div>



 `
        )


    }

    function remove_form_area(e) {
        var div_add_members_register_form_area = $('.div_add_members_register_form_area').length;
        if (div_add_members_register_form_area == 1) {
            return;

        }
        $(e).parent().remove();

    }
</script>
@endsection