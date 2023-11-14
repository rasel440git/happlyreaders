@extends('Backend.layouts.master')
@section('page_title','Tag')
@section('page_sub_title','List')
@section('cart')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between" class="">
                         <h4 class="mb-0">Tag List</h4>
                         <a href="{{route('tag.create')}}"> <button class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i>Add</button> </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- @if (session('msg'))
                        <div class="alert alert-{{session('cls')}}">
                            {!! session('msg') !!}
                        </div>
                        
                    @endif -->

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Order By</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                          
                        </thead>

                        <tbody>
                            @php $sl=1 @endphp
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->slug}}</td>
                                <td>{{$tag->status == 1?'Active':'Inactive'}}</td>
                                <td>{{$tag->order_by}}</td>
                                <td>{{$tag->created_at->toDayDateTimeString()}}</td>
                                <td>{{$tag->created_at !=$tag->updated_at ? $tag->updated_at->toDayDateTimeString(): 'not updated'}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('tag.show', $tag->id)}}"><button class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button> </a>
                                        <a href="{{route('tag.edit', $tag->id)}}"><button class="btn btn-warning btn-sm mx-1"><i class="fa-solid fa-edit"></i></button> </a>
                                        {!! Form::open(['method'=>'delete', 'id'=>'form_'.$tag->id,'route'=>['tag.destroy', $tag->id]]) !!}
                                        {!! Form::button('<i class="fa-solid fa-trash"></i>', ['type'=>'button', 'data-id'=>$tag->id, 'class'=>'delete btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                   
                                </td>                       
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                
            </div>
        </div>         
    </div>


    @if (session('msg'))
       
        @push('js')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon:'{{session('cls')}}',
                    toast:true,
                    title: '{{session('msg')}}',
                    showConfirmButton: false,
                    timer: 2500
                    });
            </script>
            
        @endpush
                        
    @endif

    @push('js')
        <script>
            $('.delete').on('click', function () {
                let id= $(this).attr('data-id')
                // console.log(id)
            

            Swal.fire({
                title: "Are you sure to delete?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#form_${id}`).submit()
                    // $('#form_'+id).submit()

                    
                }
            })
        })  


        

        </script>
    @endpush
   

@endsection