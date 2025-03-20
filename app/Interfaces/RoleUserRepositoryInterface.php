<?php

namespace App\Interfaces;

interface RoleUserRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);
}
