<!DOCTYPE html>
<html lang="en">

<head>
  <title>Medical 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="{!!asset('theme/user_theme/css/medical2.css')!!}" rel="stylesheet">
  <link href="{!!asset('theme/user_theme/css/registrationform.css')!!}" rel="stylesheet">

</head>

<body>

  <section>
    <div class="container-fluid">
      <div class="row headrow">
        <div class="col-sm-2 col-xs-6">
          <div class="logoArea">
            <a href="#"><img src="{!!asset('theme/user_theme/images/logo.png')!!}" class="img-responsive" /></a>
          </div>
        </div>
        <div class="col-sm-10 col-xs-6">
          <div class="infoarea hidden-xs">
            <div class="infobox">
              <div class="infoboximg">
                <img src="{!!asset('theme/user_theme/images/fax.png')!!}" class="img-responsive" />
              </div>
              <div class="infoboxdata">
                <h4>1-407-233-1192</h4>
                {{-- <p>Fax Number</p> --}}
              </div>
            </div>
            <div class="infobox">
              <div class="infoboximg">
                <img src="{!!asset('theme/user_theme/images/mail.png')!!}" class="img-responsive" />
              </div>
              <div class="infoboxdata">
                <h4>help@medical2.com</h4>
                {{-- <p>Email Address</p> --}}
              </div>
            </div>

            <div class="infobox">
              <div class="infoboximg"></div>
              <div class="infoboxdata visible-xs hidden-xs">
                <a href="#"><button type="button" class="btn btn-primary logclick">
                    Registration
                  </button></a>

                <button type="button" class="btn btn-primary logclick" data-toggle="modal" data-target="#exampleModal">
                  Login
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                            <small id="emailHelp" class="form-text text-muted">We ll never share your email with anyone
                              else.</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                          </div>
                          <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                            <label class="form-check-label saveu" for="exampleCheck1">Save User</label>
                            <a href="#"><span class="forspan">Forget Password</span></a>
                          </div>
                          <button type="submit" class="btn btn-primary logclic">
                            Login
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mobileNav visible-xs hidden-xs">
            <div class="col-xs-4 visible-xs xs-marker"></div>
            <div class="col-xs-4 visible-xs xs-phone"></div>
            <div class="col-xs-4 visible-xs">
              <button data-target=".navbar-collapse" data-toggle="collapse" id="mnav-button" class="navbar-toggle fa fa-bars fa-2x collapsed threebarclick" type="button">
                <span></span>
              </button>
            </div>
          </div>
          <nav>
            <div class="jump">
              <div class="navbar-collapse nav-collapse collapse">
                <ul class="nav navbar-nav menuu">
                  <!-- <li id="01">
                        <a href="#"><span class="visible-xs hidden-xs">Home</span> </a>
                      </li>
                      <li id="02">
                        <a href="#"><span class="visible-xs hidden-xs">About Us</span> </a>
                      </li>
                      <li id="03">
                        <a href="#"><span class="visible-xs hidden-xs">Program</span> </a>
                      </li>
                      <li id="04">
                        <a href="#"><span class="visible-xs hidden-xs">Register</span> </a>
                      </li>
                      <li id="05">
                        <a href="#"><span class="visible-xs hidden-xs">Certificates</span> </a>
                      </li>
                      <li id="06">
                        <a href="#"><span class="visible-xs hidden-xs">Clients</span> </a>
                      </li>
                      <li id="07">
                        <a href="#"><span class="visible-xs hidden-xs">College Courses</span> </a>
                      </li>
                      <li id="08">
                        <a href="#"><span class="visible-xs hidden-xs">Contact Us</span> </a>
                      </li>
                      <li id="10">
                        <select
                          class="form-control logclickk visible-xs hidden-xs"
                          id="exampleFormControlSelect1"
                        >
                          <option>EN</option>
                        </select>
                      </li> -->
                  <li id="45">
                    <div class="infobox visible-xs hidden-xs">
                      <div class="infoboximg"></div>
                      <div class="infoboxdata">
                        <a href="#"><button type="button" class="btn btn-primary logclick">
                            Registration
                          </button></a>

                        <button type="button" class="btn btn-primary logclick" data-toggle="modal" data-target="#exampleModal">
                          Login
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                                    <small id="emailHelp" class="form-text text-muted">We ll never share your email with anyone
                                      else.</small>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                                  </div>
                                  <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label saveu" for="exampleCheck1">Save User</label>
                                    <a href="#"><span class="forspan">Forget Password</span></a>
                                  </div>
                                  <button type="submit" class="btn btn-primary logclic">
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

  <section>
    <div class="regeformarea">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 regeformimg">
            <div class="regeformimgg">
              {{-- <img src="{!!asset('theme/user_theme/images/footerlogo.png')!!}" class="img-responsive" /> --}}
              <h3>Terms & Condition:</h3>
              <p>
                Medical 2 Career College and the State of Mississippi requires that students
                validate no history of the following charges according to Mississippi Code of
                1972, Section 43-11-13.
              </p>
              {{-- <p> I am applying for admittance as a student at Medical 2 Career College in a
                              healthcare program. Falsification of information on any application is reason
                              for dismissal and loss of all payments made.</p> --}}
              <p>
                By signing below, I attest I have not been convicted of or pleaded guilty or
                nolo contendere to a felony of possession or sale of drugs, murder,
                manslaughter, armed robbery, rape, sexual battery, any gratification of lust,
                aggravated assault, or felonious abuse and/or battery of a vulnerable adult. I
                have not been convicted of or pleaded guilty or nolo contendere to other
                crimes which his/her employer has and/or would determine to be disqualifying
                for employment. By signing below, I give Medical 2 Career College permission
                to conduct a background check in accordance with the Mississippi State Law
                with the Department of Health Nurse Registry to provide a clean medical abuse
                record with the State of Mississippi and permission to conduct a background
                with the Mississippi Department of Public Safety.
              </p>
              <p>
                I am applying for admittance as a student at Medical 2 Career College in a
                healthcare program. Falsification of information on any application is reason
                for dismissal and loss of all payments made.
              </p>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="regeformdata">
              <h3>Registration Form</h3>
              @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


              <form role="form" method="post" action="{{action('User\UserController@save')}}">
              {!! csrf_field() !!}
                <div class="row">
                  <div class="col-sm-6">
                    <select class="form-control" id="one">
                      <option>Selecte Program</option>
                      <option>Certified Nurse Assistant Program of Study</option>
                      <option>Medical Administrative Assistant</option>
                      <option>Medical Assistant</option>
                      <option>Medical Billing and Coding Program</option>
                      <option>Patient Care Technician</option>
                      <option>Pharmacy Technician</option>
                    </select>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control" id="two">
                      <option>Please select</option>
                      <option>05-31-2022 08:00:00 - Mississippi, Tupelo AM 10 instructor led online classes Mon -Thur, 9am-1pm (May 31st-June20th), then 2 days in person classroom 8am-4:30pm (June 21st/23rd) and 2 days in person clinicals 8am-4:30pm Saturday/Sunday(June 25th/26th)</option>
                      <option>05-31-2022 16:30:00 - Mississippi, Tupelo PM 10 instructor led online classes M -TH 5:30pm to 9:30pm (May 31st- June 20th), then 2 days in person classroom 8am-4:30pm Friday/Saturday(June 17th/18th) and 2 days in person clinicals 8am-4:30pm Saturday/Sunday (June 25th/26th)</option>
                      <option>06-28-2022 08:00:00 - Mississippi, Tupelo AM 10 instructor led online classes Mon, Tues, Thurs 9am-1pm (June28-July 25th), then 2 days in person classroom 8am-4:30pm (July 26th/28th) and 2 days in person clinicals 8am-4:30pm Saturday/Sunday(July 30th/31th)</option>
                      <option>06-28-2022 16:30:00 - Mississippi, Tupelo PM 10 instructor led online classes Mon, Tues, Thurs 5:30pm to 9:30pm (June 28th- July25th), then 2 days in person classroom 8am-4:30pm Saturday/Sunday(July 23rd/24th) and 2 days in person clinicals 8am-4:30pm Saturday/Sunday (July 30th/31th)</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="First name" name="first_name"  required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Last name" name="last_name" ,required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Address" name="address"  required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="City" name="city"  required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Zip code" name="zip_code">
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control" id="four" name="state"  required>
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
                    <input type="text" class="form-control" placeholder="Contact" name="contact" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="E-mail" name="email"  required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <select class="form-control" id="five" name="education"  required>
                      <option>Select Education</option>
                      <option>High School</option>
                      <option>GED</option>
                      <option>College</option>
                      <option>Study</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="University / Collage Name" name="collage_name"  required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <select class="form-control" id="six" name="computer_experience"  required>
                      <option>Computer working knowledge</option>
                      <option>Yes</option>
                      <option>NO</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Medical certification or license" name="certification" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <textarea class="form-control" id="eight" placeholder="Work experience" rows="4" name="work_experience"  required></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <textarea class="form-control" id="seven" placeholder="Why do you want to take this program?" rows="4" name="expectations"  required></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <!-- <button type="button" class="btn btn-primary recli">Clear All</button> -->
                    <button type="submit" class="btn btn-primary resub">Submit</button>
                  </div>
                </div>

              </form>
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
                Copyright 2022 by Medical2.com Website Designed and Developed by
                hatinc
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html
