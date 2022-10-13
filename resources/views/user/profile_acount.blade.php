@extends('user.layout.header_footer')
@section('content')



<link href="{!!asset('theme/user_theme/css/profile_acount.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{!!asset('theme/user_theme/css/medical2.css')!!}" rel="stylesheet">



<section>
    <div class="profilesarea">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="profilesareadata">
                    <div class="container-fluid login-container">
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
    
                                @elseif( $message = Session::get('error'))
                                    <div class="alert alert-danger text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                        <h1>Accounts Setting</h1>
                            
                        <form role="form" method="post" action="{{action('User\Profile_Courses_Controller@my_profile_save')}}">
                               {!! csrf_field() !!}




                               <input type="hidden" name="cropped_image" id="cropped_image">



                                        {{--  --}}




                                        <div>
                                            <br />

                                            <br />
                                            <div class="row">
                                                <div class="col-md-4">&nbsp;</div>
                                                <input hidden value='378'        id="image_width">
                                                <input hidden value='226'         id="image_height">
                                                <input hidden value='16'        id="aspect_ratio_width">
                                                <input hidden value='9'           id="aspect_ratio_height">


                                                <div class="col-md-4">
                                                    <div class="image_area">

                                                            <div class="image_area">
                                                            <label for="upload_image">
                                                                <?php
                                                                $avatar = asset('images/logo.png');
                                                                if(isset($courses)){
                                                                    if($courses->avatar){
                                                                        $avatar = $courses->avatar;
                                                                    }
                                                                }
                                                            ?>
                                                                <img src="{!!$avatar !!}" id="uploaded_image" class="img-responsive img-circle"  name="uploadeds_image" />
                                                                <div class="overlay1">
                                                                    <div class="text">Upload</div>
                                                                </div>
                                                                <input type="file" name="image" class="image upload_image" id="upload_image" style="display:none" />
                                                            </label>
                                                            </div>
                                                            <hr>

                                                    </div>
                                                </div>

                                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Crop Image Before Upload</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="img-container">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <img src="" id="sample_image" />
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="preview"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="myModalsuccess" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Save Sucessfully</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <p>Thankyou</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{--  --}}
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <label for="exampleInputEmail1">Full Name:</label>
                                        <input type="text" name="name" required class="form-control" placeholder="Full name">   
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Enter E-mail:</label>
                                        <input type="email" disabled  name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">     
                                    </div>   -->
                                                     
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Country Name:</label>
                                        {{-- <input type="text" class="form-control" placeholder="Country name">   --}}
                                        <select class="form-control" id="exampleFormControlSelect1" name="country" required>
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
                                        <select class="form-control" id="exampleFormControlSelect1" name="city" required>
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
                                        <input type="text"  name="zip" required class="form-control" placeholder="Zip Code">   
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputPassword1">Contact:</label>
                                        <input type="text"  name="contact" required class="form-control" placeholder="Contact No.">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="exampleInputEmail1">Work Experience:</label>                          
                                        <textarea class="form-control"  name="experience" required  id="exampleFormControlTextarea1" rows="3" placeholder="Work Experience"></textarea>
                                    </div>                    
                                </div>
                                <div class="procclick">
                                    <button type="submit" class="btn btn-primary updt">UPDATE</button>
                                </div>                
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('app_jquery')
<script>

$(document).ready(function() {

var $modal = $('#modal');

var image_width = $('#image_width').val();
console.log('image_widthimage_widthimage_width', image_width)
//

// var pages_images_id = $('#pages_images_id').val();
// console.log('pages_images_idpages_images_idpages_images_id', pages_images_id)
//

//
var image_height = $('#image_height').val();
console.log('image_heightimage_height', image_height)
//
var aspect_ratio_width = $('#aspect_ratio_width').val();
console.log('aspect_ratiowidthaspect_ratio_width', aspect_ratio_width)

//
var aspect_ratio_height = $('#aspect_ratio_height').val();
console.log('aspect_ratio_heightaspect_ratio_height', aspect_ratio_height)

var image = document.getElementById('sample_image');

    var cropper;
    var image_num = '';

    // $('#upload_image').change(function(event) {
    $('.upload_image').change(function(event) {
        var files = event.target.files;

        var done = function(url) {
            image.src = url;
            // console.log('   image.src',url)
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function(event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
        image_num = event.target.id;
        console.log('image num ',image_num);
    });


    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: aspect_ratio_width / aspect_ratio_height,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    var image_1 = '';
    var image_2 = '';
    var image_3 = '';

    $('#crop').click(function() {
        canvas = cropper.getCroppedCanvas({
            width: image_width,
            height: image_height
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            console.log('urlurlurlurlurl', url);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                console.log('base64database64database64database64data', base64data);
                $.ajax({
                    // url: '{!! asset('admin/settings/update') !!}/' + pages_images_id,
                    url: '{!! asset('admin/courses_crop_image') !!}',
                    method: 'POST',
                    data: {
                        image: base64data,
                        _token: '{!! csrf_token() !!}',
                    },
                    success: function(data) {
                        console.log('successsuccesssuccesserssss', data)
                        console.log('imagessserrrr', data.image)
                        $modal.modal('hide');
                        image_1 = data.image;
                        if(image_num == 'upload_image'){
                            $('#uploaded_image').attr('src', data.image);
                            $('#cropped_image').val( data.image);
                        }


                    }
                });
            };
        });
    });

    }); 
</script>
@endsection








