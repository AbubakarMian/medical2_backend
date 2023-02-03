@extends('user.layout.header_footer')
@section('content')



<link href="{!!asset('public/theme/user_theme/css/courses_registration.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="container">
        <div class="row" style="margin-top: 15px;margin-bottom: 15px;width: 100%;">
            <div class="row" style="width: 100%;margin-bottom: 15px;">
                <div class="panel panel-default" style="width: 100%;">
                    <div class="panel-heading">
                        <h5 class="panel-title">Prices Details</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom: 15px;"><span class="col-md-3">500$</span></div>
                    </div>
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="panel panel-default" style="width: 100%;">
                            <div class="panel-heading">
                                <h5 class="panel-title">User Details</h5>
                            </div>
                            <div class="panel-body reginp">
                                <div class="row" style="margin-bottom: 15px;"><span class="col-md-3">First name<span
                                            style="color: red;">*</span></span><span class="col-md-3"><input type="text"
                                            id="fname"></span><span class="col-md-3">Last name<span
                                            style="color: red;">*</span></span><span class="col-md-3"><input type="text"
                                            id="lname"></span></div>
                                <div class="row" style="margin-bottom: 15px;"><span class="col-md-3">Mailing address<span
                                            style="color: red;">*</span></span><span class="col-md-3"><input type="text"
                                            id="addr"></span><span class="col-md-3">Zip code<span
                                            style="color: red;">*</span></span><span class="col-md-3"><input type="text"
                                            id="zip"></span></div>
                                <div class="row" style="margin-bottom: 15px;"><span class="col-md-3">State<span
                                            style="color: red;">*</span></span><span class="col-md-3"><select id="state"
                                            style="width: 173px;">
                                            <option value="0" selected="">Please select</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VI">Virgin Islands</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select></span><span class="col-md-3">Country<span
                                            style="color: red;">*</span></span><span class="col-md-3"><input type="text"
                                            id="country" disabled="" value="United States"></span></div>
                                <div class="row" style="margin-bottom: 15px;"><span class="col-md-3">City<span
                                            style="color: red;">*</span></span><span class="col-md-3"><input type="text"
                                            id="city"></span><span class="col-md-3">Email<span
                                            style="color: red;">*</span></span><span class="col-md-3"><input type="text"
                                            id="email"></span></div>
                                <div class="row" style="margin-bottom: 15px;"><span class="col-md-3">Phone<span
                                            style="color: red;">*</span></span><span class="col-md-3"><input type="text"
                                            id="phone"></span><span class="col-md-3">How did you hear about
                                        us?</span><span class="col-md-3"><select id="source" style="width: 173px;">
                                            <option value="0" selected="">Please select</option>
                                            <option value="Newspaper">Newspaper</option>
                                            <option value="Magazine">Magazine</option>
                                            <option value="TV">TV</option>
                                            <option value="Internet">Internet</option>
                                        </select></span></div>
                                <div class="row" style="margin-bottom: 15px;"><span class="col-md-3"
                                        style="margin-top: 8px;"><input type="checkbox" id="terms">&nbsp;I agree with
                                        terms &amp; conditions</span><span class="col-md-3">
                                            {{-- <img
                                            src="https://www.merchantequip.com/image/?logos=v|m|a|d|p|&amp;height=16"
                                            alt="Merchant logos"> --}}
                                        </span><span class="col-md-3"
                                        style="margin-top: 8px;"><input type="radio" checked="" name="ptype"
                                            class="ptype" value="card">&nbsp; By Stripe</span><span class="col-md-3"
                                        style="margin-top: 8px;"><input type="radio" name="ptype" class="ptype"
                                            value="paypal">&nbsp; By PayPal</span></div>
                                <div class="row" style="margin-bottom: 15px;"><span class="col-md-3"></span><span
                                        class="col-md-3" id="reg_errors"></span><span class="col-md-3"></span><span
                                        class="col-md-3"></span></div>
                                <div class="row" style="margin-bottom: 15px;"><span class="col-md-4">&nbsp;</span><span
                                        class="col-md-4" style="text-align: center;"><button class="btn btn-primary primes"
                                            id="next_register_payment">Next</button></span><span
                                        class="col-md-4">&nbsp;</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- DEBUG-VIEW ENDED 2 APPPATH/Views/register.php -->
                    <!-- DEBUG-VIEW START 3 APPPATH/Views/partials/footer.php -->
    
                    <div class="mb2notices"></div>
                    
    
                </div><!-- //end #page-b -->
            </div><!-- //end #page -->
        </div>
    </div>
@endsection
