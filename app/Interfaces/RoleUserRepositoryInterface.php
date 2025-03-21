<?php

namespace App\Interfaces;

interface RoleUserRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
}
