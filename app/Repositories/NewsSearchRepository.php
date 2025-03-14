<?php

namespace App\Repositories;

use App\Interfaces\NewsSearchRepositoryInterface;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NewsSearchRepository implements NewsSearchRepositoryInterface
{
    public function news(Request $request)
    {
        $news = [];
        if ($request->has('search')) {

            $news = News::with('author','category')->where(function (Builder $query) use ($request) {

                $query->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->search . '%');

            })->orWhereHas('category', function (Builder $query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');

            })->activeNews()
                ->withLocalize()
                ->paginate(8)->withQueryString();
        }

        return view('frontend.news', compact('news'));
    }
}
