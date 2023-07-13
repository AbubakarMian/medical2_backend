<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medical 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{!! asset('theme/user_theme/css/medical2.css') !!}" rel="stylesheet">
    <!-- cropeer css open-->
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />

</head>
<style>
    .new_account {

        float: left;
        color: #292974;
        font-weight: 500;
        margin-top: 3px
    }

    .error {
        color: red;


    }
</style>

<body>
    <?php
    
    use App\User;
    use Illuminate\Support\Facades\Auth;
    ?>

    <section>
        <div class="container-fluid">
            <div class="row headrow">
                <div class="col-sm-2 col-xs-6">
                    <div class="logoArea">

                        <a href="#"><img src="{!! asset('theme/user_theme/images/logo-icon.png') !!}" class="img-responsive" /></a>
                    </div>
                </div>
                <div class="col-sm-10 col-xs-12">
                    <div class="infoarea hidden-xs">
                        <div class="infobox">
                            <div class="infoboximg">
                                {{-- <img src="{!!asset('theme/user_theme/images/fax.png')!!}" class="img-responsive" /> --}}
                                <i class="fa fa-fax" aria-hidden="true"></i>
                            </div>
                            <div class="infoboxdata">
                                <h4>1-407-233-1192</h4>
                            </div>
                        </div>
                        <div class="infobox">
                            <div class="infoboximg">
                                {{-- <img src="{!!asset('theme/user_theme/images/mail.png')!!}" class="img-responsive" /> --}}
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="infoboxdata">
                                <h4>help@medical2.com</h4>
                            </div>
                        </div>

                        <div class="infobox">
                            <div class="infoboximg"></div>
                            <div class="infoboxdata">
                                <!-- {{-- <a href="registrationform.html" --}} -->
                                <?php
                                $all_user = Auth::User();
                                // dd($all_user);
                                if ($all_user) {
                                    $all_user = $all_user;
                                }
                                
                                //    dd($all_user);
                                
                                ?>


                                @if ($all_user)
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle drup loicons" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-user-circle asic" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu dfg" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{!! asset('profile_courses') !!}"><i
                                                    class="fa fa-book" aria-hidden="true"></i> Courses</a><br>

                                            <a class="dropdown-item" href="{!! asset('profile_acount') !!}"><i class="fa fa-cog"
                                                    aria-hidden="true"></i> Acount</a><br>
                                            <a class="dropdown-item" href="{!! asset('course_payemts') !!}"><i class="fa fa-cog"
                                                    aria-hidden="true"></i> Course Payments</a><br>
                                            <!--  -->
                                            <a class="dropdown-item" href="{!! asset('exams') !!}"><i class="fa fa-cog"
                                                    aria-hidden="true"></i> Exams</a>


                                        </div>
                                    </div>

                                    <!--  -->


                                    {{-- <a href="" type="button" class="btn btn-primary logclick" style="border-radius"> --}}
                                    {{-- <div class="tupclio">

                                    {{ucwords($all_user->name)}}
                            </div> --}}

                                    <!-- <i class="fa fa-user-circle asic" aria-hidden="true"></i> -->

                                    {{-- <ul>
                                <li class="nav-item dropdown no-arrow fgfh">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                        <img class="img-profile rounded-circle"
                                            src="img/undraw_profile.svg">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Settings
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Activity Log
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                            </ul> --}}






                                    <!--  -->
                                @else
                                    <div class="dropdown">

                                    </div>
                                @endif

                                @if ($all_user)
                                    <div></div>
                                @else
                                    <a href="{!! asset('registration') !!}"><button type="button"
                                            class="btn btn-primary logclick">
                                            Registration
                                        </button></a>
                                @endif
                                @if ($all_user)
                                    <a href="{{ asset('user_logout') }}" type="button"
                                        class="btn btn-primary logclick">
                                        LOGOUT</a>
                                @else
                                    <button type="button" class="btn btn-primary logclick" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Login
                                    </button>
                                @endif


                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">



                                            <div class="modal-header loginheader" style="margin-top: 22px">
                                                <h3>LOGIN</h3>

                                            </div>

                                            <div class="modal-body loginformarea">
                                                {{-- <form>  --}}
                                                @if ($message = Session::get('login_error'))
                                                    <div class="alert alert-danger alert-block">
                                                        <button type="button" class="close"
                                                            data-dismiss="alert">×</button>
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @endif
                                                <form role="form" method="post"
                                                    action="{{ action('App\Http\Controllers\User\UserController@user_login') }}">
                                                    {!! csrf_field() !!}
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" name="email" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="Enter email" required />
                                                        <small id="emailHelp" class="form-text text-muted"> We ll
                                                            never
                                                            share your email with anyone
                                                            else.</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Password</label>
                                                        <input type="password" name="password" class="form-control"
                                                            id="exampleInputPassword1" placeholder="Password"
                                                            required />
                                                    </div>
                                                    {{-- <div class="form-group form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                                        <label class="form-check-label saveu" for="exampleCheck1" style="margin-left: 20px
                                                        ;">Save User</label>
                                                        <a href="#"><span class="forspan">Forget Password</span></a>
                                                    </div>  --}}
                                                    <button type="submit" class="btn btn-primary logclic">
                                                        Login
                                                    </button>
                                                    <br>
                                                    <div class="new_acount">
                                                        <a href="registration"><span class="new_account">Don't have an
                                                                account ?</span></a>
                                                    </div>
                                                </form>
                                                <div class="form-group form-check">
                                                    {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                                    <label class="form-check-label saveu" for="exampleCheck1" style="margin-left: 20px
                                                    ;">Save User</label>  --}}
                                                    <a href="#"><span class="forspan">Forget Password</span></a>
                                                    {{-- <button type="submit" class="btn btn-primary forspan">
                                                        Login
                                                    </button>  --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mobileNav">
                        <div class="col-xs-4 visible-xs xs-marker"></div>
                        <div class="col-xs-4 visible-xs xs-phone"></div>
                        <div class="col-xs-4 visible-xs">
                            <button data-target=".navbar-collapse" data-toggle="collapse" id="mnav-button"
                                class="navbar-toggle fa fa-bars fa-2x collapsed threebarclick" type="button">
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <nav>
                        <?php
                        $courses = 'courses';
                        $workshop = 'workshop';
                        
                        ?>
                        <div class="jump">
                            <div class="navbar-collapse nav-collapse collapse">
                                <ul class="nav navbar-nav menuu" style="flex-direction: inherit;">
                                    <li id="01">
                                        <a href="{!! asset('/') !!}"><span>Home</span> </a>
                                    </li>
                                    <li id="02">
                                        <a href="{!! asset('about_us') !!}"><span>About Us</span> </a>
                                    </li>
                                    <li id="03">
                                        <a href="{!! asset('category') !!}"><span>Category</span> </a>
                                    </li>
                                    <li id="03">
                                        <a href="{!! asset('courses') . '?type=courses' !!}"><span>Courses</span> </a>
                                    </li>
                                    <li id="03">
                                        <a href="{!! asset('courses') . '?type=workshop' !!}"><span>Workshop</span> </a>
                                    </li>
                                    {{-- <li id="04">
                    <a href="#"><span>Register</span> </a>
                  </li> --}}
                                    {{-- <li id="05">
                                        <a href="#"><span>Certificates</span> </a>
                                    </li> --}}
                                    <li id="04">
                                        <a href="{!! asset('contactus') !!}"><span>Contact Us</span> </a>
                                    </li>
                                    {{-- <li id="06">
                                        <a href="#"><span>Clients</span> </a>
                                    </li> --}}
                                    {{-- <li id="07">
                                        <a href="#"><span>College Courses</span> </a>
                                    </li> --}}

                                    <!-- <li id="09">
                            <button type="button" class="btn btn-primary logclick">
                              Login
                            </button>
                          </li> -->
                                    {{-- <li id="10">
                    <select
                      class="form-control logclickk"
                      id="exampleFormControlSelect1"
                    >
                      <option>EN</option>
                    </select>
                  </li> --}}
                                    <li id="45">
                                        <div class="infobox visible-xs">
                                            <div class="infoboximg"></div>
                                            <div class="infoboxdata">
                                                <a href="registrationform.html"><button type="button"
                                                        class="btn btn-primary logclick">
                                                        Registration
                                                    </button></a>

                                                <button type="button" class="btn btn-primary logclick"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    Login
                                                </button>

                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header loginheader">
                                                                <h3>LOGIN</h3>
                                                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button> -->
                                                            </div>
                                                            <div class="modal-body loginformarea">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Email
                                                                            address</label>
                                                                        <input type="email" class="form-control"
                                                                            id="exampleInputEmail1"
                                                                            aria-describedby="emailHelp"
                                                                            placeholder="Enter email" />
                                                                        <small id="emailHelp"
                                                                            class="form-text text-muted">We'll never
                                                                            share your email with anyone
                                                                            else.</small>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="exampleInputPassword1">Password</label>
                                                                        <input type="password" class="form-control"
                                                                            id="exampleInputPassword1"
                                                                            placeholder="Password" />
                                                                    </div>
                                                                    <div class="form-group form-check">
                                                                        <input type="checkbox"
                                                                            class="form-check-input"
                                                                            id="exampleCheck1" />
                                                                        <label class="form-check-label saveu"
                                                                            for="exampleCheck1">Save User</label>
                                                                        <a href="#"><span class="forspan">Forget
                                                                                Password</span></a>
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="btn btn-primary logclic">
                                                                        Login
                                                                    </button>



                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="body-content">
        @yield('content')
    </div>

    <section class="footer-area">
        <div class="aboutarea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="aboutareadata">
                            <h2>About Us</h2>
                            <p>
                                Medical2 Career College is a division of Medical2 Inc. And the
                                sister company of Medical2 National Certification Agency. We are
                                providing healthcare career courses and for our future degree
                                programs under "Medical2 Career College" Licensed by the State of
                                Mississippi Commission on Proprietary School and College
                                Registration, License No.C-675.
                            </p>
                            <button type="button" class="btn btn-primary abolern">
                                Learn More
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="aboutareaimg">
                            <img src="{!! asset('theme/user_theme/images/about.png') !!}" class="img-responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="footerarea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="footerdataa">
                            <h4>Quick Links</h4>
                            <h3></h3>
                            <ul>
                                <li>Home</li>
                                <li>About Us!</li>
                                <li class="acols"><a href="{!! asset('program') !!}">Program</a></li>

                                <li>Register</li>
                                <li>Certificates</li>
                                <li>College Cources</li>
                                <li>News</li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footerdataa">
                            <h4>Useful Links</h4>
                            <h3></h3>
                            <ul>
                                <li>Client</li>
                                <li>Gallery</li>
                                <li>Login</li>
                                <li>Site Map</li>
                                <li>Donate</li>
                                <li>FAQ</li>
                                <li>Jobs</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footerdataa">
                            <h4>Contact Us</h4>
                            <h3></h3>
                            <p>
                                Medical2 Career College 1830A North Gloster St Tupelo, MS 38804
                            </p>
                            <p><strong>Phone:</strong> 877-741-1996</p>
                            <p><strong>Fax:</strong> 1-407-233-1192</p>
                            <p><strong>Email:</strong> help@medical2.com</p>
                            <img src="{!! asset('theme/user_theme/images/bbb.png') !!}" class="img-responsive signbar" />
                        </div>
                    </div>
                    <div class="col-sm-3 hidden-xs">
                        <div class="footerdataa">
                            <img src="{!! asset('theme/user_theme/images/footerlogo.png') !!}" class="img-responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="lastfooterarea">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="lastfooterdata">
                            <p>
                                Copyright 2022 : by Medical2.com Website Designed and Developed by, <a
                                    href="https://hatinco.com/">HAT INC</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- cropper js  open -->

<!-- build:js({.tmp,app}) scripts/app.min.js -->

<!-- endbuild -->
<script src="{{ asset('theme/vendor/parsleyjs/dist/parsley.min.js') }}"></script>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<!-- build:js({.tmp,app}) scripts/app.min.js -->

<!-- cropper js close -->
<!-- @section('app_jquery') -->
    @yield('app_jquery')

    @if ($message = Session::get('login_error'))
        <script>
            $('#exampleModal').modal('show');
        </script>
    @endif

    </html>
