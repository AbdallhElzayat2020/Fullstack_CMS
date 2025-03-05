<?php

namespace App\Interfaces;

use App\Http\Requests\AdminLanguageStoreRequest;

interface AdminLanguageRepositoryInterface
{
    public function index();

    public function create();

    public function Store(AdminLanguageStoreRequest $request);
}
