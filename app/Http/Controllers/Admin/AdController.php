<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAdUpdateRequest;
use App\Models\Ad;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class AdController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $ad = Ad::first();
            return view('dashboard.pages.ads.index', compact('ad'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminAdUpdateRequest $request, string $id)
    {
        try {
            $ad = Ad::first();

            // Handle file uploads with old paths from the existing record
            $home_top_bar_ad = $this->handleFileUpload($request, 'home_top_bar_ad', $ad ? $ad->home_top_bar_ad : null);
            $home_middle_ad = $this->handleFileUpload($request, 'home_middle_ad', $ad ? $ad->home_middle_ad : null);
            $view_page_ad = $this->handleFileUpload($request, 'view_page_ad', $ad ? $ad->view_page_ad : null);
            $news_page_ad = $this->handleFileUpload($request, 'news_page_ad', $ad ? $ad->news_page_ad : null);
            $side_bar_ad = $this->handleFileUpload($request, 'side_bar_ad', $ad ? $ad->side_bar_ad : null);

            // Update or create the Ad record
            Ad::updateOrCreate(
                ['id' => $id],
                [
                    'home_top_bar_ad' => !empty($home_top_bar_ad) ? $home_top_bar_ad : ($ad ? $ad->home_top_bar_ad : null),
                    'home_top_bar_ad_status' => $request->home_top_bar_ad_status == 1 ? 1 : 0,
                    'home_top_bar_ad_url' => $request->home_top_bar_ad_url,

                    'home_middle_ad' => !empty($home_middle_ad) ? $home_middle_ad : ($ad ? $ad->home_middle_ad : null),
                    'home_middle_ad_status' => $request->home_middle_ad_status == 1 ? 1 : 0,
                    'home_middle_ad_url' => $request->home_middle_ad_url,

                    'view_page_ad' => !empty($view_page_ad) ? $view_page_ad : ($ad ? $ad->view_page_ad : null),
                    'view_page_status' => $request->view_page_status == 1 ? 1 : 0,
                    'view_page_ad_url' => $request->view_page_ad_url,

                    'news_page_ad' => !empty($news_page_ad) ? $news_page_ad : ($ad ? $ad->news_page_ad : null),
                    'news_page_ad_status' => $request->news_page_ad_status == 1 ? 1 : 0,
                    'news_page_ad_url' => $request->news_page_ad_url,

                    'side_bar_ad' => !empty($side_bar_ad) ? $side_bar_ad : ($ad ? $ad->side_bar_ad : null),
                    'side_bar_ad_status' => $request->side_bar_ad_status == 1 ? 1 : 0,
                    'side_bar_ad_url' => $request->side_bar_ad_url,

                ]
            );

            toast('Created successfully', 'success')->width('400px');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

}
