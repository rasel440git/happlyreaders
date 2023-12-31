@extends('Backend.layouts.master')
@section('page_title','Tag')
@section('page_sub_title','Edit')
@section('cart')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Tag</h4>
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
                        {!! Form::model($tag, ['route' => ['tag.update', $tag->id], 'method' => 'put']) !!}
                        @include('Backend.modules.tag.form')

                        {!! Form::button('Update tag', ['type'=>'submit', 'class' => 'form-control btn btn-outline-info btn-md mt-3']) !!}                       
                        {!! Form::close() !!}    
                        <a href="{{route('tag.index')}}"><button class=" btn btn-primary btn-sm mt-2">Back</button> </a>                
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