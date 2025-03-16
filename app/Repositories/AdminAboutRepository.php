<?php

namespace App\Repositories;

use App\Interfaces\AdminAboutRepositoryInterface;
use App\Models\About;
use App\Models\Language;
use Illuminate\Http\Request;

class AdminAboutRepository implements AdminAboutRepositoryInterface
{
    public function index()
    {
        $languages = Language::all();

        return view('dashboard.pages.about.about', compact('languages'));
    }

    public function update($request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        About::updateOrCreate(
            [
                'language' => $request->language
            ],
            [
                'content' => $request->content,
            ]
        );

        toast('updated successfully', 'success')->width('400px');

        return redirect()->back();
    }
}
