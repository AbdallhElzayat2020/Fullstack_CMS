<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function adminIndex()
    {
        $languages = Language::all();
        return view('dashboard.pages.localization.admin-index', compact('languages'));
    }

    public function frontendIndex()
    {
        $languages = Language::all();
        return view('dashboard.pages.localization.frontend-index', compact('languages'));
    }
}
