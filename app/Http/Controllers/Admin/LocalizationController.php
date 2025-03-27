<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

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

    public function extractLocalizationString(Request $request)
    {
        $directory = $request->directory;
        $language_code = $request->language_code;

        if (!is_dir($directory)) {
            return response()->json(['error' => 'المجلد غير موجود'], 400);
        }

        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, \FilesystemIterator::SKIP_DOTS));

        $localizationString = [];
    }
}
