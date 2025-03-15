<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterStoreGridOneRequest;
use App\Interfaces\AdminFooterRepositoryGridOneInterface;
use Illuminate\Http\Request;

class FooterGridOneController extends Controller
{
    public $gridOne;

    public function __construct(AdminFooterRepositoryGridOneInterface $gridOne)
    {
        $this->gridOne = $gridOne;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->gridOne->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->gridOne->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FooterStoreGridOneRequest $request)
    {
        return $this->gridOne->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->gridOne->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FooterStoreGridOneRequest $request, string $id)
    {
        return $this->gridOne->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->gridOne->destroy($id);
    }
}
