<!DOCTYPE html>
<html lang="en">

<head>
  <title>Medical asdasdasdasd2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="{!!asset('theme/user_theme/css/medical2.css')!!}" rel="stylesheet">

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
                <p>Fax Number</p>
              </div>
            </div>
            <div class="infobox">
              <div class="infoboximg">
                <img src="{!!asset('theme/user_theme/images/mail.png')!!}" class="img-responsive" />
              </div>
              <div class="infoboxdata">
                <h4>help@medical2.com</h4>
                <p>Email Address</p>
              </div>
            </div>
  
            <div class="infobox">
              <div class="infoboximg"></div>
              <div class="infoboxdata">
                {{-- <a href="registrationform.html" --}}
                <a href="{!!asset('registration')!!}"
                  ><button type="button" class="btn btn-primary logclick">
                    Registration
                  </button></a
                >
  
                <button
                  type="button"
                  class="btn btn-primary logclick"
                  data-toggle="modal"
                  data-target="#exampleModal"
                >
                  Login
                </button>
  
                <div
                  class="modal fade"
                  id="exampleModal"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
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
                            <input
                              type="email"
                              class="form-control"
                              id="exampleInputEmail1"
                              aria-describedby="emailHelp"
                              placeholder="Enter email"
                            />
                            <small id="emailHelp" class="form-text text-muted"
                              >We'll never share your email with anyone
                              else.</small
                            >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input
                              type="password"
                              class="form-control"
                              id="exampleInputPassword1"
                              placeholder="Password"
                            />
                          </div>
                          <div class="form-group form-check">
                            <input
                              type="checkbox"
                              class="form-check-input"
                              id="exampleCheck1"
                            />
                            <label
                              class="form-check-label saveu"
                              for="exampleCheck1"
                              >Save User</label
                            >
                            <a href="#"
                              ><span class="forspan">Forget Password</span></a
                            >
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
          <div class="row mobileNav">
            <div class="col-xs-4 visible-xs xs-marker"></div>
            <div class="col-xs-4 visible-xs xs-phone"></div>
            <div class="col-xs-4 visible-xs">
              <button
                data-target=".navbar-collapse"
                data-toggle="collapse"
                id="mnav-button"
                class="navbar-toggle fa fa-bars fa-2x collapsed threebarclick"
                type="button"
              >
                <span></span>
              </button>
            </div>
          </div>
          <nav>
            <div class="jump">
              <div class="navbar-collapse nav-collapse collapse">
                <ul class="nav navbar-nav menuu">
                  <li id="01">
                    <a href="#"><span>Home</span> </a>
                  </li>
                  <li id="02">
                    <a href="#"><span>About Us</span> </a>
                  </li>
                  <li id="03">
                    <a href="#"><span>Program</span> </a>
                  </li>
                  <li id="04">
                    <a href="#"><span>Register</span> </a>
                  </li>
                  <li id="05">
                    <a href="#"><span>Certificates</span> </a>
                  </li>
                  <li id="06">
                    <a href="#"><span>Clients</span> </a>
                  </li>
                  <li id="07">
                    <a href="#"><span>College Courses</span> </a>
                  </li>
                  <li id="08">
                    <a href="#"><span>Contact Us</span> </a>
                  </li>
                  <!-- <li id="09">
                            <button type="button" class="btn btn-primary logclick">
                              Login
                            </button>
                          </li> -->
                  <li id="10">
                    <select
                      class="form-control logclickk"
                      id="exampleFormControlSelect1"
                    >
                      <option>EN</option>
                    </select>
                  </li>
                  <li id="45">
                    <div class="infobox visible-xs">
                      <div class="infoboximg"></div>
                      <div class="infoboxdata">
                        <a href="registrationform.html"
                          ><button type="button" class="btn btn-primary logclick">
                            Registration
                          </button></a
                        >
          
                        <button
                          type="button"
                          class="btn btn-primary logclick"
                          data-toggle="modal"
                          data-target="#exampleModal"
                        >
                          Login
                        </button>
          
                        <div
                          class="modal fade"
                          id="exampleModal"
                          tabindex="-1"
                          role="dialog"
                          aria-labelledby="exampleModalLabel"
                          aria-hidden="true"
                        >
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
                                    <input
                                      type="email"
                                      class="form-control"
                                      id="exampleInputEmail1"
                                      aria-describedby="emailHelp"
                                      placeholder="Enter email"
                                    />
                                    <small id="emailHelp" class="form-text text-muted"
                                      >We'll never share your email with anyone
                                      else.</small
                                    >
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input
                                      type="password"
                                      class="form-control"
                                      id="exampleInputPassword1"
                                      placeholder="Password"
                                    />
                                  </div>
                                  <div class="form-group form-check">
                                    <input
                                      type="checkbox"
                                      class="form-check-input"
                                      id="exampleCheck1"
                                    />
                                    <label
                                      class="form-check-label saveu"
                                      for="exampleCheck1"
                                      >Save User</label
                                    >
                                    <a href="#"
                                      ><span class="forspan">Forget Password</span></a
                                    >
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
    <div class="sliderbannerarea">
      <div class="sliderplace">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li
              data-target="#myCarousel"
              data-slide-to="0"
              class="active topslideball"
            ></li>
            <li
              data-target="#myCarousel"
              data-slide-to="1"
              class="topslideball"
            ></li>
            <li
              data-target="#myCarousel"
              data-slide-to="2"
              class="topslideball"
            ></li>
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
                <img
                  src="{!!asset('theme/user_theme/images/healthcarecareercourses.png')!!}"
                  class="img-responsive"
                />
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

  <section>
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
              <img src="{!!asset('theme/user_theme/images/about.png')!!}" class="img-responsive" />
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
                <li>Program</li>
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
              <img src="{!!asset('theme/user_theme/images/bbb.png')!!}" class="img-responsive signbar" />
            </div>
          </div>
          <div class="col-sm-3 hidden-xs">
            <div class="footerdataa">
              <img src="{!!asset('theme/user_theme/images/footerlogo.png')!!}" class="img-responsive" />
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
                Copyright 2022 by Medical2.com Website Design and Develop by
                hatinc
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</body>
</html>