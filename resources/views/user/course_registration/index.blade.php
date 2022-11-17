@extends('user.layout.header_footer')
@section('content')
<link href="{!! asset('theme/user_theme/css/course_register.css') !!}" rel="stylesheet">
<link href="{!! asset('theme/user_theme/css/groupform.css') !!}" rel="stylesheet">
<link href="{!! asset('theme/user_theme/css/newmake.css') !!}" rel="stylesheet">
<link href="{!! asset('theme/user_theme/css/proceedpayment.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v3.8.1/css/all.css">

<link href="{!! asset('theme/user_theme/css/profile_courses.css') !!}" rel="stylesheet">
{{-- <link rel="stylesheet" type="text/css" href="{!! asset('theme/code_busters/theme.css') !!}" /> --}}
<?php

use Carbon\Carbon;
use App\Model\Student_fees;

?>
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
                    <?php
                    $course_g = $courses_groups->count();

                    ?>
                    @if($course_g == 0)

                    <h2 class="alert alert-danger text-center" style="color: black;
                    padding: 8px;
                    font-size: 21px;">Course Registration Timings Will Be Available Soon</h2>
                    @else
                    <?php
                    //  dd($type )

                    ?>
                    @if($type == 'courses')

                    <h2>Select Your {{ ucwords($courses->full_name) }} Course Group</h2>
                    @elseif($type == 'workshop')
                    <h2>Select Your {{ ucwords($courses->full_name) }} Course Workshop</h2>
                    @endif



                    <!--  -->

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">



                <?php
// dd($courses_groups[1]);
                ?>
                @foreach ($courses_groups as $cg)
                <?php
                // dd($cg)

                ?>


                <div class="regtable">

                    <div class="regtablesh">
                        <div class="row">

                            <div class="col-sm-2 dates">
                                <p>Venue
                                    @if ($cg->is_online == 0)
                                    : {{ $cg->city }}
                                    @endif
                                    </br>
                                    <?php
                                    ?>
                                    @if ($cg->is_online != 0)
                                    <?php
                                    ?>
                                    Online Class
                                    @elseif($cg->lat != 0)
                                    <i class="fa fa-map-marker" aria-hidden="true" class="mkmap" onclick="open_map('{!! $cg->lat !!}','{!! $cg->long !!}')" style="cursor: pointer"> click me</i>
                                    {{-- <button type="button" class="btn btn-warning" onclick="open_map('{!! $cg->lat !!}','{!! $cg->long !!}')">Map Location</button> --}}
                                    @else
                                    No Location
                                </p>
                                @endif
                            </div>

                            <div class="col-sm-7 teacherR">
                                {{ ucwords($cg->teacher->name) }} Teacher / {{ ucwords($cg->name) }}
                                @if ($cg->type == 'course')
                                Group
                                @elseif($cg->type == 'workshop')
                                Workshop
                                @endif
                            </div>

                            <div class="col-sm-2 date">
                                From {{ date('d,M,Y', $cg->start_date) }} To
                                {{ date('d,M,Y', $cg->end_date) }}
                            </div>

                        </div>




                    </div>
                    @if($cg->type == 'course')

                    <!-- for course -->

                    <table>
                        <tbody>
                            <tr>

                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                           
                            @foreach ($cg->group_timings as $key => $gt)
                           
        
                           

                            <tr>
                                <td>{{ ucwords($gt->day) }}</td>
                               
                                <td>
                                    {{ date('h:i:s', $gt->start_time) }}
                                </td>
                                <td>
                                    {{ date('h:i:s', $gt->end_time) }}
                                </td>

                              


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--for workshop not course  -->

                    @elseif( $cg->type == 'workshop')
                    <table>
                        <tbody>
                            <tr>


                                <th>Start Time</th>
                                <th></th>
                                <th></th>
                                <th>End Time</th>
                            </tr>


                            <tr>

                                <td>{{

                                    date('h:i:s', $cg->start_date)
                                
                                }}
                                </td>

                                <td>
                                </td>
                                <td>
                                </td>


                                <td>
                                    {{
                                    date('h:i:s', $cg->end_date)
                                }}

                                </td>
                            </tr>

                        </tbody>
                    </table>
                    @endif
                    <!-- @if ($cg->is_online != 0)

                    <div class="regtabless">
                    <iframe src="{{$cg->url}}" title="description"></iframe>
                    </div>
                    @endif -->

                    <div class="regtabless">
                        <!-- <a href="http://localhost/medical2_backend/public/save_course_register/?course_id=1" style="line-height: 35px;"> -->
                        <a href="{!! asset('save_course_register/?course_id='.$cg->courses_id.'&group_id='.$cg->id) !!}">

                            <button type="button" class="btn btn-primary regii">Single Registeration</button>

                        </a>
                    </div>
                    <div class="regtabless">
                        <!-- <a href="http://localhost/medical2_backend/public/save_course_register/?course_id=1" style="line-height: 35px;"> -->
                        <a href="{!! asset('group_registration/?course_id='.$cg->courses_id.'&group_id='.$cg->id) !!}">

                            <button type="button" class="btn btn-primary regii">Group Registeration</button>

                        </a>
                    </div>

                </div>










                @endforeach
                @endif
                <!--  -->




            </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Venue Location</h4>
                    </div>
                    <div class="modal-body" id="map" style="height:600px">
                        @include('user.course_registration.map')
                    </div>


                </div>

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
    $(document).ready(function() {
        $('#myModal').modal('hide');


    });
    // map
    function open_map(lat, long) {
        create_marker(lat, long);
        $('#myModal').modal('show');
    }
</script>
@endsection