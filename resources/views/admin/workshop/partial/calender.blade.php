
<style>
    #setmonthdiv{
        display: none;
    }
    #setyeardiv{
        display: none;
    }
    .current {

    }

    .dtebo p{
        width: 45px !important;
        padding: 10px !important;
        margin: 0 auto !important;
        border-radius: 200px !important;
    }
    .current_month_year {
        background:#f1582b !important;
        color:white !important;
        cursor: pointer !important;
    }
    .selected_month_year{
        background:#19649b !important;
        color:white !important;
        cursor: pointer !important;
    }
    .current_date p{
        background:#f1582b !important;
        color:white !important;
        cursor: pointer !important;
    }
    .selected_date p{
        background:#19649b !important;
        color:white !important;
        cursor: pointer !important;
    }
</style>
<link rel="stylesheet" href="{{ asset('cssjs/custom_calender.css') }}">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered camo" role="document">
    <div class="modal-content">
        <div class="modal-header camohead">
            <h5 class="selected_month_year_heading">Set Your Date</h5>
        </div>
        <div class="modal-body">
            <div class="camodbody">
               <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="camboclicks">
                            <div class="form-group camboclick">
                                <button type="button" onclick="open_date()" class="calender_bts date_calender_btn btn btn-primary casf active" >Date</button>
                                <button type="button" onclick="open_month()" class="calender_bts month_calender_btn btn btn-primary casf">Month</button>
                                <button type="button" onclick="open_year()" class="calender_bts year_calender_btn btn btn-primary casf">Year</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="setdatediv" class="all_calender_panel_div">
                    <div class="tupdata">
                        <h2 class="headingcale">Select Date</h2>
                        <i class="fa fa-arrow-right aroowm" aria-hidden="true" onclick="new_month_panel('next')"></i>&nbsp;&nbsp;
                        <i class="fa fa-arrow-left aroowm" aria-hidden="true" onclick="new_month_panel('previous')"></i>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="topdays">
                                <h5>Sunday</h5>
                                <h5>Monday</h5>
                                <h5>Tuesday</h5>
                                <h5>Wednesday</h5>
                                <h5>Thurday</h5>
                                <h5>Friday</h5>
                                <h5>Saturday</h5>
                            </div>
                        </div>
                    </div>
                    <div class="calender_date_panel">

                    </div>
                </div>

                <div id="setmonthdiv" class="all_calender_panel_div">
                    <div class="tupdata">
                        <h2 class="headingcale ascsa">Select Month</h2>
                    </div>
                    <?php
                        $months_chuncks = [
                            [
                                1=>'January',
                                2=>'Febuary',
                                3=>'March',
                                4=>'April',
                            ],
                            [
                                5=>'May',
                                6=>'June',
                                7=>'July',
                                8=>'August',
                            ],
                            [
                                9=>'September',
                                10=>'October',
                                11=>'November',
                                12=>'December',
                            ]
                        ];

                    ?>
                    @foreach($months_chuncks as $months)
                        <div class="row">
                            <div class="col-sm-12 dateboxarea">
                                @foreach ($months as $key_id=>$month)
                                    <div class="datebo month_bg month_div_{!!$key_id!!}" onclick="set_month('{!!$key_id!!}')">
                                        <p>{!!$month!!}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                </div>

                <div id="setyeardiv" class="all_calender_panel_div">
                   <div class="tupdata">
                    <h2 class="headingcale">Select Year</h2>
                    <i class="fa fa-arrow-right aroowm" aria-hidden="true" onclick="new_year_panel('next')"></i>
                    &nbsp;&nbsp;<i class="fa fa-arrow-left aroowm" aria-hidden="true" onclick="new_year_panel('previous')"></i>
                   </div>
                    <div class="calender_year_panel">

                    </div>
                </div>

               </div>
            </div>
        </div>
        <div class="modal-footer camofoot">
            <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save</button> --}}
        </div>
    </div>
</div>
</div>

