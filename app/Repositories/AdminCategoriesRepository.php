<?php

namespace App\Repositories;

use App\Interfaces\AdminCategoriesRepositoryInterface;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;

class AdminCategoriesRepository implements AdminCategoriesRepositoryInterface
{

    public function index()
    {
//        $categories = Category::all();
        $languages = Language::all();
        return view('dashboard.pages.Category.index', compact('languages'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('dashboard.pages.Category.create', compact('languages'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
