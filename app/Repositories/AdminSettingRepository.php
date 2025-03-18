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
}
