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
        {!! Form::model($teacher,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['teacher.update', $teacher->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['teacher.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.teacher.partial.form')
    {!!Form::close()!!}


    <div class="col-md-5 pull-left">
        <div class="form-group text-center">
            <div>
                {!! Form::open(['method' => 'get', 'route' => ['teacher.index']]) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
{!!Form::close()!!}




