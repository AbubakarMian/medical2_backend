@extends('layouts.default_module')
@section('module_name')
    Role
@stop
@section('add_btn')

    {!! Form::open(['method' => 'get', 'route' => ['role.create'], 'files' => true]) !!}
    <span>{!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}</span>
    {!! Form::close() !!}
@stop

@section('table-properties')
    width="400px" style="table-layout:fixed;"
@endsection


<style>
    td {
        white-space: nowrap;
        overflow: hidden;
        width: 30px;
        height: 30px;
        text-overflow: ellipsis;
    }
</style>
@section('table')


    <thead>
        <tr>


            <th> Name</th>
          

            <!-- <th>Edit </th>
            <th>Delete </th> -->



        </tr>
    </thead>
    <tbody>
        @foreach ($role as $c)
            <td>{!! ucwords($c->name) !!} </td>
          

          

          


            </td>
            <!-- <td>
                {!! link_to_action('Admin\RoleController@edit', 'Edit', [$c->id], ['class' => 'badge bg-info']) !!}

            </td>
 -->

          


            </tr>
        @endforeach
    </tbody>
@section('pagination')
    <span class="pagination pagination-md pull-right">{!! $role->render() !!}</span>
    <div class="col-md-3 pull-left">
        <div class="form-group text-center">
            <div>
                {!! Form::open(['method' => 'get', 'route' => ['dashboard']]) !!}
                {!! Form::submit('Cancel', ['class' => 'btn btn-default btn-block btn-lg btn-parsley']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@stop
