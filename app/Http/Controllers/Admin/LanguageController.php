<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLanguageStoreRequest;
use App\Http\Requests\AdminLanguageUpdateRequest;
use App\Interfaces\AdminLanguageRepositoryInterface;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $language;

    public function __construct(AdminLanguageRepositoryInterface $language)
    {
        $this->language = $language;
    }

    public function index()
    {
        return $this->language->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->language->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLanguageStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        return $this->language->Store($request);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->language->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminLanguageUpdateRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        return $this->language->update($request, $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->language->destroy($id);
    }
}
