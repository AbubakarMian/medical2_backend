@extends('user.layout.header_footer')
@section('content')
<link href="{!!asset('public/theme/user_theme/css/program.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


{{--  --}}
<link rel="stylesheet" type="text/css" href="http://mycodebusters.com/theme/moodle/theme/mb2nl/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.min.css" />
    <link rel="stylesheet" type="text/css" href="http://mycodebusters.com/theme/moodle/theme/mb2nl/assets/bootstrap/css/glyphicons.min.css" />
    <link rel="stylesheet" type="text/css" href="http://mycodebusters.com/theme/moodle/theme/mb2nl/assets/LineIcons/LineIcons.min.css" />
    <link rel="stylesheet" type="text/css" href="http://mycodebusters.com/theme/moodle/theme/mb2nl/assets/OwlCarousel/assets/owl.carousel.min.css" />

    <link rel="stylesheet" type="text/css" href="http://mycodebusters.com/theme/moodle/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple-min.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

{{--  --}}



<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">    	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://mycodebusters.com/theme/moodle/theme/styles.php/mb2nl/1632919575_1/all" />



<section>
    <div class="body-content">


        <div class="course-details" style="margin-top:25px;" id="yui_3_17_2_1_1655389310494_40">
            <div class="container-fluid" id="yui_3_17_2_1_1655389310494_39">
                <div class="row" id="yui_3_17_2_1_1655389310494_38">
                    <div class="col-md-9 enrol-contentcol" id="yui_3_17_2_1_1655389310494_37">
                       <div class="details-section aboutcourse" id="yui_3_17_2_1_1635536024159_37">
                            <h2 class="details-heading hsize-2" id="yui_3_17_2_1_1655389310494_36">About the course</h2>
                                <div class="details-content toggle-content">
                                    <div class="content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
    Nulla non arcu lacinia neque faucibus fringilla. Vivamus porttitor turpis ac leo.
    Integer in sapien. Nullam eget nisl. Aliquam erat volutpat. Cras elementum. Mauris suscipit,
    ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus.
    Integer malesuada. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna.
    Mauris elementum mauris vitae tortor. Aliquam erat volutpat.</div>
                                        <span class="toggle-content-button" data-moretext="Show more..." data-lesstext="Show less...">Show more...</span>
                            </div>
                        </div><div class="details-section reviews" style="margin-top: 25px;">
                    <h2 class="details-heading hsize-2">Reviews</h2>
                    <div class="mb2reviews-review-list">


                        <!-- First review -->
                        <div class="mb2reviews-review-item item-46">
                         <div class="mb2reviews-review-item-inner">
                            <div class="mb2reviews-review-userpicture">
                              <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1" class="userpicture defaultuserpic" width="100" height="100" alt="Picture of Jayden Jones" title="Picture of Jayden Jones"></div>
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
                              </div></div>


                               <span class="mb2reviews-username">Jayden J.</span>
                               <span class="mb2reviews-date">22 Mar 2021</span>
                               </div><div class="mb2reviews-review-content">
                               Mihi enim erit isdem istis fortasse iam utendum. Dat enim intervalla et relaxat.
                               Hoc est non dividere, sed frangere. Obsecro, inquit, Torquate, haec dicit Epicurus.
                               </div>
                               <div class="mb2reviews-review-footer">
                               <div class="mb2reviews-review-thumbs">
                               <span class="mb2reviews-review-thumbtext text1">Was this review helpful?</span>
                               <span class="mb2reviews-review-thumbtext text2">Thank you for your feedback</span>

                               <!--Second review -->
                               <span class="mb2reviews-review-thumb" data-review="46" data-thumb="yes">
                               <i class="glyphicon glyphicon-thumbs-up"></i></span>
                               <span class="mb2reviews-review-thumb" data-review="46" data-thumb="no">
                               <i class="glyphicon glyphicon-thumbs-down"></i></span></div></div></div>
                               </div></div>


                               <div class="mb2reviews-review-item item-45">
                               <div class="mb2reviews-review-item-inner">
                               <div class="mb2reviews-review-userpicture">
                               <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1" class="userpicture defaultuserpic" width="100" height="100" alt="Picture of Luca Fischer" title="Picture of Luca Fischer"></div>
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
                               </div></div><span class="mb2reviews-username">Luca F.</span>
                               <span class="mb2reviews-date">22 Mar 2021</span></div>
                               <div class="mb2reviews-review-content">
                               Istam voluptatem perpetuam quis potest praestare sapienti. Itaque contra est, ac dicitis.
                               Mihi enim erit isdem istis fortasse iam utendum. Dat enim intervalla et relaxat.</div>
                               <div class="mb2reviews-review-footer">
                               <div class="mb2reviews-review-thumbs">
                               <span class="mb2reviews-review-thumbtext text1">Was this review helpful?</span>
                               <span class="mb2reviews-review-thumbtext text2">Thank you for your feedback</span>


                               <!--Third review -->
                               <span class="mb2reviews-review-thumb" data-review="45" data-thumb="yes">
                               <i class="glyphicon glyphicon-thumbs-up"></i></span>

                               <span class="mb2reviews-review-thumb" data-review="45" data-thumb="no">
                               <i class="glyphicon glyphicon-thumbs-down"></i></span></div></div></div></div></div>
                               <div class="mb2reviews-review-item item-44"><div class="mb2reviews-review-item-inner">
                               <div class="mb2reviews-review-userpicture">
                               <img src="https://mb2themes.com/themes/new-learning5/theme/image.php/mb2nl/core/1634974112/u/f1" class="userpicture defaultuserpic" width="100" height="100" alt="Picture of Jayden Brown" title="Picture of Jayden Brown"></div>
                               <div class="mb2reviews-review-details"><div class="mb2reviews-review-header">
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
                               </div></div>
                               <span class="mb2reviews-username">Jayden B.</span><span class="mb2reviews-date">22 Mar 2021</span></div>
                               <div class="mb2reviews-review-content">
                               Dat enim intervalla et relaxat. Hoc est non dividere, sed frangere. Obsecro, inquit,
                               Torquate, haec dicit Epicurus.</div>
                               <div class="mb2reviews-review-footer">
                               <div class="mb2reviews-review-thumbs">
                               <span class="mb2reviews-review-thumbtext text1">Was this review helpful?</span>
                               <span class="mb2reviews-review-thumbtext text2">Thank you for your feedback</span>


                               <span class="mb2reviews-review-thumb" data-review="44" data-thumb="yes">
                               <i class="glyphicon glyphicon-thumbs-up"></i></span>
                               <span class="mb2reviews-review-thumb" data-review="44" data-thumb="no" style="margin-bottom: 45px;">
                               <i class="glyphicon glyphicon-thumbs-down"></i></span></div></div></div></div></div></div>
                               <div class="mb2reviews-more-wrap"></div>

                    </div>


                    </div><div class="col-md-3 enrol-sidebar">
                        <div class="fake-block block-enrol">

                        </div>

                        <div class="fake-block block-custom-fields">
                            <ul class="course-custom-fileds">
                            <li class="fieldname-length"><span class="name">Length:</span><span class="value">4 Weeks</span></li>
                            <li class="fieldname-certificate"><span class="name">Certificate:</span><span class="value">Yes</span></li>
                            <li class="fieldname-level"><span class="name">Level:</span><span class="value">Beginner</span></li>
                            <li class="fieldname-language"><span class="name">Language:</span><span class="value">English</span></li>
                            </ul>
                        </div>


                        <div class="fake-block block-shares">

                        </div>
                       </div>
                </div>
            </div>
    </div>


    </div>

 @endsection

