    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['id'=>'title','class' => 'form-control','placeholder'=>'Enter Post title here..']) !!}
    {!! Form::label('slug', 'Slug',['class' =>'mt-2']) !!}
    {!! Form::text('slug', null, ['id'=>'slug','class' => 'form-control','placeholder'=>'Enter slug name here..']) !!}    
    {!! Form::label('status', 'Post Status',['class' =>'mt-2']) !!}
    {!! Form::select('status', [1=>'Active',2=>'Inactive'],null, ['class' => 'form-control','placeholder'=>'Select']) !!}

    <div class="row">
        <div class="col-md-6">
         {!! Form::label('category_id', 'Select Category',['class' =>'mt-2']) !!}
         {!! Form::select('category_id', $Categories, null,['id'=>'category_id','class' =>'form-select','placeholder'=>'Select Category']) !!}
        </div>

        <div class="col-md-6">
         {!! Form::label('sub_category_id', 'Select Sub Category',['class' =>'mt-2']) !!}
         {!! Form::select('sub_category_id', $sub_Categories, null,['class' =>'form-select','placeholder'=>'Select Sub Category']) !!}
        </div>

    </div>

    @push('js')
        <script>
            $('#category_id').on('change', function () {
                let category_id = $(this).val()
                console.log(category_id)
            })
        </script>
    @endpush