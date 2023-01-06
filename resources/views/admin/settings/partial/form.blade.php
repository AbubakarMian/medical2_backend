<style>
    .vdvjib img {
    /* max-height: 80px; */
    max-width: 100px;
    margin-bottom: 7px;
    border: 1px solid;
    border-radius: 11px;
}
    .image_area {
        position: relative;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 1000px !important;
    }

    .overlay {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }

    .image_area:hover .overlay {
        height: 50%;
        cursor: pointer;
    }

    .text {
        color: #333;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

</style>

<div class="container" align="center">
    <br />
    <h3 align="center">Crop Image Before Upload using CropperJS with PHP</h3>
    <br />
    <div class="row">
        {{-- <div class="col-md-4">&nbsp;</div> --}}
        <input hidden value={!! $pages_images->width !!} id="image_width">


        <input hidden value={!! $pages_images->height !!} id="image_height">
        <input hidden value={!! $pages_images->id !!} id="pages_images_id">

        {{--  --}}


        <input hidden value={!! $pages_images->aspect_ratio_width !!} id="aspect_ratio_width">
        {{--  --}}

        <input hidden value={!! $pages_images->aspect_ratio_height !!} id="aspect_ratio_height">
        <div class="col-md-4">
            <div class="image_area">
                <form method="post">
                    <div class="image_area">
                    <label for="upload_image">
                        <img src="{!! asset('images/logo.png') !!}" id="uploaded_image" class="img-responsive img-circle" />
                        <div class="overlay1">
                            <div class="text">1 Click to Change Profile Image</div>
                        </div>
                        <input type="file" name="image" class="image upload_image" id="upload_image" style="display:none" />
                    </label>
                    </div>
                    <hr>
                    <div  class="image_area">
                    <label for="upload_image2">
                        <img src="{!! asset('images/logo.png') !!}" id="uploaded_image2" class="img-responsive img-circle" />
                        <div class="overlay1">
                            <div class="text">2 Click to Change Profile Image</div>
                        </div>
                        <input type="file" name="image" class="image upload_image" id="upload_image2" style="display:none" />
                    </label>
                </div>
                <hr>
                <div  class="image_area">
                <label for="upload_image3">
                    <img src="{!! asset('images/logo.png') !!}" id="uploaded_image3" class="img-responsive img-circle" />
                    <div class="overlay1">
                        <div class="text">3  Click to Change Profile Image</div>
                    </div>
                    <input type="file" name="image" class="image upload_image" id="upload_image3" style="display:none" />
                </label>
            </div>




                </form>
            </div>
            <button  onclick="save_image()" >Save</button>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="text-align: center; font-size: 14px; font-weight: 600;" class="modal-title">Crop Image Before Upload</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button> --}}
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



    @section('app_jquery')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <!-- jQuery library -->
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}

        <!-- JS & CSS library of MultiSelect plugin -->
        <script src="multiselect/jquery.multiselect.js"></script>
        <link rel="stylesheet" href="multiselect/jquery.multiselect.css">


        <script>

           function save_image(){
            var $modal_success = $('#myModalsuccess');

               console.log('hello');
               var my=  $('#uploaded_image').attr('src');
               var pages_images_id = $('#pages_images_id').val();
                console.log('mymymymy',my);
                $.ajax({

                url: '{!! asset('admin/settings/update') !!}/' + pages_images_id,
                method: 'POST',
                data: {
                    image:my,
                    _token: '{!! csrf_token() !!}',
                },

                success: function(data) {
                console.log('imagessss ', data.image);
                $modal_success.modal('show');

                    }
                });


            }


            $(document).ready(function() {

                var $modal = $('#modal');

                var image_width = $('#image_width').val();
                console.log('image_widthimage_widthimage_width', image_width)
                //

                var pages_images_id = $('#pages_images_id').val();
                console.log('pages_images_idpages_images_idpages_images_id', pages_images_id)
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
                                    url: '{!! asset('admin/settings/upload_cropped_image') !!}',
                                    method: 'POST',
                                    data: {
                                        image: base64data,
                                        _token: '{!! csrf_token() !!}',
                                    },
                                    success: function(data) {
                                        console.log('successsuccesssuccess', data)
                                        console.log('imagessss ', data.image)
                                        $modal.modal('hide');
                                        image_1 = data.image;
                                        if(image_num == 'upload_image'){
                                            $('#uploaded_image').attr('src', data.image);
                                        }
                                        else if(image_num == 'upload_image2'){
                                            $('#uploaded_image2').attr('src', data.image);
                                        }
                                        else if(image_num == 'upload_image3'){
                                            $('#uploaded_image3').attr('src', data.image);
                                        }

                                    }
                                });
                            };
                        });
                    });

                    });
                    </script>
                    @endsection
