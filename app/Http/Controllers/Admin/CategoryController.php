<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreCategoryRequest;
use App\Http\Requests\AdminUpdateCategoryRequest;
use App\Interfaces\AdminCategoriesRepositoryInterface;

//use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class CategoryController extends Controller implements HasMiddleware
{


    public $category;

    public function __construct(AdminCategoriesRepositoryInterface $category)
    {
        $this->category = $category;

    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('category show', 'admin'), only: ['index']),
            new Middleware(PermissionMiddleware::using('category create', 'admin'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('category edit', 'admin'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('category delete', 'admin'), only: ['destroy']),
        ];
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
