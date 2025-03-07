<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreNewsRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    use FileUploadTrait;

    public function index()
    {
        $languages = Language::all();
        return view('dashboard.pages.news.index', compact('languages'));
    }

    /*
     * Fetch Categories depend on language
    */
    public function fetchCategory(Request $request)
    {
        $categories = Category::where('language', $request->lang)->get();

        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('dashboard.pages.news.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreNewsRequest $request)
    {

        // Handle Image
        $imagePath = $this->handleFileUpload($request, 'image', '');

        $news = new News();
        $news->language = $request->language;
        $news->category_id = $request->category_id;
        $news->author_id = Auth::guard('admin')->user()->id;
        $news->image = $imagePath;
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->description = $request->description;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->is_breaking_news = $request->is_breaking_news === 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider === 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular === 1 ? 1 : 0;
        $news->status = $request->status;
        $news->save();
        toast('Created successfully', 'success')->width('400px');
        return to_route('admin.news.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
