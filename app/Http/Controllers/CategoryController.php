<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('order_by')->get();
        return view("Backend.modules.category.index", compact("categories"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.modules.category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|min:3|max:255',
            'slug'=> 'required|min:3|max:255|unique:categories',
            'order_by'=> 'required|numeric',
            'status'=> 'required'
            ]);

      $category_data= $request->all();
      $category_data['slug']= Str::slug($request->input('slug'));

      category::create($category_data);
      session()->flash('cls','Success');
      session()->flash('msg','Category created successfully');
      return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
    }
}
