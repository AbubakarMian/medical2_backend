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
          <div class="corsdetailareadata" style="border-radius: 34px;">
            <h1 style="border-radius: 27px;">Exams Details</h1>

            <table class="table prtable">
              <thead>
                <tr>
                  <th scope="col">Sno</th>
                  <th scope="col">Exam Name</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Group Name</th>
                  <th scope="col">Status</th>
                 
                </tr>
              </thead>
              <tbody>
              
                @foreach($course_register as $key =>$e)
                <tr>
                  <?php
//  dd($e->group->exams)
                  ?>
                  <td scope="row">{{$key+1}}</td>
                  <td scope="row">{{ucwords($e->group->exams->name)}}</td> 
                  <td scope="row">{{ucwords($e->group->courses->full_name)}}</td> 
                  <td scope="row">{{ucwords($e->group->name)}}</td> 
                 
                  <td scope="row">Pending</td>
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