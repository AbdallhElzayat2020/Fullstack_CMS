<?php

namespace App\Repositories;

use App\Interfaces\AdminSocialLInkRepositoryInterface;
use App\Models\FooterSocial;

class AdminSocialLInkRepository implements AdminSocialLInkRepositoryInterface
{
    public function index()
    {
        try {
            $socialLInks = FooterSocial::all();
            return view('dashboard.pages.social-links.index', compact('socialLInks'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function create()
    {
        try {
            return view('dashboard.pages.social-links.create');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function store($request)
    {
        try {
            $social = new  FooterSocial();
            $social->url = $request->url;
            $social->icon = $request->icon;
            $social->status = $request->status;
            $social->save();
            toast('Created successfully', 'success')->width('400px');
            return to_route('admin.social-link.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $socialLink = FooterSocial::findOrFail($id);
            return view('dashboard.pages.social-links.edit', compact('socialLink'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $socialLink = FooterSocial::findOrFail($id);
            $socialLink->url = $request->url;
            $socialLink->icon = $request->icon;
            $socialLink->status = $request->status;
            $socialLink->save();
            toast('Updated successfully', 'success')->width('400px');
            return to_route('admin.social-link.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {

        $socialLink = FooterSocial::findOrFail($id);
        $socialLink->delete();

        return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        }catch (\Exception $exception){
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }
    }
}
