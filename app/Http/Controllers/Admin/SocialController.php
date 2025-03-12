<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSocialCount;
use App\Models\Language;
use App\Models\SocialCount;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('dashboard.pages.social-count.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('dashboard.pages.social-count.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $socialCount = SocialCount::findOrFail($id);
        $languages = Language::all();
        return view('dashboard.pages.social-count.edit', compact('socialCount', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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
