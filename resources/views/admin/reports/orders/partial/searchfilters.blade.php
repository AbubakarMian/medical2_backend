<div class="row">
    <div class="col-xs-3">
        <div class="form-group">
            <label>Date Range Picker</label>
            <div class="mb15">
                <fieldset>
                    <div class="control-group">
                        <small>Select Date Range</small>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <span class="add-on input-group-addon"><i class="ti-calendar"></i></span>
                                <input type="text" name="date" id="reservationtime" class="form-control active"
                                    value="{!! $date !!}">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="row">

    <div class="col-xs-3">
        <div class="form-group" style="padding-left: 31px">
            <label>Customer Name</label>
            <div class="mb15">
                <fieldset>
                    <div class="control-group">

                        <div class="controls">

                                <span class="add-on input-group-addon"></span>
                                {!! Form::text('user', $search_text , ['class'=>'form-control' , 'id'=>'user','placeholder'=>'Customer Name']) !!}

                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>









<div class="col-xs-3">
    <div class="form-group" style="padding-left: 31px">
        <label>Status</label>
        <div class="mb15">
            <fieldset>
                <div class="control-group">

                    <div class="controls">

                            <span class="add-on input-group-addon"></span>
                            {!! Form::select('status', $status_arr, $status, ['class' => 'form-control', 'id' => 'status']) !!}

                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>







<div class="col-md-2 pull-left" style="padding: 0 0 4px 0 !important; margin-top: 33px;">
    <div class="form-group text-center">
        <div>
            <input type="submit" class="btn btn-info " value="Search">
        </div>
    </div>
</div>
