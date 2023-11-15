@extends('Backend.layouts.master')
@section('page_title','Post')
@section('page_sub_title','Create')
@section('cart')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create Post</h4>
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
                        {!! Form::open(['route' => 'post.store', 'method' => 'post']) !!}
                        @include('Backend.modules.post.form')

                        {!! Form::button('Create Post', ['type'=>'submit', 'class' => 'form-control btn btn-outline-info btn-md mt-3']) !!}
                        {!! Form::close() !!}   
                        <a href="{{route('post.index')}}"><button class=" btn btn-primary btn-sm mt-2">Back</button> </a>                

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