<?php

namespace App\Repositories;

use App\Interfaces\AdminSocialLInkRepositoryInterface;
use App\Models\FooterSocial;

class AdminSocialLInkRepository implements AdminSocialLInkRepositoryInterface
{
    public function index()
    {
        $socialLInks = FooterSocial::all();
        return view('dashboard.pages.social-links.index', compact('socialLInks'));
    }

    public function create()
    {
        return view('dashboard.pages.social-links.create');
    }

    public function store($request)
    {
        $social = new  FooterSocial();
        $social->url = $request->url;
        $social->icon = $request->icon;
        $social->status = $request->status;
        $social->save();
        toast('Created successfully', 'success')->width('400px');
        return to_route('admin.social-link.index');
    }

    public function edit($id)
    {
        $socialLink = FooterSocial::findOrFail($id);
        return view('dashboard.pages.social-links.edit', compact('socialLink'));
    }

    public function update($request, $id)
    {
        $socialLink = FooterSocial::findOrFail($id);
        $socialLink->url = $request->url;
        $socialLink->icon = $request->icon;
        $socialLink->status = $request->status;
        $socialLink->save();
        toast('Updated successfully', 'success')->width('400px');
        return to_route('admin.social-link.index');
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
