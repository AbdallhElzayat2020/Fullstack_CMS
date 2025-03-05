<?php

namespace App\Interfaces;

use App\Http\Requests\AdminLanguageStoreRequest;
use App\Http\Requests\AdminLanguageUpdateRequest;

interface AdminLanguageRepositoryInterface
{
    public function index();

    public function create();

    public function Store(AdminLanguageStoreRequest $request);

    public function edit(string $id);

    public function update(AdminLanguageUpdateRequest $request, string $id);

    public function destroy(string $id);

}
