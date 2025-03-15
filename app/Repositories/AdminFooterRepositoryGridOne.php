<?php

namespace App\Repositories;

use App\Interfaces\AdminFooterRepositoryGridOneInterface;
use App\Models\FooterGrid;
use App\Models\Language;

class AdminFooterRepositoryGridOne implements AdminFooterRepositoryGridOneInterface
{
    public function index()
    {
        try {
            $languages = Language::all();
            return view('dashboard.pages.footer-grid-one.index', compact('languages'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $languages = Language::all();
            return view('dashboard.pages.footer-grid-one.create', compact('languages'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function store($request)
    {
        try {
            $footerGridOne = new FooterGrid();
            $footerGridOne->name = $request->name;
            $footerGridOne->language = $request->language;
            $footerGridOne->link = $request->link;
            $footerGridOne->status = $request->status;
            $footerGridOne->save();

            toast('Updated successfully', 'success')->width('400px');
            return to_route('admin.footer-grid-one.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $languages = Language::all();
            $footer = FooterGrid::findOrFail($id);
            return view('dashboard.pages.footer-grid-one.edit', compact('footer', 'languages'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $footerGridOne = FooterGrid::findOrFail($id);
            $footerGridOne->name = $request->name;
            $footerGridOne->language = $request->language;
            $footerGridOne->link = $request->link;
            $footerGridOne->status = $request->status;
            $footerGridOne->save();

            toast('Updated successfully', 'success')->width('400px');
            return to_route('admin.footer-grid-one.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $footerGridOne = FooterGrid::findOrFail($id);
            $footerGridOne->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('can not be deleted')]);
        }
    }
}
