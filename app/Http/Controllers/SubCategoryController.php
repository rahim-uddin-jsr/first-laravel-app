<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCatecoryUpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SubcategoryStoreRequest;
use Brian2694\Toastr\Facades\Toastr;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->get(['id', 'category_id', 'name', 'created_at',]);
        return view('subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        return view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoryStoreRequest $request)
    {
        SubCategory::create([
            'category_id' => $request->selected_category_id,
            'name' => $request->subcategory_name,
            'slug' => Str::slug($request->subcategory_name),
            'is_active' => $request->filled('is_active'),
        ]);
        // dd($request->category_name,$request->category_slug,$request->filled('is_active'));
        Session::flash('status', 'Subcategory created successfully');
        return back();
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
    public function edit(string $id)
    {
        $categories = Category::get(['id', 'name']);
        $selectedSubcategory = SubCategory::find($id);
        return view('subcategory.edit', compact('categories', 'selectedSubcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubcategoryStoreRequest $request, string $id)
    {
        $selectedSubcategory = SubCategory::find($id);
        $selectedSubcategory->update([
            'category_id' => $request->selected_category_id,
            'name' => $request->subcategory_name,
            'slug' => Str::slug($request->subcategory_name),
            'is_active' => $request->filled('is_active'),
        ]);
        // dd($request->category_name,$request->category_slug,$request->filled('is_active'));
        Toastr()->success('Subcategory Updated successfully', 'Updated!', ["positionClass" => "toast-top-right"]);
        // Session::flash('status','Subcategory Updated successfully');
        return redirect()->route('laravel.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubCategory::find($id)->delete();
        Session::flash('status', 'SubCategory deleted successfully!');
        return redirect()->route('laravel.subcategory.index');
    }
}
