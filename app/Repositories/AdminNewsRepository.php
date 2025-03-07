<?php

namespace App\Repositories;

use App\Http\Requests\AdminStoreNewsRequest;
use App\Interfaces\AdminNewsRepositoryInterface;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use App\Models\Tag;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminNewsRepository implements AdminNewsRepositoryInterface
{
    use FileUploadTrait;

    public function index()
    {
        $languages = Language::all();
        return view('dashboard.pages.news.index', compact('languages'));
    }

    public function fetchCategory(Request $request)
    {
        $categories = Category::where('language', $request->lang)->get();

        return response()->json($categories);
    }

    public function create()
    {
        $languages = Language::all();
        return view('dashboard.pages.news.create', compact('languages'));
    }

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

        $tags = explode(',', $request->tags);
        $tagIds = [];

        foreach ($tags as $tag) {
            $tag = trim($tag);
            $item = new Tag();
            $item->name = $tag;
            $item->save();
            $tagIds[] = $item->id;
        }

        $news->tags()->attach($tagIds);

        toast('Created successfully', 'success')->width('400px');
        return to_route('admin.news.index');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
