@extends('Backend.auth.layouts.master')
@section('page_title','Login')
@section('content')

{!! Form::open(['route' => 'login', 'method' => 'post']) !!}
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    @error('email')
        <p class="text-danger">{{$message}}.</br></p>
    @enderror

    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    

    {!! Form::submit('Login', ['type'=>'submit', 'class' => 'form-control btn btn-outline-info btn-md mt-3']) !!}
{!! Form::close() !!}
    <p class="mt-2">Forget Password?<a href="{{route('password.request')}}"> Click here?</a></p>
    <p>Not a member yet?<a href="{{route('register')}}"> Register here..</a></p>




@endsection