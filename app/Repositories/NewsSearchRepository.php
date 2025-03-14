<?php

namespace App\Repositories;

use App\Interfaces\NewsSearchRepositoryInterface;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use function App\Helpers\getLanguage;

class NewsSearchRepository implements NewsSearchRepositoryInterface
{
    public function mostTags(): \Illuminate\Support\Collection
    {
        return Tag::select('name', DB::raw('COUNT(*) as count'))
            ->where('language', getLanguage())
            ->groupBy('name')
            ->orderByDesc('count')
            ->take(15)
            ->get();
    }

    public function news(Request $request)
    {
        $allNews = Cache::remember('all_home_news_' . getLanguage(), 60, function () {
            return News::with(['author', 'category', 'tags'])
                ->activeNews()
                ->withLocalize()
                ->get();
        });


//        if ($request->has('search')) {
//            $news = News::with('author', 'category')
//
//            })
//            ->activeNews()
//                ->withLocalize()
//                ->paginate(8)->withQueryString();
//        }

        $news = News::query();

        $news->when($request->has('category') && !empty($request->category), function (Builder $query) use ($request) {
            $query->whereHas('category', function (Builder $query) use ($request) {
                $query->where('slug', $request->category);
            });
        });

        $news->when($request->has('search'), function (Builder $query) use ($request) {

            $query->where(function (Builder $query) use ($request) {

                $query->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->search . '%');

            })->orWhereHas('category', function (Builder $query) use ($request) {

                $query->where('name', 'LIKE', '%' . $request->search . '%');
            });
        });


        $news = $news->activeNews()->withLocalize()->paginate(10)->withQueryString();


        $mostTags = $this->mostTags();
        $recentNews = $allNews->sortByDesc('id');

        $categories = Category::where(['status' => 'active', 'language' => getLanguage()])
            ->get();

        return view('frontend.news', compact('news', 'recentNews', 'mostTags', 'categories'));
    }
}
