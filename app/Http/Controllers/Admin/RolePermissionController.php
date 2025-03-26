<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminRoles_PermissionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class RolePermissionController extends Controller
{
    public $roles;

    public function __construct(AdminRoles_PermissionRepositoryInterface $roles)
    {
        $this->roles = $roles;
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
        return $this->roles->index();
    }

    public function create()
    {
        return $this->roles->create();
    }

    public function store(Request $request)
    {
        return $this->roles->store($request);
    }

    public function edit($id)
    {
        return $this->roles->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->roles->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->roles->destroy($id);
    }
}
