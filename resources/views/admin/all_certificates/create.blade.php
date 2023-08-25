<?php
if($control == 'edit'){
    $heading = 'Edit';
}
else{
    $heading = 'Add';
}
?>
@extends('layouts.default_edit')
@section('heading')
    {!! $heading !!}
@endsection
@section('completeform')

    @if($control == 'edit')
        {!! Form::model($role,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['role.update', $role->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['role.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.role.partial.form')
    {!!Form::close()!!}
{{-- 

    <div class="col-md-5 pull-left">
        <div class="form-group text-center">
            <div>
                {!! Form::open(['method' => 'get', 'route' => ['role.index']]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div> --}}

@endsection
{!!Form::close()!!}



