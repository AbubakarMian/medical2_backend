@extends('layouts.default_module')
@section('module_name')
    Quizes
@stop


@section('table')
  {{-- <div class="ableclick">
        <button type="button" class="btn btn-primary myopen" id="mybutonarea">
            <a href="{{ asset('admin/quiz/excel/'.$couse_id) }}" style="color: #fff"> Excel</a> </button>
        <button type="button" class="btn btn-primary myopen" id="mybutonarea">
            <a href="{{ asset('admin/quiz/csv/'.$couse_id) }}" style="color: #fff">CSV</a> </button>
        <button type="button" class="btn btn-primary myopen" id="mybuttoner"> <a href="{{ asset('admin/quiz/pdf/'. $couse_id) }}"
                style="color: #fff">PDF</a> </button>
    </div> --}}



    <thead>
        <tr>

            <th>
              Name
            </th>
            <th>
                Details
              </th>
              <th>
                List Questions
              </th>











        </tr>
    </thead>
    <tbody>
        @foreach ($quiz as $key => $q)
            <tr class="myarrow myarrow_{{ $q->id }}">

                <td>
                    {{ ucwords($q->name) }}

                </td>

                <td>
                    {{ ucwords($q->detail) }}

                </td>
                <td>
               <a href="{{ url('admin/question_list/' . $q->id) }}" type="button" class="btn btn-primary"
                target="_blank" >Questions </a>
                </td>

                {{-- <td>
                    {!! link_to_action('Admin\QuizController@edit',
                    'Edit', array($q->id), array('class' => 'badge bg-info')) !!}

                </td>

                <td>{!! Form::open(['method' => 'POST', 'route' => ['quiz.delete', $q->id]]) !!}
                    <a href="" data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert" modal_msg="Do you want to delete?">
                        <span class="badge bg-info btn-primary ">
                            {!! $q->deleted_at?'Activate':'Delete' !!}</span></a>
                    {!! Form::close() !!}
                </td> --}}



            </tr>



        @endforeach

    </tbody>





@section('pagination')
    <span class="pagination pagination-md pull-right">{!! $quiz->render() !!}</span>
    <div class="col-md-3 pull-left">
        <div class="form-group text-center">
            <div>
                {!! Form::open(['method' => 'get', 'route' => ['dashboard']]) !!}
                {!! Form::submit('Back', ['class' => 'btn btn-default btn-block btn-lg btn-parsley']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@stop
