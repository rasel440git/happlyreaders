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
                        @include('Backend.modules.category.form')

                        {!! Form::button('Create Category', ['type'=>'submit', 'class' => 'form-control btn btn-outline-info btn-md mt-3']) !!}
                        {!! Form::close() !!}   
                        <a href="{{route('category.index')}}"><button class=" btn btn-primary btn-sm mt-2">Back</button> </a>                

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