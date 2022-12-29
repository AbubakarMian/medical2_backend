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
    {!! $heading  !!} Group
@endsection
@section('leftsideform')
    @if($control == 'edit')
        {!! Form::model($group,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['group.update', $group->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['group.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.group.partial.form')
    {!!Form::close()!!}


    <div class="col-md-5 pull-left">
        <div class="form-group text-center">
            <div>
                {!! Form::open(['method' => 'get', 'url' => ['admin/group']]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
{!!Form::close()!!}




