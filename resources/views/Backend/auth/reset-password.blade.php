@extends('Backend.auth.layouts.master')
@section('page_title','Reset Password')
@section('content')

{!! Form::open(['route' => 'password.store', 'method' => 'post']) !!}
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', $request->email, ['class' => 'form-control']) !!}

    <!-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> -->
    {!! Form::hidden('token', $request->route('token')) !!}

    
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}

    {!! Form::label('password_confirmation', 'Confirm Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

    @error('email')
        <p class="text-danger">{{$message}}.</br></p>
    @enderror    
    

    {!! Form::submit('Update Password', ['type'=>'submit', 'class' => 'form-control btn btn-outline-info btn-md mt-3']) !!}
{!! Form::close() !!}
    <p class="mt-2">Login?<a href="{{route('login')}}"> Click here?</a></p>




@endsection