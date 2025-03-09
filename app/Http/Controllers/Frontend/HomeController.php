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

        $recentNews = News::with('author')
            ->where('slug', '!=', $slug)
            ->activeNews()
            ->withLocalize()->orderBy('id', 'desc')->take(4)->get();

        $this->countView($news);


        return view('frontend.news-details', compact('news', 'recentNews'));
    }

    // handle  count of views

    public function countView($news): void
    {
        $ip = request()->ip();
        $sessionKey = 'viewed_post_' . $ip;

        if (session()->has($sessionKey)) {
            $postIds = session($sessionKey);
            if (!in_array($news->id, $postIds, true)) {
                $postIds[] = $news->id;
                $news->increment('views');
            }
            session([$sessionKey => $postIds]);
        } else {
            session([$sessionKey => [$news->id]]);
            $news->increment('views');
        }
    }




//    public function countView($news): void
//    {
//        if (session()->has('viewed_post')) {
//            $postIds = session('viewed_post');
//            if (!in_array($news->id, $postIds)) {
//                $postIds[] = $news->id;
//                $news->increment('views');
//            }
//            session(['viewed_post' => $postIds]);
//        }else {
//            session(['viewed_post' => [$news->id]]);
//            $news->increment('views');
//        }
//    }


}
