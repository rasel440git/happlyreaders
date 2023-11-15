@extends('Backend.layouts.master')
@section('page_title','SubCategory')
@section('page_sub_title','Edit')
@section('cart')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Sub-Category</h4>
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
                        {!! Form::model($subCategory, ['route' => ['sub-category.update', $subCategory->id], 'method' => 'put']) !!}
                        @include('Backend.modules.sub-category.form')

                        {!! Form::button('Update SubCategory', ['type'=>'submit', 'class' => 'form-control btn btn-outline-info btn-md mt-3']) !!}                       
                        {!! Form::close() !!}    
                        <a href="{{route('sub-category.index')}}"><button class=" btn btn-primary btn-sm mt-2">Back</button> </a>                
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