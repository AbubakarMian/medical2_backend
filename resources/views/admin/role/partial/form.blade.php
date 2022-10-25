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
}
</style>


<div class="chechkarea">    
    <div class="row">
        <div class="col-sm-12">
            <div class="chechkareadata">
                <label for="exampleInputtext1" class="rolabel">Enter Your Role ID:</label>
                <input type="number" name="role_id"  class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter Role"><br>
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

                                @foreach($urls as $url)
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>{{$url->module_name}}</td>   
                                    <input hidden  name="url_id[]" value="{{$url->id}}"> 
                                    <td><input class="form-check-input tuik" name="permissions[view][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}" > </td>
                                    <td><input class="form-check-input tuik" name="permissions[create][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}" ></td>                                                                     
                                    <td><input class="form-check-input tuik"  name="permissions[save][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}" ></td>                                                                     
                                    <td><input class="form-check-input tuik" name="permissions[edit][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}" ></td>                                                                     
                                    <td><input class="form-check-input tuik" name="permissions[update][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}"></td>                                                                     
                                    <td><input class="form-check-input tuik"  name="permissions[delete][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}"></td>                                                                     
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