@extends('Backend.auth.layouts.master')
@section('page_title','Register')
@section('content')

{!! Form::open(['route' => 'register', 'method' => 'post']) !!}
    @csrf
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}

    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}

    {!! Form::label('password_confirmation', 'Confirm Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

    {!! Form::submit('Submit', ['type'=>'submit', 'class' => 'form-control btn btn-outline-info btn-md mt-3']) !!}
{!! Form::close() !!}
    <p class="mt-2">Forget Password?<a href="{{route('password.request')}}"> Reset here?</a></p>
    <p>Already a member?<a href="{{route('login')}}"> Login here..</a></p>




@endsection