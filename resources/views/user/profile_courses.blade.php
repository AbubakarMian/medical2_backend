@extends('user.layout.header_footer')
@section('content')

<?php

use Carbon\Carbon;
use App\Model\Student_fees;

?>

<link href="{!!asset('theme/user_theme/css/profile_courses.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{!!asset('theme/user_theme/css/medical2.css')!!}" rel="stylesheet">


<section>
  <div class="corsdetailarea">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="corsdetailareadata">
            <h1>Courses Details</h1>

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
                $join_class  = '';

                ?>
                @foreach($course_register as $key => $c)

                <?php
                $date = Carbon::now();
                $current_date = strtotime($date);
                //  dd( $date_string);
                $student_id = $c->student_fees->id;
                $student_due_date = $c->student_fees->due_date;
                // if ($student_due_date <= $date_string) {
                if ($current_date > $student_due_date) {
                  $join_class =
                    'Please Paid';
                } else {
                  $join_class = 'Join Class';
                }
                ?>
                <tr>
                  <td scope="row">{{$key+1}}</td>
                  <td>{{$c->user->name ?? ''}}</td>
                  <td>{{$c->course->full_name ?? ''}}</td>
                  <td>{{$c->course->group->name ?? '' }}</td>
                  <td>{{$c->course->group->teacher->name ?? ''}}</td>
                  <td>

                    @if ($c->course->group->is_online != 0)
                    <a href="{{ asset('course/frame/?group_id='.$c->course->group->id) }}" target="_blank">
                      @if($join_class == "Please Paid")
                      <a href="{{asset('user_show_payment?student_id_not_paid='.$student_id)}}" type="button" class="btn btn-danger">Not Paid</a>
                      @else
                      {{$join_class}}
                      @endif

                    </a>



                    @else
                    Offline
                    @endif




                  </td>

                  <!-- <td class="clockli"><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                               
                                <td><button type="button" class="btn btn-primary porjoin">Join</button>
                                    <button type="button" class="btn btn-primary pordetai">Detail</button></td> -->
                </tr>
                <!-- <tr>
                                <td scope="row">2</td>
                                <td>Science</td>
                                <td>Sir Ali</td>
                                <td>Canada</td>
                                <td class="clockli"><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                               
                                <td><button type="button" class="btn btn-primary porjoinn">Join</button>
                                    <button type="button" class="btn btn-primary pordetai">Detail</button></td>
                              </tr>  -->
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