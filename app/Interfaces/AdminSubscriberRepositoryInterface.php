<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AdminSubscriberRepositoryInterface
{
    public function index();

    public function delete($id);

    public function store(Request $request);

}
