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
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        //dd($request->all());
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
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
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

        toast(__('Created successfully'), 'success')->width('400px');
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

        // ✅ Handle Image Upload (Keep old image if no new one uploaded)
        $imagePath = $news->image;
        if ($request->hasFile('image')) {
            $imagePath = $this->handleFileUpload($request, 'image');
        }
        $news->image = $imagePath;

        // ✅ Update News
        $news->language = $request->language;
        $news->category_id = $request->category_id;
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->description = $request->description;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->is_breaking_news = $request->is_breaking_news ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular ? 1 : 0;
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

        toast(__('updated successfully'), 'success')->width('400px');
        return to_route('admin.news.index');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $news = News::findOrFail($id);
            $news->tags()->delete();
            $news->delete();
            $this->deleteFile($news->image);
            DB::commit();
            return response(['status' => 'success', 'message' => __('Deleted successfully')]);

        } catch (Exception $exception) {
            DB::rollBack();
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }
    }

    /*
     * Copy news
     * */
    public function copyNews($id)
    {
        $news = News::findOrFail($id);

        $copyNews = $news->replicate();
        $copyNews->save();
        toast(__('Copied successfully'), 'success')->width('400px');
        return to_route('admin.news.index');
    }
}
