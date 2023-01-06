<?php
if($control == 'edit'){
    $heading = 'Edit';
}
else{
    $heading = 'Add Category';
}
?>
@extends('layouts.default_edit')
@section('heading')
    {!! $heading !!}
@endsection
@section('leftsideform')

    @if($control == 'edit')
        {!! Form::model($category,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['category.update', $category->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['category.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.category.partial.form')
    {!!Form::close()!!}


    <div class="col-md-5 pull-left">
        <div class="form-group text-center">
            <div>
                {!! Form::open(['method' => 'get', 'route' => ['category.index']]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
{!!Form::close()!!}




