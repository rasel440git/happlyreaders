@extends('Backend.layouts.master')
@section('page_title','Category')
@section('page_sub_title','Create')
@section('cart')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create Category</h4>
                </div>
                <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['id'=>'name','class' => 'form-control','placeholder'=>'Enter category name here..']) !!}
                        {!! Form::label('slug', 'Slug',['class' =>'mt-2']) !!}
                        {!! Form::text('slug', null, ['id'=>'slug','class' => 'form-control','placeholder'=>'Enter slug name here..']) !!}
                        {!! Form::label('order_by', 'Category Serial',['class' =>'mt-2']) !!}
                        {!! Form::number('order_by', null, ['class' => 'form-control','placeholder'=>'Enter slug name here..']) !!}
                        {!! Form::label('status', 'Category Status',['class' =>'mt-2']) !!}
                        {!! Form::select('status', [1=>'Active',2=>'Inactive'],null, ['class' => 'form-control','placeholder'=>'Select']) !!}

                        {!! Form::submit('Submit', ['type'=>'submit', 'class' => 'form-control btn btn-outline-info btn-md mt-3']) !!}
                        {!! Form::close() !!}                    
                </div>
                
            </div>
        </div>         
    </div>
    @push('js')
        <script>
            $('#name').on('input', function () {
                let name= $(this).val()
                let slug= name.replaceAll(' ','-')
                $('#slug').val(slug.toLowerCase());
            })
        </script>
    @endpush
   

@endsection