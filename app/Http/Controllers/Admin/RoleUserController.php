<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRoleUserStoreRequest;
use App\Http\Requests\AdminRoleUserUpdateRequest;
use App\Interfaces\RoleUserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class RoleUserController extends Controller
{
    public $adminUser;

    public function __construct(RoleUserRepositoryInterface $adminUser)
    {
        $this->adminUser = $adminUser;
    }


    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('access management show', 'admin'), only: ['index']),
            new Middleware(PermissionMiddleware::using('access management create', 'admin'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('access management update', 'admin'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('access management delete', 'admin'), only: ['destroy']),
        ];
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
        return $this->adminUser->edit($id);
    }

    public function update(AdminRoleUserUpdateRequest $request, string $id)
    {
        return $this->adminUser->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->adminUser->destroy($id);
    }
}
