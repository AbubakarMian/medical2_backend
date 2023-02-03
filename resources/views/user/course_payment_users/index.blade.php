<style>
   .hozone {
    width: 50% !important;
    border-radius: 0px !important;
    font-size: 14px !important;
    color: white !important;
    background: #f1582b !important;
    border-color: #f1582b !important;
}
   .hozonenot {
    width: 50% !important;
    border-radius: 0px !important;
    font-size: 14px !important;
    color: white !important;
    background: red !important;
    border-color: red !important;
}


</style>
@extends('user.layout.header_footer')
@section('content')
    <?php
    
    use Carbon\Carbon;
    use App\Model\Student_fees;
    
    ?>

    <link href="{!! asset('theme/user_theme/css/profile_courses.css') !!}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{!! asset('theme/user_theme/css/medical2.css') !!}" rel="stylesheet">


    <section>
        <div class="corsdetailarea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="corsdetailareadata" 
                        {{-- style="border-radius: 34px;" --}}
                        >                            
                            <div style="text-align: center;" class="rehedic">
                              <h1 style="border-radius: 0px 25px 25px 0px; width: max-content;">User Course Payment History :</h1>
                          </div>

                            <table class="table prtable">
                                <thead>
                                    <tr>

                                        <!-- <th scope="col">User</th> -->
                                        <!-- <th scope="col">Course</th> -->
                                        <th scope="col">Group</th>
                                        <th scope="col">Fees Type</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student_fees as $key => $c)
                                        <?php
                                        
                                        // dd($c->course->group)
                                        ?>
                                        <tr>

                                            <!-- <td>{{ ucwords($c->user->name) }}</td> -->
                                            <!-- <td>{{ ucwords($c->course->full_name) }}</td> -->
                                            @foreach ($c->group as $g_key => $g_u)
                                                <td>{{ ucwords($g_u->name) }}</td>
                                            @endforeach
                                            <td>{{ ucwords($c->fees_type) }}</td>
                                            <td>{{ $c->amount }}</td>

                                            <td> {{ date('d-m-Y', $c->due_date) }}</td>

                                            <td class="ptup">
                                                @if ($c->status == 'pending')
                                                    <!--  -->
                                                    <?php
                                                    $date = Carbon::now();
                                                    $current_date = strtotime($date);
                                                    $student_due_date = $c->due_date;
                                                    ?>
                                                    @if ($current_date > $student_due_date)
                                                        <a href="{{ asset('user_show_payment?student_id_not_paid=' . $c->id) }}"
                                                            type="button" class="btn btn-danger hozonenot"
                                                            {{-- style="margin-bottom: 14px;" --}}
                                                            >Due Date Have Passed</a>
                                                    @else
                                                        <a href="{{ asset('user_show_payment?student_id_not_paid=' . $c->id) }}"
                                                            type="button" class="btn btn-danger hozonenot"
                                                            {{-- style="margin-bottom: 14px;" --}}
                                                            >Not Paid</a>
                                                    @endif
                                                    <!--  -->
                                                @else
                                                    <a type="button" class="btn btn-success hozone" 
                                                    {{-- style="margin-bottom: 14px;" --}}
                                                    >
                                                        Paid</a>
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
