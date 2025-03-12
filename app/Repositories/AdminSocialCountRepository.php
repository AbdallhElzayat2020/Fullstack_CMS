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
        $languages = Language::all();
        return view('dashboard.pages.social-count.index', compact('languages'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('dashboard.pages.social-count.create', compact('languages'));
    }

    public function store(AdminStoreSocialCount $request)
    {
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
    }

    public function edit(string $id)
    {
        $socialCount = SocialCount::findOrFail($id);
        $languages = Language::all();
        return view('dashboard.pages.social-count.edit', compact('socialCount', 'languages'));
    }

    public function update(Request $request, string $id)
    {
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
