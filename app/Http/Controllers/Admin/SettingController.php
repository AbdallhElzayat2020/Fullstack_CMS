<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateGeneralSetting;
use App\Http\Requests\AdminUpdateSeoSetting;
use App\Interfaces\AdminSettingRepositoryInterface;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    public $setting;

    public function __construct(AdminSettingRepositoryInterface $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        return $this->setting->index();
    }

    public function updateGeneralSetting(AdminUpdateGeneralSetting $request)
    {
        return $this->setting->updateGeneralSetting($request);
    }

    public function updateSeoSetting(AdminUpdateSeoSetting $request)
    {
        return $this->setting->updateSeoSetting($request);
    }

    public function updateAppearanceSetting(Request $request)
    {
        return $this->setting->updateAppearanceSetting($request);
    }
}
