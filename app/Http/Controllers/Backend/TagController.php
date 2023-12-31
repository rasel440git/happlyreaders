<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy('order_by')->get();
        return view("Backend.modules.tag.index", compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.modules.tag.create");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|min:3|max:255',
            'slug'=> 'required|min:3|max:255|unique:tags',
            'order_by'=> 'required|numeric',
            'status'=> 'required'
            ]);

      $Tag_data= $request->all();
      $Tag_data['slug']= Str::slug($request->input('slug'));

      Tag::create($Tag_data);
      session()->flash('cls','success');
      session()->flash('msg','Tag created successfully');
      return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view("Backend.modules.tag.show", compact("tag"));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view("Backend.modules.tag.edit", compact("tag"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name'=> 'required|min:3|max:255',
            'slug'=> 'required|min:3|max:255|unique:tags,slug,'.$tag->id,
            'order_by'=> 'required|numeric',
            'status'=> 'required'
            ]);

      $tag_data= $request->all();
      $tag_data['slug']= Str::slug($request->input('slug'));

      $tag->update($tag_data);
      session()->flash('cls','info');
      session()->flash('msg','Tag Updated successfully');
      return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('cls','error');
        session()->flash('msg','Tag Deleted successfully');
      return redirect()->route('tag.index');
    }
}
