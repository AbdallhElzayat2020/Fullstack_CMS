<?php

namespace App\Repositories;

use App\Interfaces\AdminFooterRepositoryGridThreeInterface;
use App\Models\FooterGridThree;
use App\Models\Language;

class AdminFooterRepositoryGridThree implements AdminFooterRepositoryGridThreeInterface
{
    public function index()
    {
        try {
            $languages = Language::all();
            return view('dashboard.pages.footer-grid-three.index', compact('languages'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $languages = Language::all();
            return view('dashboard.pages.footer-grid-three.create', compact('languages'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function store($request)
    {
        try {
            $footerGridThree = new FooterGridThree();
            $footerGridThree->name = $request->name;
            $footerGridThree->language = $request->language;
            $footerGridThree->link = $request->link;
            $footerGridThree->status = $request->status;
            $footerGridThree->save();

            toast('Updated successfully', 'success')->width('400px');
            return to_route('admin.footer-grid-three.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $languages = Language::all();
            $footer = FooterGridThree::findOrFail($id);
            return view('dashboard.pages.footer-grid-three.edit', compact('footer', 'languages'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $footerGridThree = FooterGridThree::findOrFail($id);
            $footerGridThree->name = $request->name;
            $footerGridThree->language = $request->language;
            $footerGridThree->link = $request->link;
            $footerGridThree->status = $request->status;
            $footerGridThree->save();

            toast('Updated successfully', 'success')->width('400px');
            return to_route('admin.footer-grid-three.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $footerGridThree = FooterGridThree::findOrFail($id);
            $footerGridThree->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('can not be deleted')]);
        }
    }
}
