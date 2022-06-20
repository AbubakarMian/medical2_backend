@extends('user.layout.header_footer')
@section('content')
<link href="{!!asset('theme/user_theme/css/program.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<section>
    <div class="body-content">
        <div class="container">


            {{htmlentities($about_us->description)  }}

                                </div>
                            </div>
                            @endsection
                            @section('app_jquery')
                            <script>


                            $(function(){
                                $('select.searchlist').select2();
                            })


                            </script>

                            @endsection
