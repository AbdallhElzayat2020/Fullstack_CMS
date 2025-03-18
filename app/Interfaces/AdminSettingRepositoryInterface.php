<?php

namespace App\Interfaces;

interface AdminSettingRepositoryInterface
{
    public function index();

    public function updateGeneralSetting($request);

}
