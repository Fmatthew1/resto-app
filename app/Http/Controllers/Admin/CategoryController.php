<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }


    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required | unique:categories,name',
            'description'=> 'required'
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('public/categories');
        }
       

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image ?? null
        ]);

        return to_route('admin.categories.index')->with('success','Category created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {   
        $request->validate([
            'name' => [
                'required',
                Rule::unique('categories')->ignore($category->id),
            ],
            'description'=> 'required'
        ]);
        $image = $category->image;
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/categories');
        }

        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$image
        ]);
         return to_route('admin.categories.index')->with('success','Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();

        return to_route('admin.categories.index')->with('danger','Category deleted successfully'); 
    }
}
