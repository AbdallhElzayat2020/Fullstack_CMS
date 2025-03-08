<?php

namespace App\Interfaces;

use App\Http\Requests\AdminStoreNewsRequest;
use App\Http\Requests\AdminUpdateNewsRequest;
use Illuminate\Http\Request;

interface AdminNewsRepositoryInterface
{
    public function index();

    public function fetchCategory(Request $request);
    public function create();

    public function store(AdminStoreNewsRequest $request);

    public function edit($id);

    public function update(AdminUpdateNewsRequest $request, $id);

    public function destroy($id);
}
