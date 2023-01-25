@extends('user.layout.header_footer')
@section('content')
    <?php
    
    use Carbon\Carbon;
    use App\Model\Student_fees;
    
    ?>

    <link href="{!! asset('public/theme/user_theme/css/profile_courses.css') !!}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{!! asset('public/theme/user_theme/css/medical2.css') !!}" rel="stylesheet">


    <section>
        <div class="corsdetailarea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="corsdetailareadata" {{-- style="border-radius: 34px;" --}}>
                            <div style="text-align: center;" class="rehedic">
                                <h1 style="border-radius: 0px 25px 25px 0px; width: max-content;">Courses Register Details :</h1>
                            </div>

                            <table class="table prtable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sno</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Group</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Join Class </th>
                                        <!-- <th scope="col">Venu</th> -->
                                        <!-- <th scope="col">Timming</th> -->
                                        <!-- <th scope="col">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $join_class = '';
                                    
                                    ?>
                                    @foreach ($course_register as $key => $c)
                                        <?php
                                        $date = Carbon::now();
                                        $current_date = strtotime($date);
                                        ?>
                                        <tr>
                                            <td scope="row">{{ $key + 1 }}</td>
                                            <td>{{ $c->user->name ?? '' }}</td>
                                            <td>{{ $c->group->courses->full_name ?? '' }}</td>
                                            <td>{{ ucwords($c->group->name ?? '') }}</td>
                                            <td>{{ $c->group->teacher->name ?? '' }}</td>

                                            <td>
                                                @if ($c->student_feess->count() > 0)
                                                    <!-- <a href="{{ asset('user_show_payment?student_id_not_paid=' . $c->id) }}" type="button" class="btn btn-danger" style="margin-bottom: 14px;"> -->
                                                    <a href="{{ asset('user_show_payment?course_register=' . $c->id) }}"
                                                        type="button" class="btn btn-danger" style="margin-bottom: 14px;">
                                                        Due Date Have Passed.
                                                    </a>
                                                @else
                                                    @if ($c->group->is_online != 0)
                                                        <a href="{{ asset('course/frame/?group_id=' . $c->group->id) }}"
                                                            target="_blank" style="margin-bottom: 14px;">
                                                            Join Class Link

                                                        </a>
                                                    @else
                                                        {{ $c->course->group->venue }} Location
                                                    @endif
                                                @endif
                                            </td>

                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
