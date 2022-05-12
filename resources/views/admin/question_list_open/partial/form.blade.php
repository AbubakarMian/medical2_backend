<style>
    .multiselect {
        width: 200px;
    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        font-weight: bold;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #dadada solid;
    }

    #checkboxes label {
        display: block;
    }

    #checkboxes label:hover {
        background-color: #1e90ff;
    }



</style>


<div class="form-group">
    {!! Form::label('question', 'Question') !!}
    <div>
        {!! Form::text('question', null, ['class' => 'form-control', 'data-parsley-required' => 'true', 'data-parsley-trigger' => 'change', 'placeholder' => 'Question', 'required', 'maxlength' => '100']) !!}
    </div>

</div>



{{-- <div class="form-group">
    {!! Form::label('test', 'Test') !!}
    <div>
        {!! Form::text('test', $test->name, ['class' => 'form-control', 'data-parsley-required' => 'true', 'data-parsley-trigger' => 'change', 'placeholder' => 'Question', 'required', 'maxlength' => '100']) !!}
    </div>

</div> --}}




<div class="form-group">

    <div class="form-group">
        <label for="correct-choice">Select Correct Choice</label>
        <select class="form-control" id="correct-choice" name="correct_choice" required>
            @if ($question->choice)
                @foreach ($question->choice as $key => $ch)
                    <option class="option-file" value="{{ $key + 1 }}">Choice # {{ $key + 1 }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
<div class="form-group">

    <div class="form-group">
        <div>
            <input type="button" value="+ Add choice" class="btn-info" onclick="addChoice();">
            <input type="button" value="Remove Choice" class="btn-danger" onclick="removeChoice();">
        </div>
    </div>
</div>
<div>

    <div class="choice-file">
        <div class="choice-input">
            @if ($question->choice)
                @foreach ($question->choice as $key => $ch)
                    <lable>Choice # {{ $key + 1 }}</lable>
                    <input type="text" class="add form-control" name="choices[]" value="{{ $ch->choice }}"
                        style="margin-top: 10px; margin-bottom: 5px;">
                @endforeach
            @endif
        </div>
    </div>
</div>


<div class="col-md-5 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-lg btn-parsley', 'onblur' => 'return validateForm();']) !!}
        </div>
    </div>
</div>






@section('app_jquery')



    <script>
        function validateForm() {
            return true;
        }


        function addChoice() {
            var nextdivnum = $('.add').length + 1;
            console.log('sfdffff', nextdivnum)
            $('.choice-file').append(radioBtnHtml(nextdivnum));
            $('#correct-choice').append(optionHtml(nextdivnum));
        }

        function radioBtnHtml(nextdivnum) {
            return `<div class="choice-input">
                                <lable>Choice # ` + nextdivnum + `</lable>
                                <input type="text" required class="add form-control" name="choices[]" style="margin-top: 10px; margin-bottom: 5px;">
                                </div>
                            `
        }

        function removeChoice() {
            console.log('length', $('.choice-input').length);
            if ($('.choice-input').length < 2) {
                return;
            }
            $('.choice-input:last').remove();
            $('.option-file:last').remove();
        }

        function optionHtml(no) {
            return `
                            <option class ="option-file" value="` + no + `">Choice # ` + no + `</option>
                            `
        }
        var expanded = false;

function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    } else {
        checkboxes.style.display = "none";
        expanded = false;
    }
}


    </script>
    <!-- jQuery library -->
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}

  <!-- JS & CSS library of MultiSelect plugin -->
  <script src="multiselect/jquery.multiselect.js"></script>
  <link rel="stylesheet" href="multiselect/jquery.multiselect.css">

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection
