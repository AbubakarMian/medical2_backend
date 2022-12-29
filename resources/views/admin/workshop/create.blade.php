<?php
if($control == 'edit'){
    $heading = 'Edit';
}
else{
    $heading = 'Add  Workshop';
}
?>
@extends('layouts.default_edit')
@section('heading')
    {!! $heading !!}
@endsection
@section('leftsideform')

    @if($control == 'edit')
        {!! Form::model($workshop,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['workshop.update', $workshop->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['workshop.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.workshop.partial.form')
    {!!Form::close()!!}


    <div class="col-md-5 pull-left">
        <div class="form-group text-center">
            <div>
                {!! Form::open(['method' => 'get', 'route' => ['workshop.index']]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
{!!Form::close()!!}




