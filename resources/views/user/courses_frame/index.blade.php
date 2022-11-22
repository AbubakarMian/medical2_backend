<link href="{!! asset('theme/user_theme/css/course_register.css') !!}" rel="stylesheet">
<link href="{!! asset('theme/user_theme/css/groupform.css') !!}" rel="stylesheet">
<link href="{!! asset('theme/user_theme/css/newmake.css') !!}" rel="stylesheet">
<link href="{!! asset('theme/user_theme/css/proceedpayment.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v3.8.1/css/all.css">

<link href="{!! asset('theme/user_theme/css/profile_courses.css') !!}" rel="stylesheet">
{{-- <link rel="stylesheet" type="text/css" href="{!! asset('theme/code_busters/theme.css') !!}" /> --}}
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    iframe {
        width: 1073px;
        height: 738px;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    td,
    th {
        border: 0px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>







<div class="courbandarea">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="courbanddata">
                    <!--  -->



                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">



                <?php

                ?>

                <?php
                // dd($cg)

                ?>


                @if ($group->is_online == 1)
                <?php
                ?>


                <iframe width="200" height="150" src="{{ $group->url }}" title="hello
                " frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" class="munirvideo" allowfullscreen>
                </iframe>
                @endif









            </div>
        </div>















    </div>




    <script>
        $(document).ready(function() {
            $('#myModal').modal('hide');


        });
        // map
        function open_map(lat, long) {
            create_marker(lat, long);
            $('#myModal').modal('show');
        }
    </script>