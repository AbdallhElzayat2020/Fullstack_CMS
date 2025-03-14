<?php

namespace App\Repositories;

use App\Interfaces\HomeRepositoryInterface;
use App\Models\Comment;
use App\Models\HomeSectionSetting;
use App\Models\News;
use App\Models\SocialCount;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use function App\Helpers\getLanguage;

class HomeRepository implements HomeRepositoryInterface
{
    public function index()
    {
        $HomeSectionOne = Cache::remember('home_section_settings_' . getLanguage(), 60, function () {
            return HomeSectionSetting::where('language', getLanguage())->first();
        });

        $allNews = Cache::remember('all_home_news_' . getLanguage(), 60, function () {
            return News::with(['author', 'category', 'tags'])
                ->activeNews()
                ->withLocalize()
                ->get();
        });

        $breakingNews = $allNews->where('is_breaking_news', 1)
            ->sortBy('id')
            ->take(8);

        $heroSlider = $allNews->where('show_at_slider', 1)
            ->sortBy('id')
            ->take(7);

        $recentNews = $allNews->sortByDesc('id')
            ->take(6);

        $popularNews = $allNews->where('show_at_popular', 1)
            ->sortByDesc('updated_at')
            ->take(4);

        $categorySectionOne = $allNews->where('category_id', $HomeSectionOne->category_section_one)
            ->sortByDesc('id')
            ->take(8);

        $categorySectionTwo = $allNews->where('category_id', $HomeSectionOne->category_section_two)
            ->sortByDesc('id')
            ->take(8);

        $categorySectionThree = $allNews->where('category_id', $HomeSectionOne->category_section_three)
            ->sortByDesc('id')
            ->take(6);

        $categorySectionFour = $allNews->where('category_id', $HomeSectionOne->category_section_four)
            ->sortByDesc('id')
            ->take(4);

        $mostViewedPosts = $allNews->sortByDesc('views')
            ->take(3);

        $socialCount = SocialCount::where(['status' => 'active', 'language' => getLanguage()])
            ->get();

        $mostTags = $this->mostTags();
        return view('frontend.home', compact(
            'breakingNews',
            'heroSlider',
            'recentNews',
            'popularNews',
            'categorySectionOne',
            'categorySectionTwo',
            'categorySectionThree',
            'categorySectionFour',
            'HomeSectionOne',
            'mostViewedPosts',
            'socialCount',
            'mostTags'
        ));
    }

    public function ShowNews(string $slug)
    {


        $news = News::where('slug', $slug)
            ->with(['category', 'comments'])
            ->activeNews()
            ->withLocalize()
            ->first();

        $this->countView($news);

        $recentNews = News::with('author')
            ->where('slug', '!=', $slug)
            ->activeNews()
            ->withLocalize()->orderBy('id', 'desc')->take(4)->get();

        $posts = News::where('id', '>', $news->id)
            ->orWhere('id', '<', $news->id)
            ->activeNews()
            ->withLocalize()
            ->orderBy('id', 'asc')
            ->get();

        $socialCount = SocialCount::where(['status' => 'active', 'language' => getLanguage()])
            ->get();

        $nextPost = $posts->firstWhere('id', '>', $news->id);
        $prevPost = $posts->firstWhere('id', '<', $news->id);


        $mostTags = $this->mostTags();

        $relatedPosts = News::with('author')
            ->where('slug', '!=', $news->slug)
            ->where('category_id', $news->category_id)
            ->activeNews()
            ->withLocalize()
            ->take(4)
            ->get();

        return view('frontend.news-details', compact(
            'news',
            'recentNews',
            'mostTags',
            'nextPost',
            'prevPost',
            'relatedPosts',
            'socialCount'
        ));
    }

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

    public function handleComment(Request $request): \Illuminate\Http\RedirectResponse
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

    public function handleReplay(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'replay' => ['required', 'max:1000', 'string'],
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

    public function commentDestroy(Request $request)
    {
        try {
            $comment = Comment::findOrFail($request->id);
            if (Auth::user()->id === $comment->user_id) {
                $comment->delete();
                return response(['status' => 'success', 'message' => __('Deleted successfully')]);
            }

            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }
    }
}
