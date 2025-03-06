<?php

namespace App\Interfaces;

use App\Http\Requests\AdminStoreCategoryRequest;
use App\Http\Requests\AdminUpdateCategoryRequest;
use Illuminate\Http\Request;

interface AdminCategoriesRepositoryInterface
{
    public function index();

    public function create();

    public function store(AdminStoreCategoryRequest $request);

    public function edit(string $id);

    public function update(AdminUpdateCategoryRequest $request, string $id);

    public function destroy(string $id);
}
