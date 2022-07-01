@extends('user.layout.header_footer')
@section('content')



<link href="{!!asset('theme/user_theme/css/profile_acount.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



<section>
    <div class="profilesarea">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="profilesareadata">
                        <h1>Accounts Setting</h1>
                            
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Full Name:</label>
                                        <input type="text" class="form-control" placeholder="Full name">   
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputPassword1">Select Image:</label>
                                        {{-- <input type="text" class="form-control" placeholder="Last name"> --}}
                                        <input type="file" class="form-control-file picimg" id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="exampleInputEmail1">Enter E-mail:</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">     
                                    </div>                   
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Country Name:</label>
                                        {{-- <input type="text" class="form-control" placeholder="Country name">   --}}
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Select Country</option>
                                            <option>United States</option>
                                            <option>Brazil</option>
                                            <option>Mexico</option>
                                            <option>China</option>
                                            <option>Alabama</option>
                                        </select> 
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputPassword1">City Name:</label>
                                        {{-- <input type="text" class="form-control" placeholder="City name"> --}}
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Select City</option>
                                            <option>New York</option>
                                            <option>Los Angeles</option>
                                            <option>Chicago</option>
                                            <option>California</option>
                                            <option>Illinois</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Zip Code:</label>
                                        <input type="text" class="form-control" placeholder="Zip Code">   
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputPassword1">Contact:</label>
                                        <input type="text" class="form-control" placeholder="Zip Code">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="exampleInputEmail1">Work Experience:</label>                          
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Work Experience"></textarea>
                                    </div>                    
                                </div>
                                <div class="procclick">
                                    <button type="button" class="btn btn-primary updt">UPDATE</button>
                                </div>                
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection

