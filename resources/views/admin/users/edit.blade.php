@extends('layouts.admin')

@section('content')

<h1>Edit User</h1>

<div class="row">

<div class="col-sm-3">
    <img src="{{$user->photo ? $user->photo->file : '/images/placeholder.jpg' }}" class="img-responsive img-rounded">
</div>

<div class="col-sm-9">

    {!! Form::model($user, ['method'=>'patch', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', $roles , null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        <!--0 znaci da nije aktivan, stavili smo to po difoltu tamo gde je bilo null-->
        {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null , ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save changes', ['class'=>'btn btn-primary col-sm-3 col-sm-offset-3']) !!}
    </div>


    {!! Form::close() !!}
    
     {!! Form::model($user, ['method'=>'delete', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete user !', ['class'=>'btn btn-danger col-sm-3']) !!}
    </div>
     
     {!! Form::close() !!}
    
    
</div> <!--end col-sm-9-->
</div>

<div class="row">
@include('includes.form_error')
</div>

@stop


