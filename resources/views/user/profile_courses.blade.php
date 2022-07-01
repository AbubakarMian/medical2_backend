@extends('user.layout.header_footer')
@section('content')



<link href="{!!asset('theme/user_theme/css/profile_courses.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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
                                <th scope="col">Group</th>
                                <th scope="col">Teacher</th>
                                <th scope="col">Venu</th>
                                <th scope="col">Timming</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td scope="row">1</td>
                                <td>Science</td>
                                <td>Sir Ali</td>
                                <td>Online</td>
                                <td class="clockli"><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                                {{-- <div class="timebox">
                                    <p>Monday <span class="digtime">12:00pm</span> </p>
                                    <p>Tuesday <span class="digtime">10:00am</span> </p>
                                </div> --}}
                                <td><button type="button" class="btn btn-primary porjoin">Join</button>
                                    <button type="button" class="btn btn-primary pordetai">Detail</button></td>
                              </tr>
                              <tr>
                                <td scope="row">2</td>
                                <td>Science</td>
                                <td>Sir Ali</td>
                                <td>Canada</td>
                                <td class="clockli"><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                                {{-- <div class="timebox">
                                    <p>Monday <span class="digtime">12:00pm</span> </p>
                                    <p>Tuesday <span class="digtime">10:00am</span> </p>
                                </div> --}}
                                <td><button type="button" class="btn btn-primary porjoinn">Join</button>
                                    <button type="button" class="btn btn-primary pordetai">Detail</button></td>
                              </tr>                              
                            </tbody>
                          </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







@endsection

