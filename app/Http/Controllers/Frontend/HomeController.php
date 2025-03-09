<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use function App\Helpers\getLanguage;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::with('author', 'tags')->where(['is_breaking_news' => 1,])
            ->activeNews()->withLocalize()->orderBy('id', 'asc')->take(8)->get();
        return view('frontend.home', compact('breakingNews'));
    }

    public function ShowNews(string $slug)
    {
        $news = News::where('slug', $slug)
            ->with('category')
            ->activeNews()
            ->withLocalize()
            ->first();

        $recentNews = News::with('author', 'category')
            ->where('slug', '!=', $slug)
            ->activeNews()
            ->withLocalize()->orderBy('id', 'desc')->take(4)->get();

        $this->countView($news);


        return view('frontend.news-details', compact('news', 'recentNews'));
    }

    // handle  count of views
    public function countView($news)
    {
        $sessionKey = 'views' . $news->id;

        if (!session()->has($sessionKey)) {

            $news->increment('views');

            session()->put($sessionKey, true);
        }

    }


}
