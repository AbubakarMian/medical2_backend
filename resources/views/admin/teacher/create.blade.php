<?php
if($control == 'edit'){
    $heading = 'Edit';
}
else{
    $heading = 'Add Teacher';
}
?>
@extends('layouts.default_edit')
@section('heading')
    {!! $heading !!}
@endsection
@section('leftsideform')

    @if($control == 'edit')
        {!! Form::model($teacher,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['teacher.update', $teacher->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['teacher.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.teacher.partial.form')
    {!!Form::close()!!}



@endsection
{!!Form::close()!!}




