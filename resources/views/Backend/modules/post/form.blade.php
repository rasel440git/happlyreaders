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
         <select name="sub_category_id" class ="form-select" id="sub_category_id">
            <option selected="select"> Selcet Sub Category</option>
         </select>
                 
    

        </div>
        </div>
            {!! Form::label('description', 'Description',['class' =>'form-control']) !!}
            {!! Form::textarea('description',  null,['id'=>'description', 'class' =>'form-control']) !!}
            {!! Form::label('tag_id', 'Select Tag',['class' =>'mt-2']) !!}
            <div class="row">
            @foreach ( $tags as $tag)
                <div class="col-md-3">
                {!! Form::checkbox('tag_ids[]', $tag->id, false) !!} <span> {{$tag->name}}</span>

                </div>    
            @endforeach
            <div class="col-md-12 ">
                {!! Form::label('photo', 'Select Photo',['class' =>'mt-2']) !!}
                {!! Form::file('photo', ['class' =>'form-control']) !!}
            </div>
            
            </div>
    @push('css')
        <style>
            .ck.ck-editor__main > .ck-editor__editable:not(.ck-focused){
                min-height: 200px;
            }
            .ck.ck-editor__main > .ck-editor__editable{
                min-height: 300px;
            }
        </style>
    @endpush

    @push('js')
         <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.1/axios.min.js" crossorigin="anonymous"></script>

        <script>

                            ClassicEditor
                                .create( document.querySelector( '#description' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

            $('#category_id').on('change', function () {
                let category_id = $(this).val()
                let sub_category_elements = $('#sub_category_id')
                sub_category_elements.empty()
                sub_category_elements.append('<option selected="select"> Selcet Sub Category</option>')
                axios.get(window.location.origin+'/dashboard/get-subcategory/'+category_id).then(res=>{
                    let sub_categories= res.data
                    sub_categories.map((sub_category, index)=>(
                        sub_category_elements.append(`<option value="${sub_category.id}">${sub_category.name}</option>`)
                    ))

                })
            })


            $('#title').on('input', function () {
                let name= $(this).val()
                let slug= name.replaceAll(' ','-')
                $('#slug').val(slug.toLowerCase());
            })

        </script>
    @endpush