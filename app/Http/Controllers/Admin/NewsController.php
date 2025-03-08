<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class NewsController extends Controller
{

    public $news;

    public function __construct(AdminNewsRepositoryInterface $news)
    {
        $this->news = $news;
    }

    use FileUploadTrait;

    public function index()
    {
        return $this->news->index();
    }

    public function fetchCategory(Request $request)
    {
        return $this->news->fetchCategory($request);
    }


    public function create()
    {
        return $this->news->create();
    }


    public function store(AdminStoreNewsRequest $request)
    {
        return $this->news->store($request);
    }

    /*
     * change toggle of news
     * */
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


    public function edit(string $id)
    {
        return $this->news->edit($id);
    }

    public function update(AdminUpdateNewsRequest $request, string $id)
    {
        return $this->news->update($request, $id);
    }

    public function destroy(string $id)
    {
        //
    }
}
