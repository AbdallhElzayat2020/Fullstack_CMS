<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateGeneralSetting;
use App\Http\Requests\AdminUpdateSeoSetting;
use App\Interfaces\AdminSettingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;


class SettingController extends Controller implements HasMiddleware
{
    public $setting;

    public function __construct(AdminSettingRepositoryInterface $setting)
    {
        $this->setting = $setting;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('show setting', 'admin'), only: ['index']),
            new Middleware(PermissionMiddleware::using('update setting', 'admin'), only: ['updateGeneralSetting', 'updateSeoSetting', 'updateAppearanceSetting']),
        ];
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