<script>

    $(function(){
        initialize_calender_panels();
    })

    var today_calender_date = 0;
    var today_calender_month = 0;
    var calender_month = 0;
    var calender_year = 0;
    var panel_start_year = 0;
    var panel_month = 0;
    var panel_start_day = 0;
    var all_date_inputs = '{!!$date_input!!}';
    var selection_type = '{!!$selection_type!!}';
    var today = new Date();
    var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

    function total_days_in_month(year,month){
        return new Date(year, month, 0).getDate();
    }
    function start_day_of_month(year,month){
        return new Date(year, (month-1), 1).getDay();
    }

    function initialize_calender_panels(){
        set_initial_date();
        panel_start_year = today.getFullYear();
        calender_year = today.getFullYear();
        panel_start_day = today.getDay();
        today_calender_date = today.getDate();
        panel_month = today.getMonth() + 1;
        today_calender_month = panel_month;

        panel_total_days_in_month = total_days_in_month(calender_year,panel_month);
        create_year_list(calender_year);
        create_month_list(panel_month);
        set_date(today_calender_date);
        set_year(calender_year);
        set_month(calender_month);



    }

    function set_current_date_color(){
        if(panel_month == today_calender_month && calender_year == panel_start_year){
            $('.date_div_'+today_calender_date).addClass('current_date');
            $('.month_div_'+panel_month).addClass('current_month_year');
            $('.year_div_'+calender_year).addClass('current_month_year');
        }
    }

    function set_initial_date(){
        today_calender_date = today.getDate();
        calender_month = today.getMonth() + 1;
        calender_year = today.getFullYear();
    }

    function create_month_list(month){
        var panel_total_days_in_month = total_days_in_month(calender_year,month);
        var start_day = start_day_of_month(calender_year,month);

        var month_html = '';
        console.log('create_month_list : ',month);
        console.log('calender_year : ',calender_year);
        var date = 1 - start_day;
        var end_date = date;
        for(var i=0;i<5 ;i++){
            console.log('calender_day 11 : ',start_day);
            console.log('calender_day date : ',date);

            month_html = month_html+`
                        <div class="row">
                            <div class="col-sm-12 dateboxarea">
            `;
            end_date = date+7;
            for( date; date< end_date ; date++){
        console.log('calender_day 222 : ',start_day);

                var date_data = date;
                if(date_data < 1 ||  date> (panel_total_days_in_month)){
                    date_data = '';
                }
                month_html = month_html+`
                                <div class="datebo dtebo date_bg date_div_`+date_data+`" onclick="set_date(`+date_data+`)">
                                    <p>`+date_data+`</p>
                                </div>
                `
            }
            month_html =month_html + `
                            </div>
                        </div>`;
            date = end_date;
        }
        $('.calender_date_panel').html(month_html);
        $('.selected_month_year_heading').html(monthNames[(calender_month-1)]+'-'+calender_year);
        set_current_date_color();
    }

    function create_year_list(start_year){
        var year_html = '';
        console.log('calender_year : ',start_year);
        var year = start_year
        var end_year = start_year;
        for(var i=0;i<3 ;i++){
            year_html = year_html+`
                        <div class="row">
                            <div class="col-sm-12 dateboxarea">
            `;
             end_year = year+5;
            for( year; year< end_year ; year++){
                year_html = year_html+`
                                <div class="datebo year_bg year_div_`+year+`" onclick="set_year(`+year+`)">
                                    <p>`+year+`</p>
                                </div>
                `
            }
            year_html =year_html + `
                            </div>
                        </div>`;
            year = end_year;
        }
        $('.calender_year_panel').html(year_html);
        set_current_date_color();

    }
    function new_year_panel(action){
        if(action == 'previous'){
            panel_start_year = panel_start_year - 15;
        }
        else{ // action == 'next'
            panel_start_year = panel_start_year + 15;
        }
        create_year_list(panel_start_year);
        set_year(calender_year);
    }
    function new_month_panel(action){
        console.log('panel_month action ',action);

        if(action == 'previous'){
            console.log('panel_month pre ',panel_month);
            if(panel_month == 1){
                panel_month = 12;
                calender_year--;
            }
            else{
                panel_month--;
            }
            console.log('panel_month pre 2  ',panel_month);

        }
        else{// action == 'next'
            if(panel_month == 12){
                panel_month = 1;
                calender_year++;
            }
            else{
                panel_month++;
            }
        }

        // panel_month = total_days_in_month(panel_start_year,panel_month);
        create_month_list(panel_month);
        set_month(panel_month);
    }
    function set_year(year){
        calender_year = year;
        $('.year_bg').removeClass('selected_month_year');
        $('.year_div_'+year).addClass('selected_month_year');
        open_panel_div('#setmonthdiv');

    }
    function set_month(month){
        calender_month = month;
        $('.month_bg').removeClass('selected_month_year');
        $('.month_div_'+month).addClass('selected_month_year');
        console.log('calender_month',calender_month);
        create_month_list(calender_month);
        open_panel_div('#setdatediv');

    }
    function set_date(date){
        calender_date = date;
        $('.date_bg').removeClass('selected_date');
        $('.date_div_'+date).addClass('selected_date');
        // $('.selected_month_year_heading').html(monthNames[(calender_month-1)]+'-'+calender_year);
        console.log('calender_date',calender_date);
        console.log('calender_month',calender_month);
        console.log('calender_year',calender_year);
    }
    function open_date(){
        create_month_list(panel_month);
        open_panel_div('#setdatediv');
    }
    function open_month(){
        open_panel_div('#setmonthdiv');
    }
    function open_year(){
        open_panel_div('#setyeardiv')
    }
    function open_panel_div(panel){
        $('.calender_bts').removeClass('active');
        $('.all_calender_panel_div').css('display','none');
        $(panel).css('display','block');
    }
</script>
