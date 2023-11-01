@extends('Backend.auth.layouts.master')
@section('page_title','Forget Password')
@section('content')

{!! Form::open(['route' => 'password.email', 'method' => 'post']) !!}
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    @error('email')
        <p class="text-danger">{{$message}}.</br></p>
    @enderror

    
    

    {!! Form::submit('Reset Password', ['type'=>'submit', 'class' => 'form-control btn btn-outline-info btn-md mt-3']) !!}
{!! Form::close() !!}
    <p class="mt-2">Login?<a href="{{route('login')}}"> Click here?</a></p>
    <p>Not a member yet?<a href="{{route('register')}}"> Register here..</a></p>




@endsection