<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable | string',
        ]);
        category::create($validated);
        return redirect()->route('admin.categories.index')->with('success' , 'category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories=category::find($id);
        return redirect('dashboard.category.show',compact('categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::find($id);
        return view ('dashboard.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=category::findOrFail($id);
        $category->update($request->validate(['name'=>'required',
        'description'=>'nullable'|'string']));
        return redirect()->route('admin.category.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','Category deleted');
    }
}
