<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLanguageStoreRequest;
use App\Http\Requests\AdminLanguageUpdateRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('dashboard.pages.Language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.Language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLanguageStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $language = new Language();
        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->status = $request->status;
        $language->default = $request->default;
        $language->save();
        toast('Created successfully', 'success')->width('400px');
        return to_route('admin.language.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $language = Language::findOrFail($id);
        return view('dashboard.pages.Language.edit', compact('language'));
    }


    public function show()
    {
        dd('from show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminLanguageUpdateRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $language = Language::findOrFail($id);
        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->status = $request->status;
        $language->default = $request->default;
        $language->save();
        toast('Updated successfully', 'success')->width('400px');
        return to_route('admin.language.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $language = Language::findOrFail($id);
            $language->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }


    }
}
