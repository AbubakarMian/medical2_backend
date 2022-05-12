{{-- <style type="text/css">
    @font-face {
        font-family: THE_GONjURING;
        src: url('/fonts/THE_GONjURING.ttf');
    }

</style> --}}
<html>

<head>
    <link rel="stylesheet" href="{{ asset('theme/vendor/bootstrap-daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssjs/myapp.css') }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
</head>


<body>


    <table class="table table-striped">
        <thead>
         <tr>
            <th class="myso">
                <div class="bestcso">S. No.</div>
            </th>
            <th class="mycourse">
                <div class="bestcourse">Question</div>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($quiz as $key => $q)

        <?php 
            //if($key == 382){
               //  dd($q);
               // break;
           // }
        
        
        ?>
            <tr class="myarrow myarrow_{{ $q->id }}">
                <td class="mynbr">
                    <div class="bestnbr"> {!! $key + 1 !!}</div>
                </td>
                <td class="hrs">
                    
                    <div class="besthrs">{!! htmlentities($q->question, ENT_QUOTES, 'UTF-8')  !!}</div>
                   

                </td>
            

            </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
