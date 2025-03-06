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
        return $this->category->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->category->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateCategoryRequest $request, string $id)
    {
        return $this->category->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->category->destroy($id);
    }
}
