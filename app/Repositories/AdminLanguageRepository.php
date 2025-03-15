<?php

namespace App\Repositories;

use App\Http\Requests\AdminLanguageStoreRequest;
use App\Http\Requests\AdminLanguageUpdateRequest;
use App\Interfaces\AdminLanguageRepositoryInterface;
use App\Models\Language;

class AdminLanguageRepository implements AdminLanguageRepositoryInterface
{

    public function index()
    {
        try {
            $languages = Language::all();
            return view('dashboard.pages.Language.index', compact('languages'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function create()
    {
        try {
            return view('dashboard.pages.Language.create');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function Store(AdminLanguageStoreRequest $request)
    {
        try {
            $language = new Language();
            $language->name = $request->name;
            $language->lang = $request->lang;
            $language->slug = $request->slug;
            $language->status = $request->status;
            $language->default = $request->default;
            $language->save();
            toast('Created successfully', 'success')->width('400px');
            return to_route('admin.language.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function edit(string $id)
    {
        try {
            $language = Language::findOrFail($id);
            return view('dashboard.pages.Language.edit', compact('language'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function update(AdminLanguageUpdateRequest $request, string $id)
    {
        try {
            $language = Language::findOrFail($id);
            $language->name = $request->name;
            $language->lang = $request->lang;
            $language->slug = $request->slug;
            $language->status = $request->status;
            $language->default = $request->default;
            $language->save();
            toast('Updated successfully', 'success')->width('400px');
            return to_route('admin.language.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $language = Language::findOrFail($id);
            if ($language->lang === 'en') {
                return response(['status' => 'error', 'message' => __('can not be deleted')]);
            }
            $language->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }

    }
}
