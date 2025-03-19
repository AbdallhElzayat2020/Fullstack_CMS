<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminRoles_PermissionRepositoryInterface;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public $roles;

    public function __construct(AdminRoles_PermissionRepositoryInterface $roles)
    {
        $this->roles = $roles;
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
}
