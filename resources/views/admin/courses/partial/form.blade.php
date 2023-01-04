<style>
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

    .tickbox input {
        height: 23px;
    }

    .text {
        color: blue;
        font-size: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<?php
$complete_fees_area_display = 'display:none;'; //$('.complete_fees_area').hide();
$installment_fees_area_display = 'display:none;'; //$('.installment_fees_area').hide();
if (isset($courses)) {
    if ($courses->fees_type == 'installment') {
        $installment_fees_area_display = 'display:block;';
    } else {
        // complete
        $complete_fees_area_display = 'display:block;';
    }
}
?>

<div class="form-group">
    {!! Form::label('name', 'Full Name') !!}
    <div>
        {!! Form::text('full_name', null, [
            'class' => 'form-control',
            'data-parsley-required' => 'true',
            'data-parsley-trigger' => 'change',
            'placeholder' => 'Full Name',
            'required',
            'maxlength' => '100',
        ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'Short Name') !!}
    <div>
        {!! Form::text('short_name', null, [
            'class' => 'form-control',
            'data-parsley-required' => 'true',
            'data-parsley-trigger' => 'change',
            'placeholder' => 'Short Name',
            'required',
            'maxlength' => '100',
        ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('fees', 'Exam Fees') !!}
    <div>
        {!! Form::text('examination_fees', null, [
            'class' => 'form-control',
            'data-parsley-required' => 'true',
            'data-parsley-trigger' => 'change',
            'placeholder' => 'Enter Fees',
            'required',
            'maxlength' => '100',
        ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('One_payment ', 'One Time Payment') !!}
    <div>
        {!! Form::checkbox('one_time_payment', null, [
            'class' => 'form-control',
            'data-parsley-required' => 'true',
            'data-parsley-trigger' => 'change',
            'placeholder' => 'Enter Payment',
            'required',
            'maxlength' => '100',
        ]) !!}
    </div>
</div>
<div class="form-group">
    <label for="category_id">Select Category</label>
    {!! Form::select('category_id', $category, null, [
        'class' => 'form-control',
        'data-parsley-required' => 'true',
        'data-parsley-trigger' => 'change',
        'placeholder' => 'Select Category',
        'required',
        'maxlength' => '100',
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('fees_type', 'Fees Type') !!}
    {!! Form::select('fees_type', $fees_type, null, [
        'placeholder' => "Select
                                        Type",
        'onchange' => 'open_fees_type_div()',
        'class' => 'form-control fees_type',
        'required',
    ]) !!}
    </select>
</div>

<div class="complete_fees_area" style="background-color: #d3d3d32e; {!! $complete_fees_area_display !!}">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('amount', 'Amount') !!}
                <div>
                    {!! Form::text('amount', null, [
                        'class' => 'form-control due_date_validation ',
                        'data-parsley-required' => 'true',
                        'data-parsley-trigger' => 'change',
                        'placeholder' => 'Enter Amount',
                        'maxlength' => '100',
                    ]) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('due_date', 'Due Date') !!}
                <div>
                    {!! Form::date('due_date', null, [
                        'class' => 'form-control complete_due_date',
                        'data-parsley-required' => 'true',
                        'data-parsley-trigger' => 'change',
                        'placeholder' => 'Enter Due Date',
                        'maxlength' => '100',
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="installment_fees_area" style="{!! $installment_fees_area_display !!}">
    <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <button type="button" onclick="add_installment_divs()" class="btn btn-danger installment_divs">Add
                Installment</button>
        </div>
    </div>

    <div class="multiple_times_open_div" style="background-color: #d3d3d32e;">
        @if (isset($courses))
            @foreach ($courses->course_fees as $course_fees)
                <div class="row installmet_div_row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Amount</label>
                            <div>
                                <input type="number" name="amount[]" value="{!! $course_fees->amount !!}"
                                    class="form-control amount_validation" data-parsley-required="true"
                                    data-parsley-trigger="change" placeholder="Enter Amount">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Due Date</label>
                            <div>
                                <input type="date" name="due_date[]" value="{!! date('Y-m-d', $course_fees->due_date) !!}"
                                    class="form-control due_date_validation" data-parsley-required="true"
                                    data-parsley-trigger="change" placeholder="Enter Due Date">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 btn btn-danger form-group" onclick="remove_installment(this)"
                        style="margin-top: 10px;margin-left: 16px;margin-bottom: 18px;">Remove
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<input type="hidden" name="cropped_image" id="cropped_image">

<div>
    <br />

    <br />
    <div class="row">
        <div class="col-md-4">&nbsp;</div>
        <input hidden value='378' id="image_width">
        <input hidden value='226' id="image_height">
        <input hidden value='16' id="aspect_ratio_width">
        <input hidden value='9' id="aspect_ratio_height">


        <div class="col-md-4">
            <div class="image_area">

                <div class="image_area">
                    <label for="upload_image">
                        <?php
                        $avatar = asset('images/logo.png');
                        if (isset($courses)) {
                            if ($courses->avatar) {
                                $avatar = $courses->avatar;
                            }
                        }
                        ?>
                        <img src="{!! $avatar !!}" id="uploaded_image" class="img-responsive img-circle"
                            name="uploadeds_image" />
                        <div class="overlay1">
                            <div class="text">Upload</div>
                        </div>
                        <input type="file" required name="image" class="image upload_image" id="upload_image"
                            style="display:block" />
                    </label>
                </div>
                <hr>

            </div>
            {{-- <button  onclick="save_image()" >Save</button> --}}
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

{!! Form::label('description', 'Description') !!}
<div>
    <div>
        {!! Form::textarea('description', null, [
            'class' => 'ckeditor form-control',
            'id' => 'summary-ckeditor',
            'data-parsley-required' => 'true',
            'data-parsley-trigger' => 'change',
            'placeholder' => 'Enter title',
            'required',
            'maxlength' => '100',
        ]) !!}
    </div>
</div>

<span id="err" class="error-product"></span>

<div class="form-group col-md-12"></div>

<div class="col-md-5 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::submit('Save', [
                'class' => 'btn btn-primary btn-block btn-lg btn-parsley medsaveclick',
                'onclick' => 'return validateForm();',
                'onclick' => 'return validateForm_amount();',
            ]) !!}
        </div>
    </div>
</div>

@section('app_jquery')
    <script>
        function open_fees_type_div() {
            console.log('open_fesss_type_divvvvvvvv');
            var select_fees_type = $('.fees_type').val();
            console.log('select_fees_type__select_fees_type', select_fees_type);

            if (select_fees_type == 'complete') {
                var complete_fees_area = $('.complete_fees_area').show()
                var installment_fees_area = $('.installment_fees_area').hide()

            };
            if (select_fees_type == 'installment') {
                var installment_fees_area = $('.installment_fees_area').show();
                var complete_fees_area = $('.complete_fees_area').hide()
            };
        }

        function remove_installment(e) {
            $(e).parent().remove();
        }

        function installment_html(v) {
            return (`
            <div class="row installmet_div_row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <div>
                            <input type="number" name="amount[]" class="form-control amount_validation" data-parsley-required="true"
                                data-parsley-trigger="change" placeholder="Enter Amount">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Due Date</label>
                        <div>
                            <input type="date" name="due_date[]" class="form-control due_date_validation"
                                data-parsley-required="true" data-parsley-trigger="change" placeholder="Enter Due Date">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 btn btn-danger form-group" onclick="remove_installment(this)"
                    style="margin-top: 10px;margin-left: 16px;margin-bottom: 18px;">Remove
                </div>
            </div>
           `);
        }

        function add_installment_divs() {
            console.log('add_installment_divs_add_installment_divs');
            var installmet_div_row = $('.installmet_div_row').length;
            var multiple_times_open_div = $('.multiple_times_open_div').append(installment_html(installmet_div_row));
        }


        $(document).ready(function() {

            // var complete_fees_area = $('.complete_fees_area').hide();
            // var installment_fees_area = $('.installment_fees_area').hide();
            $modal = $('#modal');
            var image_width = $('#image_width').val();

            console.log('image_widthimage_widthimage_width', image_width)

            var image_height = $('#image_height').val();
            console.log('image_heightimage_height', image_height)

            var aspect_ratio_width = $('#aspect_ratio_width').val();
            console.log('aspect_ratiowidthaspect_ratio_width', aspect_ratio_width)

            var aspect_ratio_height = $('#aspect_ratio_height').val();
            console.log('aspect_ratio_heightaspect_ratio_height', aspect_ratio_height)

            var image = document.getElementById('sample_image');
            var cropper;
            var image_num = '';

            $('.upload_image').change(function(event) {
                var files = event.target.files;
                var done = function(url) {
                    image.src = url;
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
                    console.log('image url', url);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        $.ajax({
                            url: '{!! asset('admin/courses_crop_image') !!}',
                            method: 'POST',
                            data: {
                                image: base64data,
                                _token: '{!! csrf_token() !!}',
                            },
                            success: function(data) {
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

        function validateForm() {
            var due_dates = $('.due_date_validation');
            var due_dates_valid = true;
            $.each(due_dates, function(index, input) {
                if ($(input).val() == '') {
                    due_dates_valid = false;
                    return;
                }
            })

            if (!due_dates_valid) {
                alert('invalid due date');
                return false;
            } else {
                return true;
            }
        }

        function validateForm_amount() {
            var amount = $('.amount_validation');
            var amount_valid = true;
            $.each(amount, function(index, input) {
                if ($(input).val() == '') {
                    amount_valid = false;
                    return;
                }
            })

            if (!amount_valid) {
                alert('invalid amount');
                return false;
            } else {
                return true;
            }
        }
    </script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection
