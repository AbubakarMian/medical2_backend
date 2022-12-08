<style>
    .cascas {
    margin-left: 20px;
}
</style>

<div class="row">
    <div class="col-xs-4 cascas">
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


    <div class="col-xs-3 pull-left" style="margin-top: 19px;">

        <label class="control-label">Search</label>

        {!! Form::text('payment_id', $search_payment, [
            'class' => 'form-control',
            'id' => 'user',
            'placeholder' => 'Name',
        ]) !!}
    </div>


    <div class="col-md-2 pull-left" style="margin-top: 25px;">
        <div class="form-group text-center">
            <label></label>
            <div>
                <input type="submit" class="btn btn-info pull-left date-range-review-btn" value="Search">
            </div>
        </div>
    </div>

</div>
