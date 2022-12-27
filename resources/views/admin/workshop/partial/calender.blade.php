
<style>
    #setmonthdiv{
        display: none;
    }
    #setyeardiv{
        display: none;
    }
</style>
<link rel="stylesheet" href="{{ asset('cssjs/custom_calender.css') }}">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered camo" role="document">
    <div class="modal-content">
        <div class="modal-header camohead">
            <h5>Set Your Date</h5>
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
                        <i class="fa fa-arrow-right aroowm" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-arrow-left aroowm" aria-hidden="true"></i>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="topdays">
                                <h5>Monday</h5>
                                <h5>Tuesday</h5>
                                <h5>Wednesday</h5>
                                <h5>Thurday</h5>
                                <h5>Friday</h5>
                                <h5>Saturday</h5>
                                <h5>Sunday</h5>
                            </div>
                        </div>
                    </div>
                    @for($i=0;$i<5;$i++)
                        <div class="row">
                            <div class="col-sm-12 dateboxarea">
                                <div class="datebox">
                                    <p>01</p>
                                </div>
                                <div class="datebox">
                                    <p>01</p>
                                </div>
                                <div class="datebox">
                                    <p>01</p>
                                </div>
                                <div class="datebox">
                                    <p>01</p>
                                </div>
                                <div class="datebox">
                                    <p>01</p>
                                </div>
                                <div class="datebox">
                                    <p>01</p>
                                </div>
                                <div class="datebox">
                                    <p>01</p>
                                </div>
                            </div>
                        </div>
                    @endfor
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
                    <i class="fa fa-arrow-right aroowm" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-arrow-left aroowm" aria-hidden="true"></i>
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
            <button type="button" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
</div>

<script>

    $(function(){
        set_initial_date();
    })

    var calender_date = 0;
    var calender_month = 0;
    var calender_year = 0;

    function set_initial_date(){
        var date = new Date();
        calender_date = date.getDate();
        calender_month = date.getMonth() + 1;
        calender_year = date.getFullYear();
        set_month(calender_month);
        create_year_list();
    }

    function create_year_list(){
        var year_html = '';
        console.log('calender_year : ',calender_year);
        var end_year = calender_year;
        for(var i=0;i<3 ;i++){
            year_html = year_html+`
                        <div class="row">
                            <div class="col-sm-12 dateboxarea">
            `;
             end_year = calender_year+5;
            for(var year = calender_year ; year< end_year ; year++){
                year_html = year_html+`
                                    <div class="datebo year_bg year_div_`+year+`" onclick="set_year(`+year+`)">
                                        <p>`+year+`</p>
                                    </div>
                `
            }
            year_html =year_html + `
                            </div>
                        </div>`;
        }

        $('.calender_year_panel').html(year_html);
        set_year(year);
    }


    function set_year(year){
        calender_year = year;
        $('.year_bg').css('background','');
        $('.year_div_'+year).css('background','blue');
    }


    function set_month(month){
        calender_month = month;
        $('.month_bg').css('background','');
        $('.month_div_'+month).css('background','blue');
        console.log('calender_month',calender_month);
    }

    function open_date(){
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
