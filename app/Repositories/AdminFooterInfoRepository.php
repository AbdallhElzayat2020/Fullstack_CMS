<?php

namespace App\Repositories;

use App\Interfaces\AdminFooterInfoRepositoryInterface;
use App\Models\AdminFooterInfo;
use App\Models\Language;
use App\Traits\FileUploadTrait;
use Symfony\Contracts\Translation\TranslatorTrait;

class AdminFooterInfoRepository implements AdminFooterInfoRepositoryInterface
{
    use FileUploadTrait;

    public function index()
    {
        try {
            $languages = Language::where('status', 'active')->get();
            $footerInfo = AdminFooterInfo::all();
            return view('dashboard.pages.footerInfo.index', compact('languages', 'footerInfo'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function store($request)
    {
        try {
            $request->validate([
                'logo' => ['nullable', 'image', 'max:3000'],
                'description' => ['required', 'string', 'max:300'],
                'copyright' => ['required', 'string', 'max:255'],
            ]);

            $footerInfo = AdminFooterInfo::where('language', $request->language)->first();

            $imagePath = $this->handleFileUpload($request, 'logo', !empty($footerInfo->logo) ? $footerInfo->logo : '');
            AdminFooterInfo::updateOrCreate([
                'language' => $request->language,
            ], [
                'logo' => !empty($imagePath) ? $imagePath : $footerInfo->logo,
                'description' => $request->description,
                'copyright' => $request->copyright,
            ]);
            toast('Updated successfully', 'success')->width('400px');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

    }
}
