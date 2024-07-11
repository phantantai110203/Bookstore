<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst = Category::all();


        return view('admin.category-index', ['lst' => $lst]);
    }

    //


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category-create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $p = Category::create([
            'name' => $request->name,
            'slug' => '',
            'description' => $request->description,
        ]);


        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category-show', ['p' => $category]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.category-edit', ['p' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $category->fill([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        $category->save();
        return redirect()->route('category.index', ['category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
        //
    }
}