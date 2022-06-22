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
            font-weight: 600;
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

        .logosite h3 {
            font-size: 18px;
            text-align: left;
            color: #292974;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .infoboximg {
            margin-bottom: -10px;
        }

        .myformclick {
            float: right;
        }
    </style>

    <section>
        <div class="contactarea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contactareadata">
                            <h2>CONTACT US</h2>
                            <h3>WE’RE HAPPY TO HELP!</h3>
                            <p>GET IN TOUCH! WE LOOK FORWARD TO HEARING FROM YOU.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logosite">
                            {{-- <img src="{{ asset('imagesh/logo.jpg') }}" class="img-responsive" style="background-color: cornflowerblue;"> --}}
                            <h3>CORPORATE HEAD OFFICE</h3>
                        </div>
                        <div class="secondlogopoints">
                            <div class="infobox">
                                <div class="infoboximg">
                                    <img src="{{ asset('imagesh/location.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;">
                                </div>
                                <div class="infoboxdata">
                                    <p style="margin-top: 16px;">416 N.H. Street Suites 5 San,<br>Bernardino CA 92410 USA.
                                    </p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    <img src="{{ asset('imagesh/call.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;">
                                </div>
                                <div class="infoboxdata">
                                    <p style="margin-top: 16px;">+1(909) 381 9095</p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    <img src="{{ asset('imagesh/call.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;">
                                </div>
                                <div class="infoboxdata">
                                    <p style="margin-top: 16px;">+234(70) 20319921</p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    <img src="{{ asset('imagesh/email.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;">
                                </div>
                                <div class="infoboxdata">
                                    <p style="margin-top: 16px;">contactus@hrsedu.com</p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    <img src="{{ asset('imagesh/email.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;">
                                </div>
                                <div class="infoboxdata">
                                    <p style="margin-top: 16px;">payment@hrsedu.com</p>
                                </div>
                            </div>
                            <div class="infobox">
                                <div class="infoboximg">
                                    <img src="{{ asset('imagesh/email.png') }}" class="img-responsive"
                                        style="background-color: cornflowerblue;">
                                </div>
                                <div class="infoboxdata">
                                    <p style="margin-top: 16px;">sda@medical2.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="contactform">
                            <form method="post" action="{{ url('/user/contactform') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <div class="myform">
                                    <div class="form-group paddown area">
                                        <input type="text" class="form-control myformdata" id="GnTName"
                                            placeholder="Enter Name" name="name" required>
                                    </div>
                                    <div class="form-group paddown">
                                        <input type="email" class="form-control myformdata" id="GnTemail"
                                            placeholder="Enter email" name="email" required>
                                    </div>
                                    <div class="form-group paddown">
                                        <input type="text" class="form-control myformdata" id="GnTPhone"
                                            placeholder="Enter Phone" name="phone_no">
                                    </div>
                                    <div class="form-group paddown">
                                        <input type="text" class="form-control myformdata" id="GnTName"
                                            placeholder="Enter Subject" name="subject" required>
                                    </div>
                                    <div class="form-group paddown">
                                        <textarea class="form-control myformdata" rows="6" id="GnTcomment" placeholder="Enter Comment" name="coment"
                                            required></textarea>
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
