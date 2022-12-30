@extends('user.layout.header_footer')
@section('content')
    <link href="{!! asset('theme/user_theme/css/program.css') !!}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <section>
        <div class="body-content">
            <div class="container">
                <div class="theme-courses-topbar" id="">
                    <form method="post" action="{{ asset('user/courses_search') }}" style="width:100%">
                        {!! csrf_field() !!}
                        <div class="" style="width:100%;">
                            {!! Form::hidden('type', $types ?? '') !!}

                            <div class="form-group">
                                <label for="category_id">Select Courses</label>
                                {!! Form::text(
                                    'courses_name',
                                    $name ?? '',

                                    [
                                        'class' => 'form-control ',
                                        'data-parsley-trigger' => 'change',
                                        'placeholder' => 'Select Courses',
                                        'maxlength' => '100',
                                    ],
                                ) !!}

                            </div>
                            <button type="submit" class="btn btn-primary resubg">Submit</button>

                        </div>
                    </form>
                    <!-- <form id="allProductsSearchForm" class="theme-course-search" action="" method="GET"
                                    style="width:100%;">
                                    <div class="" style="width:100%;">

                                        <div class="form-group">
                                            <label for="category_id">Select Category</label>
                                            {!! Form::select('category_id', $category_arr, null, [
                                                'class' => 'form-control searchlist',
                                                'multiple' => 'multiple',
                                                'data-parsley-trigger' => 'change',
                                                'placeholder' => 'Select Category',
                                                'required',
                                                'maxlength' => '100',
                                            ]) !!}

                                        </div><button type="submit">
                                            <i class="fa fa-search"></i></button>
                                    </div>
                                </form> -->
                    <div class="row" id="searchLoader"
                        style="margin-top:10px; margin-left:35%;text-align:center; display: none;">
                        <img src="/img/ajax.gif" alt="loader">
                    </div>

                </div>


                @foreach ($courses_split as $c)
                    <div class="container catdeta">
                        <div class="row">
                            @foreach ($c as $p)
                                <div class="col-sm-3 gahalink">
                                    {{-- <a href="{{ asset('course/registration/?course_id=' . $p->id . '&type=' . $types) }}"> --}}
                                        <div class="rating">

                                            <div class="boxing">
                                                <img src="{!! $p->avatar !!}" alt="Avatar" class="image">
                                                <div class="middle">
                                                    <div class="text">
                                                        <a href="{{ asset('course/registration/?course_id=' . $p->id . '&type=' . $types) }}">View</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="title">

                                                    {!! $p->full_name !!}

                                            </h4>

                                            <div class="course-content">
                                                <div class="course-rating">
                                                    <span class="ratingnum">4.01</span>
                                                    <div class="mb2reviews-stars sm">

                                                        <div class="stars-full" style="width:80%;">
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                            <i class="glyphicon glyphicon-star"></i>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="course-footer">
                                                    <div class="price-container">
                                                        <span class="currency">Price: </span>
                                                        <span class="price">${!! $p->examination_fees !!}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    {{-- </a> --}}
                                </div>
                            @endforeach


                        </div>
                    </div>
                @endforeach









            </div>
        </div>
    @endsection
    @section('app_jquery')
        <script>
            $(function() {
                $('select.searchlist').select2();
            })
        </script>
    @endsection
