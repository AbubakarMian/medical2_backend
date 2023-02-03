@extends('user.layout.header_footer')
@section('content')


<link href="{!!asset('public/theme/user_theme/css/profile_courses.css')!!}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{!!asset('public/theme/user_theme/css/medical2.css')!!}" rel="stylesheet">


<section>
  <div class="corsdetailarea">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="corsdetailareadata"
          {{-- style="border-radius: 34px;" --}}
          >
          <div style="text-align: center;" class="rehedic">
            <h1 style="border-radius: 0px; width: max-content;">Exams Details :</h1>
        </div>
            <?php
// dd( $users[1]->group->exams)
              ?>
            @foreach($users as $key =>$user)
            <h3 class=" " style="text-align: center;
    /* font-size: 15px; */
    font-family: fangsong;
    font-weight: bold;">



              {{ucwords($user->group->name)}}
            </h3>
            <table class="table prtable">
              <thead>
                <tr>



                  <th scope="col">Exam Name</th>
                  <th scope="col">Detail</th>


                </tr>
              </thead>
              <tbody>

              @foreach($user->group_exams  as $g_e)
                <tr>
                  <td scope="row">
              {{ucwords($g_e->exam->name)}}
                  </td>
                  <td scope="row">

                  {{ucwords($g_e->exam->detail)}}
                  </td>

</tr>


  @endforeach

</tbody>
   </table>


            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</section>







@endsection
