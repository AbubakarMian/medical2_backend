@extends('layouts.default_module')
@section('module_name')
    Permissions
@stop
{{-- @section('add_btn')

    {!! Form::open(['method' => 'get', 'route' => ['permissions.create'], 'files' => true]) !!}
    <span>{!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}</span>
    {!! Form::close() !!}
@stop --}}


<style>
    td {
        white-space: nowrap;
        overflow: hidden;
        width: 30px;
        height: 30px;
        text-overflow: ellipsis;
    }
</style>
@section('single_file_use')


        @foreach ($permissions as $p)

       <h3> <b><i><td>{!! ucwords($p->heading) !!} </td></i></b></h3>
            <?php $details = json_decode($p->details);?>
            <table width="400px" style="table-layout:fixed;" id="index-table" class="table table-bordered table-striped mg-t editable-datatable">
            <thead>
                <tr>
                    @foreach ( $details as $d)
                    @if(!$d->need_permission)
                        @continue
                    @endif
                        <th >  {!!ucwords($d->heading) !!} <input type="checkbox" name="{!!$p->id!!}" value="{!!$d->heading!!}"></th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>

                @foreach ( [] as $d)
                    @if(!$d->need_permission)
                        @continue
                    @endif
                    <td><input type="checkbox" name="{!!$p->id!!}" value="{!!$d->heading!!}"> </td>
                    {{-- <td >{!!ucwords($d->heading) !!}</td> --}}
                @endforeach

                </tr>
            </tbody>
            </table>

        @endforeach


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

