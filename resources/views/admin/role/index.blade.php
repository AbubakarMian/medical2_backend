@extends('layouts.default_module')
@section('module_name')
    Roles
@stop

@section('add_btn')
    {!! Form::open(['method' => 'get', 'route' => ['role.create'], 'files' => true]) !!}
    <span>{!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}</span>
    {!! Form::close() !!}
@stop

@section('table-properties')
    width="400px" style="table-layout:fixed;"
@endsection




