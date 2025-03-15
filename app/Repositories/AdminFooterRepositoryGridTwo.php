<?php

namespace App\Repositories;

use App\Interfaces\AdminFooterRepositoryGridTwoInterface;
use App\Models\FooterGridTwo;
use App\Models\Language;

class AdminFooterRepositoryGridTwo implements AdminFooterRepositoryGridTwoInterface
{
    public function index()
    {
        try {
            $languages = Language::all();
            return view('dashboard.pages.footer-grid-two.index', compact('languages'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $languages = Language::all();
            return view('dashboard.pages.footer-grid-two.create', compact('languages'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function store($request)
    {
        try {
            $footerGridTwo = new FooterGridTwo();
            $footerGridTwo->name = $request->name;
            $footerGridTwo->language = $request->language;
            $footerGridTwo->link = $request->link;
            $footerGridTwo->status = $request->status;
            $footerGridTwo->save();

            toast('Updated successfully', 'success')->width('400px');
            return to_route('admin.footer-grid-two.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $languages = Language::all();
            $footer = FooterGridTwo::findOrFail($id);
            return view('dashboard.pages.footer-grid-two.edit', compact('footer', 'languages'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $footerGridTwo = FooterGridTwo::findOrFail($id);
            $footerGridTwo->name = $request->name;
            $footerGridTwo->language = $request->language;
            $footerGridTwo->link = $request->link;
            $footerGridTwo->status = $request->status;
            $footerGridTwo->save();

            toast('Updated successfully', 'success')->width('400px');
            return to_route('admin.footer-grid-two.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $footerGridTwo = FooterGridTwo::findOrFail($id);
            $footerGridTwo->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('can not be deleted')]);
        }
    }
}
