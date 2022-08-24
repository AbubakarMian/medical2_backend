@extends('user.layout.header_footer')
@section('content')

<section>
        <div class="sliderbannerarea">
            <div class="sliderplace">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active topslideball"></li>
                        <li data-target="#myCarousel" data-slide-to="1" class="topslideball"></li>
                        <li data-target="#myCarousel" data-slide-to="2" class="topslideball"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="bannerarea">
                                <div class="container-fluid">
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
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="bannerarea">
                                <div class="container-fluid">
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
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="bannerarea">
                                <div class="container-fluid">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="left carousel-control slideshade" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left slidearow"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control slideshade" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right slidearow"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="colorboxarea">
            <div class="container">
                <div class="row">
                @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                    <div class="col-sm-3">
                        <div class="colorbox bgreen">
                            <img src="{!!asset('theme/user_theme/images/workshop.png')!!}" class="img-responsive" />
                            <h3>Workshop & Schedule</h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="colorbox bred">
                            <img src="{!!asset('theme/user_theme/images/private.png')!!}" class="img-responsive" />
                            <h3>Private & Groups</h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="colorbox bblue">
                            <img src="{!!asset('theme/user_theme/images/ceu.png')!!}" class="img-responsive" />
                            <h3>CEUs & Online Courses</h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="colorbox byellow">
                            <img src="{!!asset('theme/user_theme/images/certification.png')!!}" class="img-responsive" />
                            <h3>Certificatoin Exams</h3>
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
                    <div class="col-sm-6">
                        <div class="collageareadata">
                            <h2>College Courses</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text
                                ever since the 1500s, when an unknown printer took a galley of
                                type and scrambled it to make a type specimen book.
                            </p>
                            <button type="button" class="btn btn-primary abolernn">
                                Learn More
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="coursebox">
                            <div class="courseboximg">
                                <img src="{!!asset('theme/user_theme/images/healthcarecareercourses.png')!!}" class="img-responsive" />
                            </div>
                            <div class="courseboxdata">
                                <h4>Healthcare Career Courses</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,</p>
                                <a href="#">Learn more ></a>
                            </div>
                        </div>
                        <div class="coursebox">
                            <div class="courseboximg">
                                <img src="{!!asset('theme/user_theme/images/collegelocations.png')!!}" class="img-responsive" />
                            </div>
                            <div class="courseboxdata">
                                <h4>College Locations</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,</p>
                                <a href="#">Learn more ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="coursebox">
                            <div class="courseboximg">
                                <img src="{!!asset('theme/user_theme/images/collegeapplication.png')!!}" class="img-responsive" />
                            </div>
                            <div class="courseboxdata">
                                <h4>College Application</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,</p>
                                <a href="#">Learn more ></a>
                            </div>
                        </div>
                        <div class="coursebox">
                            <div class="courseboximg">
                                <img src="{!!asset('theme/user_theme/images/collegecatalog.png')!!}" class="img-responsive" />
                            </div>
                            <div class="courseboxdata">
                                <h4>College Catalog</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,</p>
                                <a href="#">Learn more ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
