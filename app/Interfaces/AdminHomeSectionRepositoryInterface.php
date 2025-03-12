<?php

namespace App\Interfaces;

use App\Http\Requests\AdminHomesectionSettingRequest;

interface AdminHomeSectionRepositoryInterface
{
    public function index();

    public function update(AdminHomesectionSettingRequest $request): \Illuminate\Http\RedirectResponse;
}
