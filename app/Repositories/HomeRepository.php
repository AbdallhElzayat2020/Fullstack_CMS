<?php

namespace App\Repositories;

use App\Interfaces\HomeRepositoryInterface;
use App\Models\About;
use App\Models\Ad;
use App\Models\Comment;
use App\Models\HomeSectionSetting;
use App\Models\News;
use App\Models\SocialCount;
use App\Models\Subscriber;
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
        try {
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

            $ad = Ad::first();

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
                'mostTags',
                'ad',
            ));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function ShowNews(string $slug)
    {


        try {
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

            $ad = Ad::first();

            return view('frontend.news-details', compact(
                'news',
                'recentNews',
                'mostTags',
                'nextPost',
                'prevPost',
                'relatedPosts',
                'socialCount',
                'ad',
            ));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function countView($news)
    {
        try {
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
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function mostTags()
    {
        try {
            return Tag::select('name', DB::raw('COUNT(*) as count'))
                ->where('language', getLanguage())
                ->groupBy('name')
                ->orderByDesc('count')
                ->take(15)
                ->get();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function handleComment(Request $request)
    {
        try {
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
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function handleReplay(Request $request)
    {
        try {
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
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
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

    public function newsLetter(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email', 'max:255', 'unique:subscribers,email'],
            ], [
                'email.unique' => __('email is already subscribed !')
            ]);

            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();

            return response(['status' => 'success', 'message' => __('Subscribed successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }
    }

    public function about()
    {
        $about = About::where('language', getLanguage())->first();
        return view('frontend.about', compact('about'));
    }
}
