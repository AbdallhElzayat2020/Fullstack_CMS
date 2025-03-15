<?php

namespace App\Repositories;

use App\Http\Requests\AdminStoreSocialCount;
use App\Interfaces\AdminSocialCountRepositoryInterface;
use App\Models\Language;
use App\Models\SocialCount;
use Illuminate\Http\Request;

class AdminSocialCountRepository implements AdminSocialCountRepositoryInterface
{
    public function index()
    {
        try {
            $languages = Language::where('status', 'active')->get();
            return view('dashboard.pages.social-count.index', compact('languages'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $languages = Language::where('status', 'active')->get();
            return view('dashboard.pages.social-count.create', compact('languages'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function store(AdminStoreSocialCount $request)
    {
        try {
            $socialCount = new SocialCount();
            $socialCount->language = $request->language;
            $socialCount->name = $request->name;
            $socialCount->icon = $request->icon;
            $socialCount->fan_count = $request->fan_count;
            $socialCount->fan_type = $request->fan_type;
            $socialCount->url = $request->url;
            $socialCount->button_text = $request->button_text;
            $socialCount->color = $request->color;
            $socialCount->status = $request->status;
            $socialCount->save();
            toast('Created successfully', 'success')->width('400px');
            return to_route('admin.social-count.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function edit(string $id)
    {
        try {
            $socialCount = SocialCount::findOrFail($id);
            $languages = Language::all();
            return view('dashboard.pages.social-count.edit', compact('socialCount', 'languages'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $socialCount = SocialCount::findOrFail($id);
            $socialCount->language = $request->language;
            $socialCount->name = $request->name;
            $socialCount->icon = $request->icon;
            $socialCount->fan_count = $request->fan_count;
            $socialCount->fan_type = $request->fan_type;
            $socialCount->url = $request->url;
            $socialCount->button_text = $request->button_text;
            $socialCount->color = $request->color;
            $socialCount->status = $request->status;
            $socialCount->save();
            toast('Created successfully', 'success')->width('400px');
            return to_route('admin.social-count.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $link = SocialCount::findOrFail($id);
            $link->delete();

            return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }

    }
}
