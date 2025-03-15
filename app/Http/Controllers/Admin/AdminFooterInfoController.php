<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminFooterInfoRepositoryInterface;
use Illuminate\Http\Request;

class AdminFooterInfoController extends Controller
{
    public $footerInfo;

    public function __construct(AdminFooterInfoRepositoryInterface $footerInfo)
    {
        $this->footerInfo = $footerInfo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->footerInfo->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->footerInfo->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->footerInfo->store($request);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->footerInfo->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->footerInfo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->footerInfo->destroy($id);
    }
}
