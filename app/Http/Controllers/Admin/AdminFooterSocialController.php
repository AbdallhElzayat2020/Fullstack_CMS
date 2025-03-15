<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSocialLinkStoreRequest;
use App\Interfaces\AdminSocialLInkRepositoryInterface;
use Illuminate\Http\Request;

class AdminFooterSocialController extends Controller
{
    public $social;

    public function __construct(AdminSocialLInkRepositoryInterface $social)
    {
        $this->social = $social;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->social->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->social->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminSocialLinkStoreRequest $request)
    {
        return $this->social->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->social->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminSocialLinkStoreRequest $request, string $id)
    {
        return $this->social->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->social->destroy($id);
    }
}
