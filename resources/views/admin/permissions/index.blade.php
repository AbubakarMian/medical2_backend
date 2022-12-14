@extends('layouts.default_module')
@section('module_name')
    Permissions
@stop
{{-- @section('add_btn')

    {!! Form::open(['method' => 'get', 'route' => ['permissions.create'], 'files' => true]) !!}
    <span>{!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}</span>
    {!! Form::close() !!}
@stop --}}

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


            <th>Permissions</th>
            <th>Can View</th>
            <th>Can Create</th>
            <th>Can Save</th>
            <th>Can Edit</th>
            <th>Can Update</th>
            <th>Can Delete</th>




        </tr>
    </thead>
    <tbody>



        @foreach ($permissions as $b)
            <td>{!! ucwords($b->role->name) !!} </td>
            <td >{!!ucwords($b->can_view) !!}</td>
            <td >{!!ucwords($b->can_create) !!}</td>
            <td >{!!ucwords($b->can_save) !!}</td>
            <td >{!!ucwords($b->can_edit) !!}</td>
            <td >{!!ucwords($b->can_update) !!}</td>
            <td >{!!ucwords($b->can_delete) !!}</td>




            {{-- <td>
            {!! link_to_action('Admin\PermissionsController@edit',
            'Edit', array($b->id), array('class' => 'badge bg-info')) !!}

        </td> --}}


            {{-- <td>{!! Form::open(['method' => 'POST', 'route' => ['permissions.delete', $b->id]]) !!}
			<a href="" data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert" modal_msg="Do you want to delete?">
				<span class="badge bg-info btn-primary ">
					{!! $b->deleted_at?'Activate':'Delete' !!}</span></a>
			{!! Form::close() !!}
		</td> --}}


            </tr>
        @endforeach


    </tbody>
@section('pagination')
    {{-- <span class="pagination pagination-md pull-right">{!! $permissions->render() !!}</span> --}}
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
