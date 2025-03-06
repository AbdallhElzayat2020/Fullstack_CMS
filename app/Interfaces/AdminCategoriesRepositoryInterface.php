<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AdminCategoriesRepositoryInterface
{
    public function index();
    public function create();

    public function store(Request $request);
}
