<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news(Request $request)
    {
        if ($request->has('search')) {
            $news = News::where(function (Builder $query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            })->orWhereHas('category', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })->get();
        }

        dd($news);

        return view('frontend.news');
    }
}
