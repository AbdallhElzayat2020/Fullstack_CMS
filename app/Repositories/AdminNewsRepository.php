<?php

namespace App\Repositories;

use App\Http\Requests\AdminStoreNewsRequest;
use App\Http\Requests\AdminUpdateNewsRequest;
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

    public function toggleNewsStatus(Request $request)
    {
        try {

            $news = News::findOrFail($request->id);
            $news->{$request->name} = $request->status;
            $news->save();
            return response()->json(['status' => 'success', 'message' => __('updated successfully !')]);

        } catch (\Exception $exception) {
            throw $exception;
        }
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

        //Handle Tags
        $tags = explode(',', $request->tags);
        $tagIds = [];
        // loop in tags array
        foreach ($tags as $tag) {
            $tag = trim($tag);
            $item = new Tag();
            $item->name = $tag;
            $item->save();
            $tagIds[] = $item->id;
        }

        $news->tags()->attach($tagIds);


//        $tags = explode(',', $request->tags);
//        $tagsIds = [];
//        foreach ($tags as $tag) {
//            $tag = trim($tag);
//            $tag = Tag::create([
//                'name' => $tag,
//            ]);
//            $tagsIds[] = $tag->id;
//        }
//        $news->tags()->attach($tagsIds);


        toast('Created successfully', 'success')->width('400px');
        return to_route('admin.news.index');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $languages = Language::all();
        $categories = Category::where('language', $news->language)->get();


        $tags = implode(',', $news->tags->pluck('name')->toArray());

        $news->tags = $tags;

        return view('dashboard.pages.news.edit', compact('news', 'languages', 'categories', 'tags'));
    }

    public function update(AdminUpdateNewsRequest $request, $id)
    {
        $news = News::findOrFail($id);


        // Handle Image
        $imagePath = $this->handleFileUpload($request, 'image', $news->image);

        $news->language = $request->language;
        $news->category_id = $request->category_id;
        $news->image = !empty($imagePath) ? $imagePath : $news->image;
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

        /// Handle Tags
        $tags = explode(',', $request->tags);
        $tagsIds = [];
        // loop tags array
        foreach ($tags as $tag) {
            $tag = trim($tag);
            $existTag = Tag::where('name', $tag)->first();
            if ($existTag) {
                $tagsIds[] = $existTag->id;
            } else {
                $newTag = Tag::create([
                    'name' => $tag,
                ]);
                $tagsIds[] = $newTag->id;
            }

        }

        $news->tags()->sync($tagsIds);

        toast('updated successfully', 'success')->width('400px');
        return to_route('admin.news.index');
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
