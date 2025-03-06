<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreCategoryRequest;
use App\Http\Requests\AdminUpdateCategoryRequest;
use App\Interfaces\AdminCategoriesRepositoryInterface;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $category;

    public function __construct(AdminCategoriesRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return $this->category->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->category->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreCategoryRequest $request)
    {

//        dd($request->all());
        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->language = $request->language;
        $category->show_at_nav = $request->show_at_nav;
        $category->status = $request->status;
        $category->save();

        toast('Created successfully', 'success')->width('400px');

        return to_route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $category = Category::findOrFail($id);
        return view('dashboard.pages.Category.edit', compact('category', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateCategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->language = $request->language;
        $category->show_at_nav = $request->show_at_nav;
        $category->status = $request->status;
        $category->save();
        toast('Updated successfully','success')->width('400px');
        return to_route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }

    }
}
