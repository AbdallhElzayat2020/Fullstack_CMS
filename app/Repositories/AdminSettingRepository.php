<?php

namespace App\Repositories;

use App\Interfaces\AdminSettingRepositoryInterface;
use App\Models\Setting;
use App\Traits\FileUploadTrait;

class AdminSettingRepository implements AdminSettingRepositoryInterface
{
    use FileUploadTrait;

    public function index()
    {
        return view('dashboard.pages.setting.index');
    }

    public function updateGeneralSetting($request): \Illuminate\Http\RedirectResponse
    {

        $logoPath = $this->handleFileUpload($request, 'site_logo');

        $faviconPath = $this->handleFileUpload($request, 'site_favicon');

        Setting::updateOrCreate(
            ['key' => 'site_name'],
            ['value' => $request->site_name]
        );

        if (!empty($logoPath)) {
            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $logoPath]
            );
        }

        if (!empty($faviconPath)) {
            Setting::updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => $faviconPath]
            );
        }

        toast(__('updated successfully'), 'success');

        return redirect()->back();
    }

    public function updateSeoSetting($request): \Illuminate\Http\RedirectResponse
    {

        Setting::updateOrCreate(
            ['key' => 'site_seo_title'],
            ['value' => $request->site_seo_title]
        );

        Setting::updateOrCreate(
            ['key' => 'site_seo_description'],
            ['value' => $request->site_seo_description]
        );

        Setting::updateOrCreate(
            ['key' => 'site_seo_keywords'],
            ['value' => $request->site_seo_keywords]
        );

        toast(__('updated successfully'), 'success');

        return redirect()->back();

    }

    public function updateAppearanceSetting($request)
    {
        $request->validate([
            'site_color' => ['required', 'max:50'],
        ]);

        Setting::updateOrCreate(
            ['key' => 'site_color'],
            ['value' => $request->site_color]
        );

        toast(__('updated successfully'), 'success');

        return redirect()->back();
    }
}
