<?php

namespace App\Repositories;

use App\Http\Requests\AdminHomesectionSettingRequest;
use App\Interfaces\AdminHomeSectionRepositoryInterface;
use App\Models\HomeSectionSetting;
use App\Models\Language;

class AdminHomeSectionRepository implements AdminHomeSectionRepositoryInterface
{
    public function index()
    {
        try {
            $languages = Language::all();
            return view('dashboard.pages.home-section-setting.index', compact('languages'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function update(AdminHomesectionSettingRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            HomeSectionSetting::updateOrCreate([
                'language' => $request->language,
                'category_section_one' => $request->category_section_one,
                'category_section_two' => $request->category_section_two,
                'category_section_three' => $request->category_section_three,
                'category_section_four' => $request->category_section_four,
            ]);

            toast('Updated successfully', 'success')->width('400px');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }
}
