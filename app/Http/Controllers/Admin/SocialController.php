<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSocialCount;
use App\Interfaces\AdminSocialCountRepositoryInterface;
use App\Models\Language;
use App\Models\SocialCount;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $social;

    public function __construct(AdminSocialCountRepositoryInterface $social)
    {
        $this->social = $social;
    }

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
    public function store(AdminStoreSocialCount $request)
    {
        return $this->social->store($request);
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
    public function update(Request $request, string $id)
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
