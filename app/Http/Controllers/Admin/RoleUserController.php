<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRoleUserStoreRequest;
use App\Interfaces\RoleUserRepositoryInterface;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public $adminUser;

    public function __construct(RoleUserRepositoryInterface $adminUser)
    {
        $this->adminUser = $adminUser;
    }


    public function index()
    {
        return $this->adminUser->index();
    }


    public function create()
    {
        return $this->adminUser->create();
    }

    public function store(AdminRoleUserStoreRequest $request)
    {
        return $this->adminUser->store($request);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
