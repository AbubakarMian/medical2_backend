@extends('user.layout.header_footer')
@section('content')
    <link href="{{ asset('css/contact_us.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <style>
        .contactarea {
            text-align: center;
            background: #474e580a;
            padding: 50px;
        }

        .contactareadata h2 {
            color: black;
            font-size: 40px;
            font-weight: 700;
        }


        .infoboximg i {
            padding: 18px 13px;
            font-size: 15px;
            color: #292974;
            border: 1px solid;
            border-radius: 300px;
            padding: 12px 13px;
            margin: 13px;
        }

        .contactareadata h3 {
            color: black;
            font-size: 25px;
            font-weight: 500;
            margin-top: 0px;
        }

        .contactareadata p {
            color: black;
            font-size: 20px;
            font-weight: 400;
            margin-top: 15px;
            margin-bottom: 50px;
        }

        .myform input {
            border-radius: 0px;
            padding: 20px;
            background: transparent;
            border-color: #323a4540;
            margin-bottom: 20px;
        }

        .myform textarea {
            border-radius: 0px;
            padding: 20px;
            background: transparent;
            border-color: #323a4540;
            margin-bottom: 20px;
        }

        .entersend {
            border-radius: 0px;
            width: 160px;
            background-color: #292974;
            border-color: #292974;
            color: white;
            height: 40px;
        }

        h2.logosite {
            font-size: 35px;
            /* text-align: left; */
            color: #000000;
            font-weight: 700;
            /* margin-bottom: 10px; */
            margin-top: -30px;
        }

        .infoboximg {
            margin-bottom: -10px;
        }

        .myformclick {
            float: right;
        }

        .contactareadata h2 {
            color: black;
            font-size: 40px;
            font-weight: 600;
            margin-bottom: 40px;
        }
    </style>

    <section>
        <div class="contactarea">
            <div class="container">
 
                <div class="row">
                    <div class="col-sm-4">
                  
                        <div class="secondlogopoints">
                            <div class="infobox">
                                <div class="infoboximg">
                                    {{-- <img src="{{ asset('imagesh/location.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;"> --}}
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="infoboxdata">
                                    {{-- <h4>Mailing ADDRESS</h4> --}}
                                    <p style="margin-top: 16px;"> 416 N.H. Street Suites 5 San,<br>Bernardino CA 92410 USA.
                                    </p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    {{-- <img src="{{ asset('imagesh/call.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;"> --}}
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="infoboxdata">
                                    {{-- <h4>PHONE NUMBER</h4> --}}
                                    <p style="margin-top: 16px;">+1(909) 381 9095</p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    {{-- <img src="{{ asset('imagesh/call.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;"> --}}
                                    <i class="fa fa-fax" aria-hidden="true"></i>
                                </div>
                                <div class="infoboxdata">
                                    {{-- <h4>FAX NUMBER</h4> --}}
                                    <p style="margin-top: 16px;">+234(70) 20319921</p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    {{-- <img src="{{ asset('imagesh/email.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;"> --}}
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="infoboxdata">
                                    {{-- <h4></h4> --}}
                                    <p style="margin-top: 16px;">contactus@hrsedu.com</p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    {{-- <img src="{{ asset('imagesh/email.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;"> --}}
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="infoboxdata">
                                    {{-- <h4>EMAIL ADDRESS</h4> --}}
                                    <p style="margin-top: 16px;">payment@hrsedu.com</p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    {{-- <img src="{{ asset('imagesh/email.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;"> --}}
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="infoboxdata">
                                    {{-- <h4>EMAIL ADDRESS</h4> --}}
                                    <p style="margin-top: 16px;">sda@medical2.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                     
                        <div class="contactform">
                            <form method="post" action="{{ url('CoursesController@update_password_save') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <div class="myform">
                                <input hidden name="user_id" value="{{$user->id}}">
                                    <div class="form-group paddown area">
                                        <input type="text" class="form-control myformdata" id="GnTName"
                                            placeholder="Enter Name" name="user_update_password" required>
                                          
                                    </div>
                                
                                   
                                    
                                   
                                    <div class="myformclick">
                                        <button type="submit" class="btn btn-primary entersend">SEND NOW</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
