<?php

namespace App\Interfaces;

use App\Http\Requests\AdminStoreSocialCount;
use Illuminate\Http\Request;

interface AdminSocialCountRepositoryInterface
{
    public function index();
    public function create();
    public function store(AdminStoreSocialCount $request);
    public function edit(string $id);
    public function update(Request $request, string $id);
    public function destroy(string $id);
}
