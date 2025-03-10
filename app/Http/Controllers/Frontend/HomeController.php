<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            ->with(['category', 'comments'])
            ->activeNews()
            ->withLocalize()
            ->first();

        $recentNews = News::with('author')
            ->where('slug', '!=', $slug)
            ->activeNews()
            ->withLocalize()->orderBy('id', 'desc')->take(4)->get();

        $mostTags = $this->mostTags();

        $this->countView($news);


        return view('frontend.news-details', compact('news', 'recentNews', 'mostTags'));
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

    public function mostTags(): \Illuminate\Support\Collection
    {
        return Tag::select('name', DB::raw('COUNT(*) as count'))
            ->where('language', getLanguage())
            ->groupBy('name')
            ->orderByDesc('count')
            ->take(15)
            ->get();
    }


    public function handleComment(Request $request)
    {
        $request->validate([
            'comment' => ['required', 'max:1000', 'string'],
        ]);
        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->save();

        toast('Created successfully', 'success')->width('400px');

        return redirect()->back();
    }

    public function handleReplay(Request $request)
    {
        $request->validate([
            'replay' =>  ['required', 'max:1000', 'string'],
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->replay;
        $comment->save();

        toast('Created successfully', 'success')->width('400px');

        return redirect()->back();
    }

}
