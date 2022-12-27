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
@section('leftsideform')

    @if($control == 'edit')
        {!! Form::model($about_us,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['aboutus.update', $about_us->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['employee.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.employee.partial.form')
    {!!Form::close()!!}


@endsection
{!!Form::close()!!}




