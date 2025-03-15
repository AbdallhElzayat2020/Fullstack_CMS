<?php

namespace App\Repositories;

use App\Http\Requests\AdminStoreCategoryRequest;
use App\Http\Requests\AdminUpdateCategoryRequest;
use App\Interfaces\AdminCategoriesRepositoryInterface;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoriesRepository implements AdminCategoriesRepositoryInterface
{

    public function index()
    {
//        $categories = Category::all();
        try {
            $languages = Language::all();
            return view('dashboard.pages.Category.index', compact('languages'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $languages = Language::all();
            return view('dashboard.pages.Category.create', compact('languages'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function store(AdminStoreCategoryRequest $request)
    {
        try {
            $category = new Category();

            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->language = $request->language;
            $category->show_at_nav = $request->show_at_nav;
            $category->status = $request->status;
            $category->save();

            toast('Created successfully', 'success')->width('400px');

            return to_route('admin.categories.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function edit(string $id)
    {
        try {
            $languages = Language::all();
            $category = Category::findOrFail($id);
            return view('dashboard.pages.Category.edit', compact('category', 'languages'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function update(AdminUpdateCategoryRequest $request, string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->language = $request->language;
            $category->show_at_nav = $request->show_at_nav;
            $category->status = $request->status;
            $category->save();
            toast('Updated successfully', 'success')->width('400px');
            return to_route('admin.categories.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

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
