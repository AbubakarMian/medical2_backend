@extends('user.layout.header_footer')
@section('content')
    <link href="{!! asset('theme/user_theme/css/profile_acount.css') !!}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{!! asset('theme/user_theme/css/medical2.css') !!}" rel="stylesheet">



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
                                @elseif($message = Session::get('error'))
                                    <div class="alert alert-danger text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                
                                <div style="text-align: center; margin: 0px -13px;" class="rehedic">
                                    <h1 style="border-radius: 0px; width: max-content;">Accounts Setting :</h1>
                                </div>

                                <form role="form" method="post"
                                    action="{{ action('User\Profile_Courses_Controller@my_profile_save') }}">
                                    {!! csrf_field() !!}




                                    <input type="hidden" name="cropped_image" id="cropped_image">




                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="exampleInputEmail1">Full Name:</label>
                                    <input type="text" name="name" required class="form-control"
                                        placeholder="Full name">
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
                                    <input type="text" name="zip" required class="form-control"
                                        placeholder="Zip Code">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">Contact:</label>
                                    <input type="text" name="contact" required class="form-control"
                                        placeholder="Contact No.">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="exampleInputEmail1">Work Experience:</label>
                                    <textarea class="form-control" name="experience" required id="exampleFormControlTextarea1" rows="5"
                                        placeholder="Work Experience"></textarea>
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
                console.log('image num ', image_num);
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

                            url: `{!! asset('admin/courses_crop_image') !!}`,
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
                                if (image_num == 'upload_image') {
                                    $('#uploaded_image').attr('src', data.image);
                                    $('#cropped_image').val(data.image);
                                }


                            }
                        });
                    };
                });
            });

        });
    </script>
@endsection
