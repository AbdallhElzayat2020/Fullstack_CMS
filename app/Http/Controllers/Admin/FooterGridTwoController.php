<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterStoreGridTwoRequest;
use App\Interfaces\AdminFooterRepositoryGridTwoInterface;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class FooterGridTwoController extends Controller implements HasMiddleware
{
    public $gridTwo;

    public function __construct(AdminFooterRepositoryGridTwoInterface $gridTwo)
    {
        $this->gridTwo = $gridTwo;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('footer show', 'admin'), only: ['index']),
            new Middleware(PermissionMiddleware::using('footer create', 'admin'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('footer update', 'admin'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('footer delete', 'admin'), only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->gridTwo->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->gridTwo->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FooterStoreGridTwoRequest $request)
    {
        return $this->gridTwo->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->gridTwo->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FooterStoreGridTwoRequest $request, string $id)
    {
        return $this->gridTwo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->gridTwo->destroy($id);
    }
}
