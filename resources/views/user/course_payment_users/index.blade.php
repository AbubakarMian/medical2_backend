@extends('user.layout.header_footer')
@section('content')



<link href="{!!asset('theme/user_theme/css/profile_courses.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{!!asset('theme/user_theme/css/medical2.css')!!}" rel="stylesheet">


<section>
    <div class="corsdetailarea">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="corsdetailareadata">
                        <h1>User Course Payment History  </h1>
                            
                        <table class="table prtable">
                            <thead>
                              <tr>
                               
                                <th scope="col">User</th>
                                <!-- <th scope="col">Course</th> -->
                                <th scope="col">Group</th>
                                <th scope="col">Fees Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                            
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($student_fees as $key  => $c)
                            <?php
                            
                            // dd($c->course->group)
                            ?>
                              <tr>
                                
                                <td>{{ucwords($c->user->name)}}</td>
                                <!-- <td>{{ucwords($c->course->full_name)}}</td> -->
                                <td>{{ucwords($c->course->group->name)}}</td>
                                <td>{{ucwords($c->fees_type)}}</td>
                                <td>{{$c->amount}}</td>
                                
                                <td> {{date('d-m-Y', $c->due_date) }}</td>
                               
                                <td class="ptup">
                                  @if($c->status == 'pending')
                                        <a  href="{{asset('user_show_payment?student_id_not_paid='.$c->id)}}" type="button" class="btn btn-danger">Not Paid</a >                                 
                                        @else
                                        <a href="" type="button" class="btn btn-success"> Paid</a> 
                                        Paid
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

