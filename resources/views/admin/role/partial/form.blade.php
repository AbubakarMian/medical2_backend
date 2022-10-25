<style>
    .chechkareadata h4 {
        font-size: 20px;
        font-weight: bold;
        color: #4f5061;
    }

    .chechkareadata label {
        font-size: 15px;
        font-weight: 500;
        margin-bottom: 20px;
        color: gray;
    }

    .tuik {
        margin: 0px 7px !important;
    }

    .rolabel {
        font-size: 14px !important;
        margin-bottom: 5px !important;
        font-weight: 600 !important;
    }

    .tablu {
        margin-bottom: -500px;
    }

    .tabludata thead {
        background: #1582dc;
        border: 1px solid #1582dc;
    }

    .tabludata thead tr th {
        font-size: 15px;
        text-align: center;
        color: white;
        font-weight: 500;
    }

    .tabludata tbody tr {
        background: white;
        border: 1px solid #e3e6f3;
    }

    .tabludata tbody tr th {
        font-size: 15px;
        text-align: center;
        font-weight: 500;
        background: #8080800f;
    }

    .tabludata tbody tr td {
        font-size: 15px;
        text-align: center;
        font-weight: 500;
        background: #8080800f;
        border: 1px solid #e3e6f3;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 4px;
        left: 4px;
        right: 18px;
        bottom: 18px;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 12px;
    width: 12px;
    left: -2px;
    bottom: 0px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    margin: 0px 1px;
}
.miud {
    margin-bottom: -11px !IMPORTANT;
}

    input:checked+.slider {
        background-color: #2196F3;
    }


    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>


<div class="chechkarea">
    <div class="row">
        <div class="col-sm-12">
            <div class="chechkareadata">
                <label for="exampleInputtext1" class="rolabel">Enter Your Role :</label>
                <input type="number" name="role" class="form-control" id="exampleInputtext1" aria-describedby="textHelp"
                    placeholder="Enter Role"><br>
                <div class="container tablu">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table tabludata">
                                <thead>
                                    <tr>
                                        <th scope="col"># No</th>
                                        <th scope="col">Roll</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Create</th>
                                        <th scope="col">Save</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($urls as $my_key => $url)
                                        <tr>
                                            <th scope="row">{{ $my_key + 1 }}</th>
                                            <td>{{ $url->module_name }}</td>
                                            <input hidden name="url_id[]" value="{{ $url->id }}">
                                            <td>
                                                <label class="switch miud"> <input type="checkbox" > <span
                                                        class="slider round swhi" name="permissions[view][]"></span></label>
                                            </td>
                                            <td>
                                                <label class="switch miud"> <input type="checkbox" > <span
                                                        class="slider round swhi" name="permissions[create][]"></span></label>
                                            </td>
                                            <td>
                                                <label class="switch miud"> <input type="checkbox" > <span
                                                        class="slider round swhi"  name="permissions[save][]"></span></label>
                                            </td>
                                            <td>
                                                <label class="switch miud"> <input type="checkbox" > <span
                                                        class="slider round swhi" name="permissions[edit][]"></span></label>
                                            </td>
                                            <td>
                                                <label class="switch miud"> <input type="checkbox" > <span
                                                        class="slider round swhi" name="permissions[update][]"></span></label>
                                            </td>
                                            <td>
                                                <label class="switch miud"> <input type="checkbox" > <span
                                                        class="slider round swhi" name="permissions[delete][]"></span></label>
                                            </td>                                       
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>

<div class="col-sm-6">
    <div class="form-group">
        <div class="col-md-5 pull-left">
            <div class="form-group text-center">
                <div>
                    {!! Form::submit('Save', [
                        'class' => 'btn btn-primary btn-block btn-lg btn-parsley',
                        'onblur' => 'return validateForm();',
                    ]) !!}
                </div>
            </div>
        </div>
