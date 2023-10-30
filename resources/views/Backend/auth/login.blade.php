@extends('Backend.auth.layouts.master')
@section('page_title','Login')
@section('content')

{!! Form::open(['url' => '#', 'method' => 'post']) !!}
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}

    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}

    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}




@endsection