<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterStoreGridOneRequest;
use App\Interfaces\AdminFooterRepositoryGridOneInterface;
use App\Interfaces\AdminFooterRepositoryGridThreeInterface;
use Illuminate\Http\Request;

class FooterGridThreeController extends Controller
{
    public $gridThree;

    public function __construct(AdminFooterRepositoryGridThreeInterface $gridThree)
    {
        $this->gridThree = $gridThree;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->gridThree->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->gridThree->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FooterStoreGridOneRequest $request)
    {
        return $this->gridThree->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->gridThree->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FooterStoreGridOneRequest $request, string $id)
    {
        return $this->gridThree->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->gridThree->destroy($id);
    }
}
