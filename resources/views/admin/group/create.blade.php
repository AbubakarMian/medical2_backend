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
@section('completeform')
    @if($control == 'edit')
        {!! Form::model($group,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['group.update', $group->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['group.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.group.partial.form')
    {!!Form::close()!!}


@endsection




