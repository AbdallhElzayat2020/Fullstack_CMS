<?php

namespace App\Interfaces;

use App\Http\Requests\AdminProfileUpdateRequest;
use App\Http\Requests\AdminUpdatePasswordRequest;

interface AdminProfileRepositoryInterface
{
    public function index();
    public function update(AdminProfileUpdateRequest $request, string $id);
    public function updatePassword(AdminUpdatePasswordRequest $request, string $id);
}
