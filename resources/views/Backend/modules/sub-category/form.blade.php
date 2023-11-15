    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['id'=>'name','class' => 'form-control','placeholder'=>'Enter Sub Category name here..']) !!}
    {!! Form::label('slug', 'Slug',['class' =>'mt-2']) !!}
    {!! Form::text('slug', null, ['id'=>'slug','class' => 'form-control','placeholder'=>'Enter slug name here..']) !!}
    {!! Form::label('category_id', 'Select Category',['class' =>'mt-2']) !!}
    {!! Form::select('category_id', $Categories, null,['class' =>'form-select','placeholder'=>'Select Category']) !!}
    {!! Form::label('order_by', 'SubCategory Serial',['class' =>'mt-2']) !!}
    {!! Form::number('order_by', null, ['class' => 'form-control','placeholder'=>'Enter slug name here..']) !!}
    {!! Form::label('status', 'SubCategory Status',['class' =>'mt-2']) !!}
    {!! Form::select('status', [1=>'Active',2=>'Inactive'],null, ['class' => 'form-control','placeholder'=>'Select']) !!}