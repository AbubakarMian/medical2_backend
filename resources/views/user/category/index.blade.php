@extends('user.layout.header_footer')
@section('content')
<link href="{!!asset('theme/user_theme/css/program.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<section>
    <div class="body-content">
        <div class="container">
            <div class="theme-courses-topbar" id="">
                <form id="allProductsSearchForm" class="theme-course-search" action="" method="GET" style="width:100%;">
                    <div class="" style="width:100%;">

                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            {!!Form::select('category_id',$category_arr,null,['class' => 'form-control searchlist',
                            'multiple' => 'multiple',
                            'data-parsley-trigger'=>'change',
                            'placeholder'=>'Select Category','required',
                            'maxlength'=>"100"])!!}

                        </div><button type="submit">
                            <i class="fa fa-search"></i></button>
                    </div>
                </form>
<div class="row" id="searchLoader" style="margin-top:10px; margin-left:35%;text-align:center; display: none;">
                    <img src="/img/ajax.gif" alt="loader">
                </div>

            </div>


@foreach($category_split as $c)



            <div class="row">
                @foreach($c as $p)
                <div class="col-sm-3">
                    <div class="rating">
                        <div class="boxing"
                        {{-- style="
                        min-width: 115px;
                        max-width: min-content;
                        min-height: 179x;
                        max-height: 140px;
                        min-height: max-content;
                        padding-top: 19px;" --}}
                        >
                        <a href="{{asset('category_courses/?category_id='.$p->id)}}">


                            <img src="{!! $p->avatar!!}" alt="Avatar" class="image" >
                                <div class="middle">
                                    {{-- <div class="text" >
                                        <a href="{{asset('courses/details')}}">View

                                        </a>
                                    </div> --}}
                                </div>
                            </a>
                        </div>
                        <h4 class="title">
                            <a href="">
                              {!! $p->name!!}
                            </a>

                        </h4>
                        <div class="course-content">
                            <div class="teacher">   {!! $p->description!!}</div>
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
                                <span class="ratingcount">(1306)</span>
                            </div>
                            <div class="course-footer">
                                <div class="price-container">
                                    <span class="currency">$</span>
                                    <span class="price">377</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                @endforeach


            </div>

            @endforeach









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