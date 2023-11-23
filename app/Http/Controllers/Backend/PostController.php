<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Auth;


use App\Models\Post;
use App\Models\category;
use App\Models\Tag;
use App\Models\User;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Categories = category::pluck("name","id");
        $tags = Tag::select("name","id")->get();

        return view("Backend.modules.post.create", compact("Categories","tags"));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $post_Data = $request->except(['tag_ids', 'photo', 'slug']);
        $post_Data['slug'] = Str::slug($request->input('slug')); // Corrected 'str' to 'Str'
        $post_Data['user_id'] = Auth::user()->id; // Corrected 'User' to 'user'
        $post_Data['is_approved'] = 1;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = Str::slug($request->input('slug'));
            $height = 400;
            $width = 1000;
            $thumb_height = 150;
            $thumb_width = 300;
            $path = 'images/post/original/';
            $thumb_path = 'images/post/thumbnail/';

            $post_Data['photo'] = PhotoUploadController::imageUpload($name, $height, $width, $path, $file);
            PhotoUploadController::imageUpload($name, $thumb_height, $thumb_width, $thumb_path, $file); // Corrected 'path' to 'thumb_path'
        }
      
    }
       
        

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
