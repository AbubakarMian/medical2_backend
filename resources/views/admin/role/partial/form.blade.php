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
</style>


<div class="chechkarea">    
    <div class="row">
        <div class="col-sm-12">
            <div class="chechkareadata">
                <label for="exampleInputtext1" class="rolabel">Enter Your Role ID:</label>
                <input type="number" name="role_id"  class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter Role"><br>
                @foreach($urls as $url)
                <div class="form-check">
                    <h4>{{$url->module_name}}: </h4>
                   <input hidden  name="url_id[]" value="{{$url->id}}">
                    <label class="form-check-label">View</label>
                    <input class="form-check-input tuik" name="permissions[view][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}" > 
                    <label class="form-check-label">Create</label>                       
                    <input class="form-check-input tuik" name="permissions[create][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}" >                        
                    <label class="form-check-label">Save</label>                       
                    <input class="form-check-input tuik"  name="permissions[save][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}" >                        
                    <label class="form-check-label">Edit</label>                       
                    <input class="form-check-input tuik" name="permissions[edit][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}" >                        
                    <label class="form-check-label">Update</label>                       
                    <input class="form-check-input tuik" name="permissions[update][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}">                        
                    <label class="form-check-label">Delete</label>                       
                    <input class="form-check-input tuik"  name="permissions[delete][]" type="checkbox" id="check1" name="option1" value="{{$url->id}}">                        
                </div>
                @endforeach
                <!-- <div class="form-check">
                    <h4>Courses: </h4>
                    <label class="form-check-label">View</label>
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" > 
                    <label class="form-check-label">Create</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Save</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Edit</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Update</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Delete</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                </div>
                <div class="form-check">
                    <h4>Subjects: </h4>
                    <label class="form-check-label">View</label>
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" > 
                    <label class="form-check-label">Create</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Save</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Edit</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Update</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Delete</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                </div>
                <div class="form-check">
                    <h4>Teachers: </h4>
                    <label class="form-check-label">View</label>
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" > 
                    <label class="form-check-label">Create</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Save</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Edit</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Update</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Delete</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                </div>
                <div class="form-check">
                    <h4>Students: </h4>
                    <label class="form-check-label">View</label>
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" > 
                    <label class="form-check-label">Create</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Save</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Edit</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Update</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Delete</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                </div>
                <div class="form-check">
                    <h4>Category: </h4>
                    <label class="form-check-label">View</label>
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" > 
                    <label class="form-check-label">Create</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Save</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Edit</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Update</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Delete</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                </div>
                <div class="form-check">
                    <h4>Payments: </h4>
                    <label class="form-check-label">View</label>
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" > 
                    <label class="form-check-label">Create</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Save</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Edit</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Update</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                    <label class="form-check-label">Delete</label>                       
                    <input class="form-check-input tuik" type="checkbox" id="check1" name="option1" value="something" >                        
                </div> -->
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

       