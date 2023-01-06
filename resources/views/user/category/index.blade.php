<style>
   
</style>

@extends('user.layout.header_footer')
@section('content')
    <link href="{!! asset('theme/user_theme/css/program.css') !!}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <section>
        <div class="body-content">
            <div class="container">
                <div class="theme-courses-topbar" id="">

                    <form method="post" action="{{ asset('user/category_search') }}" style="width:100%">
                        {!! csrf_field() !!}
                        <div class="topctbar" style="">

                            <div class="form-group">
                                <label class="aafa" for="category_id">Select Category :</label>

                                {!! Form::text(
                                    'category_name',
                                    $name ?? '',
                                
                                    [
                                        'class' => 'form-control bfgs',
                                        'data-parsley-trigger' => 'change',
                                        'placeholder' => 'Select Category',
                                        'maxlength' => '100',
                                    ],
                                ) !!}

                            </div>
                            <button type="submit" class="btn btn-primary resubg">SUBMIT</button>

                        </div>
                    </form>
                    <div class="row" id="searchLoader"
                        style="margin-top:10px; margin-left:35%;text-align:center; display: none;">
                        <img src="/img/ajax.gif" alt="loader">
                    </div>
                </div>
                @foreach ($category_split as $c)
                    <div class="container catdeta">
                        <div class="row">
                            @foreach ($c as $p)
                                <div class="col-sm-3">
                                    <div class="rating">
                                        <div class="boxing"
                                            style="
                                                min-width: 115px;
                                                max-width: min-content;
                                                min-height: 179x;
                                                max-height: 140px;
                                                min-height: max-content;
                                                padding-top: 19px;">
                                            <a href="">
                                                <img src="{!! $p->avatar !!}" alt="Avatar" class="image">
                                                <div class="middle">
                                                    <div class="text">
                                                        <a
                                                            href="{{ asset('category_courses/?category_id=' . $p->id . '&type=courses') }}">View

                                                        </a>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <h4 class="title">
                                            <a href="">
                                                {!! $p->name !!}
                                            </a>

                                        </h4>
                                        <div class="course-content">
                                            <div class="teacher"> {!! $p->description !!}</div>
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
                                                    <span class="currency">Price: </span>
                                                    <span class="price">$ 377</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection





@section('app_jquery')
    <script>
        $(function() {
            $('select.searchlist').select2();
        })
    </script>
@endsection
