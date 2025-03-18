<?php

namespace App\Interfaces;

interface AdminSettingRepositoryInterface
{
    public function index();

    public function updateGeneralSetting($request);

    public function updateSeoSetting($request);

    public function updateAppearanceSetting($request);
}
