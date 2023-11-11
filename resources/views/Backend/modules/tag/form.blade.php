    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['id'=>'name','class' => 'form-control','placeholder'=>'Enter category name here..']) !!}
    {!! Form::label('slug', 'Slug',['class' =>'mt-2']) !!}
    {!! Form::text('slug', null, ['id'=>'slug','class' => 'form-control','placeholder'=>'Enter slug name here..']) !!}
    {!! Form::label('order_by', 'Category Serial',['class' =>'mt-2']) !!}
    {!! Form::number('order_by', null, ['class' => 'form-control','placeholder'=>'Enter slug name here..']) !!}
    {!! Form::label('status', 'Category Status',['class' =>'mt-2']) !!}
    {!! Form::select('status', [1=>'Active',2=>'Inactive'],null, ['class' => 'form-control','placeholder'=>'Select']) !!}