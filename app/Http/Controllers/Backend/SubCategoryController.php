<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\SubCategory;
use App\Models\category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SubCategories = SubCategory::with('category')->orderBy('order_by')->get();
        return view("Backend.modules.sub-category.index", compact("SubCategories"));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Categories = category::pluck('name','id');
        return view("Backend.modules.sub-category.create", compact("Categories"));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|min:3|max:255',
            'slug'=> 'required|min:3|max:255|unique:sub_categories',
            'order_by'=> 'required|numeric',
            'category_id'=> 'required',
            'status'=> 'required'
            ]);

      $SubCategory_data= $request->all();
      $SubCategory_data['slug']= Str::slug($request->input('slug'));

      SubCategory::create($SubCategory_data);
      session()->flash('cls','success');
      session()->flash('msg','Sub Category created successfully');
      return redirect()->route('sub-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        return view("Backend.modules.sub-category.show", compact("subCategory"));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $Categories = category::pluck('name','id');
        return view("Backend.modules.sub-category.edit", compact("subCategory","Categories"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request, [
            'name'=> 'required|min:3|max:255',
            'slug'=> 'required|min:3|max:255|unique:sub_categories,slug,'.$subCategory->id,
            'category_id'=> 'required',
            'order_by'=> 'required|numeric',
            'status'=> 'required'
            ]);

      $SubCategory_data= $request->all();
      $SubCategory_data['slug']= Str::slug($request->input('slug'));

      $subCategory->update($SubCategory_data);
      session()->flash('cls','info');
      session()->flash('msg','Category Updated successfully');
      return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        session()->flash('cls','error');
        session()->flash('msg','Sub-Category Deleted successfully');
      return redirect()->route('sub-category.index');
    }

    public function getSubCategoryByCatetoryId(int $id){
        $subCategory = SubCategory::select('id','name')->where('category_id', $id)->get();
        return response()->json($subCategory);
    }
}
